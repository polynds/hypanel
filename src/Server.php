<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Polynds\Hypanel;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;
use Polynds\Hypanel\Assets\Panel;
use Polynds\Hypanel\Event\HypanelServerStart;
use Polynds\Hypanel\Event\HypanelServerStop;
use Psr\EventDispatcher\EventDispatcherInterface;
use Swoole\Coroutine;
use Swoole\Coroutine\Http\Server as SwooleServer;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Timer;
use Swoole\WebSocket\CloseFrame;

class Server
{
    /**
     * @Inject
     */
    protected ConfigInterface $config;

    protected ServerConfig $serverConfig;

    protected SwooleServer $swooleServer;

    /**
     * @Inject
     */
    protected EventDispatcherInterface $eventDispatcher;

    public function __construct()
    {
        $this->serverConfig = new ServerConfig($this->config->get('hypanel.server'));
    }

    public function start()
    {
        $this->initServer();
        Coroutine::create(function () {
            $this->eventDispatcher->dispatch(new HypanelServerStart($this->swooleServer, $this->serverConfig));
            $this->swooleServer->start();
            $this->eventDispatcher->dispatch(new HypanelServerStop($this->swooleServer));
        });
    }

    protected function initServer()
    {
        $this->swooleServer = new SwooleServer($this->serverConfig->getHost(), $this->serverConfig->getPort());
        $this->handleHttp();
        $this->handleWebsocket();
    }

    protected function handleHttp()
    {
        $this->swooleServer->handle('/', function (Request $request, Response $response) {
            $response->end((new Panel())->display($this->serverConfig->getHost(), $this->serverConfig->getPort()));
        });
    }

    protected function handleWebsocket()
    {
        $this->swooleServer->handle('/websocket', function (Request $request, Response $ws) {
            $ws->upgrade();
            while (true) {
                $frame = $ws->recv();
                if ($frame === '') {
                    $ws->close();
                    break;
                }
                if ($frame === false) {
                    echo 'errorCode: ' . swoole_last_error() . "\n";
                    $ws->close();
                    break;
                }
                if ($frame->data == 'close' || get_class($frame) === CloseFrame::class) {
                    $ws->close();
                    break;
                }
                $ws->push("Hello {$frame->data}!");
                $ws->push("How are you, {$frame->data}?");

                $monitor = new Monitor();
                Timer::tick(1000, function () use ($monitor, $ws) {
                    $ws->push($monitor->html());
                });
            }
        });
    }
}
