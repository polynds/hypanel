<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Polynds\Hypanel\Event;

use Polynds\Hypanel\ServerConfig;
use Swoole\Coroutine\Http\Server;

class HypanelServerStart
{
    public Server $server;

    public ServerConfig $serverConfig;

    public function __construct(Server $server, ServerConfig $serverConfig)
    {
        $this->server = $server;
        $this->serverConfig = $serverConfig;
    }
}
