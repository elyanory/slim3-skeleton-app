<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends AbstractController
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'homepage/home.twig');
        return $response;
    }
}
