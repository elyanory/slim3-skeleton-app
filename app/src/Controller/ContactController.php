<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class ContactController extends AbstractController
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'contact/contact.twig');
        return $response;
    }
}
