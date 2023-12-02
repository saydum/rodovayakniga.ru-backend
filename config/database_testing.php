<?php

return [
    'default' => 'sqlite',
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => "database_path('test_database.sqlite')",
            'prefix' => '',
        ],
    ],
];
