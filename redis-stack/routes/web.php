<?php

use Illuminate\Support\Facades\Redis;

Route::get('/', function() {
    // 1. Publish event with Redis
    $data = [
        'event' => 'UserSignedUp',
        'data' => [
            'username' => 'JohnDoe'
        ]
    ];
    Redis::publish('test-channel', json_encode($data));

    return view('welcome');

    // 2. Node.js + Redis subscribe to the event

    // 3. User socket.io to emit to all clients.
});

Route::get('/redis', function () {
    Redis::set('', 'Vitalik');

    return Redis::get('name');
});

Route::get('/cache', function () {
    Cache::put('foo', 'bar', 10);

    return Cache::get('foo');
});