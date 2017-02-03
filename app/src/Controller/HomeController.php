<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * HomeController class
 *
 * Controller of your homepage.
 */
class HomeController extends AbstractController
{
    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response)
    {
        return $this->view->render($response, 'homepage/home.twig', [
            'name' => $request->getAttribute('csrf_name'),
            'value' => $request->getAttribute('csrf_value')
        ]);
    }
}
