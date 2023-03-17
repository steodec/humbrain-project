<?php

return
    [
        'paths' => [
            'migrations' => __DIR__ . '/db/migrations',
            'seeds' => __DIR__ . '/db/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'migration',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'mysql',
                'host' => $_ENV['DB_PROD_HOST'],
                'name' => $_ENV['DB_PROD_NAME'],
                'user' => $_ENV['DB_PROD_USER'],
                'pass' => $_ENV['DB_PROD_PASSWORD'],
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'development' => [
                'adapter' => 'mysql',
                'host' => $_ENV['DB_DEV_HOST'],
                'name' => $_ENV['DB_DEV_NAME'],
                'user' => $_ENV['DB_DEV_USER'],
                'pass' => $_ENV['DB_DEV_PASSWORD'],
                'port' => '3306',
                'charset' => 'utf8',
            ]
        ],
        'version_order' => 'creation'
    ];
