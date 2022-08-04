<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Polynds\Hypanel;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for server.',
                    'source' => __DIR__ . '/../publish/hypanel.php',
                    'destination' => BASE_PATH . '/config/autoload/hypanel.php',
                ],
            ],
            'dependencies' => [
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
        ];
    }
}
