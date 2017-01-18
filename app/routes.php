<?php

$app->get('/', App\Controller\HomeController::class)
    ->setName('homepage');

$app->get('/contact', App\Controller\ContactController::class)
    ->setName('contact');
