<?php
// Homepage
$app->get('/', App\Controller\HomeController::class)->setName('homepage');

// Contact
$app->get('/contact', App\Controller\ContactController::class)->setName('contact');
$app->post('/contact', App\Controller\ContactController::class . ':contact');

// Callback
$app->post('/callback', App\Controller\CallbackController::class . ':callback')->setName('callback');
