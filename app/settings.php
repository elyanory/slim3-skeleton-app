<?php
return [
    'settings' => [
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => false,
        'view' => [
            'template_path' => __DIR__ . '/src/Resources/views/',
            'twig' => [
                'cache' => __DIR__ . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],
    ],
];