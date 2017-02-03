<?php
/**
 * Routes
 *
 * Definition of the app routes.
 *
 * PHP Version 5.6
 *
 * @category Routes
 * @package  App
 * @author   afrance <france.antoine@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
$app->get('/', App\Controller\HomeController::class)
    ->setName('homepage');

$app->get('/contact', App\Controller\ContactController::class)
    ->setName('contact');

$app->post('/contact', App\Controller\ContactController::class . ':contact');

$app->post('/callback', App\Controller\CallbackController::class . ':callback')
    ->setName('callback');
