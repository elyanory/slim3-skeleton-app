<?php
namespace App\Controller;

use Slim\Exception\NotFoundException;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig as Twig;
use Slim\Flash\Messages as Flash;

/**
 * Class AbstractController
 * @package App\Controller
 */
class AbstractController
{
    /** @var array */
    protected $settings;

    /** @var Twig */
    protected $view;

    /**
     * @var Flash
     */
    protected $flash;

    /**
     * AbstractController constructor.
     *
     * @param Twig $view
     * @param Flash $flash
     */
    public function __construct($settings, Twig $view, Flash $flash)
    {
        $this->settings = $settings;
        $this->view = $view;
        $this->flash = $flash;
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

    /**
     * @param Request $request
     * @param $param
     * @return bool
     */
    public function hasParam(Request $request, $param)
    {
        return ($request->getParam($param)) ? true : false;
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return array
     *
     * @throws NotFoundException
     */
    public function getCurrentRoute(Request $request, Response $response)
    {
        $route = $request->getAttribute('route');

        if (empty($route)) {
            throw new NotFoundException($request, $response);
        }

        return [
            'name' => $route->getName(),
            'groups' => $route->getGroups(),
            'methods' => $route->getMethods(),
            'arguments' => $route->getArguments(),
        ];
    }

    /**
     * @param $to
     * @param $subject
     * @param $message
     *
     * @return bool
     */
    public function sendMail($to, $subject, $message)
    {
        $headers = "From: " . $this->settings['from'] . "\r\n".
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";

        return mail($to, $subject, $message, $headers);
    }
}
