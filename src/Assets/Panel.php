<?php

declare(strict_types=1);
/**
 * 本文件属于KK馆版权所有，泄漏必究。
 * This file belong to KKGUAN, all rights reserved.
 */
namespace Polynds\Hypanel\Assets;

class Panel
{
    public function display(string $host, int $port): string
    {
        $host = $host == '0.0.0.0' ? '127.0.0.1' : $host;
        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hyperf Controll Pannel.</title>
</head>
<body>
<div>Welcome！</div>
<h1>Swoole WebSocket Server</h1>
<div id="container"></div>
<script>
var wsServer = "ws://{$host}:{$port}/websocket";
var websocket = new WebSocket(wsServer);
websocket.onopen = function (evt) {
    console.log("Connected to WebSocket server.");
    websocket.send('hello');
};

websocket.onclose = function (evt) {
    console.log("Disconnected");
};

websocket.onmessage = function (evt) {
    document.getElementById("container").innerHTML = evt.data;
    //console.log('Retrieved data from server: ' + evt.data);
};

websocket.onerror = function (evt, e) {
    console.log('Error occured: ' + evt.data);
};

</script>
</body>
</html>
HTML;
    }
}
