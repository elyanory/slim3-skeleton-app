<?php
/**
 * Settings
 *
 * App settings
 *
 * PHP Version 5.6
 *
 * @category Settings
 * @package  App
 * @author   afrance <france.antoine@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
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
        'from' => 'email@email.fr',
        'to' => 'email@email.fr',
    ],
];
