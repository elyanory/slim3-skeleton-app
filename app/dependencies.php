<?php
/**
 * Dependencies
 *
 * Container of your app.
 *
 * PHP Version 5.6
 *
 * @category Dependencies
 * @package  App
 * @author   afrance <france.antoine@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
$container = $app->getContainer();

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');

    $view = new Slim\Views\Twig(
        $settings['view']['template_path'],
        $settings['view']['twig']
    );

    $view->addExtension(
        new Slim\Views\TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        )
    );

    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// 404
$container['notFoundHandler'] = function ($c) {
    return new \App\Controller\NotFoundController(
        $c->get('view'),
        function ($request, $response) use ($c) {
            return $c['response']->withStatus(404);
        }
    );
};

$container['notAllowedHandler'] = function ($c) {
    return new \App\Controller\NotFoundController(
        $c->get('view'),
        function ($request, $response) use ($c) {
            return $c['response']->withStatus(404);
        }
    );
};

// Homepage
$container[App\Controller\HomeController::class] = function ($c) {
    return new App\Controller\HomeController(
        $c->get('settings'),
        $c->get('view'),
        $c->get('flash')
    );
};

// Contact
$container[App\Controller\ContactController::class] = function ($c) {
    return new App\Controller\ContactController(
        $c->get('settings'),
        $c->get('view'),
        $c->get('flash')
    );
};

// Callback
$container[App\Controller\CallbackController::class] = function ($c) {
    return new App\Controller\CallbackController(
        $c->get('settings'),
        $c->get('view'),
        $c->get('flash')
    );
};
