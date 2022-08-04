<?php

declare(strict_types=1);
/**
 * 本文件属于KK馆版权所有，泄漏必究。
 * This file belong to KKGUAN, all rights reserved.
 */
namespace Polynds\Hypanel\Command;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Polynds\Hypanel\Server;

/**
 * @Command
 */
class StartServer extends HyperfCommand
{
    protected $name = 'hypanel:start';

    public function handle()
    {
        $server = new Server();
        $server->start();
    }

    protected function configure()
    {
        $this->setDescription('Start The Hypanel Server.');
    }
}
