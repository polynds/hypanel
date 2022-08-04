<?php

declare(strict_types=1);
/**
 * 本文件属于KK馆版权所有，泄漏必究。
 * This file belong to KKGUAN, all rights reserved.
 */
namespace Polynds\Hypanel\Event;

use Swoole\Coroutine\Http\Server;

class HypanelServerStop
{
    public Server $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }
}
