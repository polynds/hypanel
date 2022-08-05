<?php

declare(strict_types=1);
/**
 * happy coding!!!
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
