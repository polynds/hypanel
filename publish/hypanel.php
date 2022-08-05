<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
return [
    'enable' => true,
    'server' => [
        'name' => 'hypanel_server',
        'host' => (string) env('HYPANEL_SERVER_HOST', '127.0.0.1'),
        'port' => (int) env('HYPANEL_SERVER_PORT', 9028),
    ],
];
