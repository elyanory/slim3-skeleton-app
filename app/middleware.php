<?php
/**
 * Middleware
 *
 * Add some component to your app.
 *
 * PHP Version 5.6
 *
 * @category Middleware
 * @package  App
 * @author   afrance <france.antoine@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
$app->add(new \Slim\Csrf\Guard);

$app->add(function ($request, $response, $next) {
    $this->view->offsetSet('flash', $this->flash);

    return $next($request, $response);
});
