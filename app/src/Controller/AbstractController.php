<?php
namespace App\Controller;

use Slim\Http\Response;
use Slim\Views\Twig as Twig;

class AbstractController
{
    /** @var Twig */
    protected $view;

    /**
     * AbstractController constructor.
     *
     * @param Twig $view
     */
    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    /**
     * @param Response $response
     * @param $name
     *
     * @return static
     */
    public function redirect(Response $response, $name)
    {
        return $response->withRedirect($name);
    }
}
