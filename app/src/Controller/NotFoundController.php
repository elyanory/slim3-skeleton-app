<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Handlers\NotFound;
use Slim\Views\Twig;

/**
 * NotFoundController class
 *
 * Override the NotFoundHandler of Slim.
 */
class NotFoundController extends NotFound {

    /**
     * @var Twig
     */
    private $view;

    /**
     * NotFoundController constructor.
     *
     * @param Twig $view
     */
    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     *
     * @return static
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        parent::__invoke($request, $response);
        
        $this->view->render($response, 'errors/404.twig');
        return $response->withStatus(404);
    }
}