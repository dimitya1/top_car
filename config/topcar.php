<?php

return [
    'contacts' => [
        'uk' => [
            'city' => 'Одеса',
            'street' => 'вул. Садова 8',
            'tel' => '+38(040) 256 558 12',
            'email' => 'contact@topcar.net',
        ],
    ],
    'reviews' => [
        'paginator' => 10,
    ],
    'user' => [
        'paginator' => 25,
    ],
    'feedback' => [
        'paginator' => 25,
    ],
    'telegram' => [
        'token' => env('TELEGRAM_BOT_TOKEN'),
        'chat_name' => env('TELEGRAM_CHAT_NAME'),
    ],
];
