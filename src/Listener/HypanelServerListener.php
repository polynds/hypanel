<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Hyperf\Server\Listener;

use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Event\Contract\ListenerInterface;
use Polynds\Hypanel\Event\HypanelServerStart;
use Polynds\Hypanel\Event\HypanelServerStop;

class HypanelServerListener implements ListenerInterface
{
    /**
     * @Inject
     */
    protected StdoutLoggerInterface $logger;

    public function listen(): array
    {
        return [
            HypanelServerStart::class,
            HypanelServerStop::class,
        ];
    }

    public function process(object $event)
    {
        if ($event instanceof HypanelServerStart) {
            $this->logger->info('HypanelServer started.');
        } elseif ($event instanceof HypanelServerStop) {
            $this->logger->info('HypanelServer stoped.');
        }
    }
}
