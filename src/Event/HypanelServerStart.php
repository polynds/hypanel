<?php

declare(strict_types=1);
/**
 * 本文件属于KK馆版权所有，泄漏必究。
 * This file belong to KKGUAN, all rights reserved.
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
