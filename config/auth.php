<?php

return [
    'defaults' => [
    'guard' => 'web',
    'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'pendaftar' => [
            'provider' => 'pendaftar',
            'table' => 'password_resets', // atau buat tabel sendiri: 'password_resets_pendaftar'
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
]
?>