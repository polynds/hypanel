<?php

declare(strict_types=1);
/**
 * 本文件属于KK馆版权所有，泄漏必究。
 * This file belong to KKGUAN, all rights reserved.
 */
return [
    'enable' => true,
    'server' => [
        'name' => 'hypanel_server',
        'host' => (string) env('HYPANEL_SERVER_HOST', '127.0.0.1'),
        'port' => (int) env('HYPANEL_SERVER_PORT', 9028),
    ],
];
