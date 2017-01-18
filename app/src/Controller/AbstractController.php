<?php
namespace App\Controller;

use Slim\Views\Twig as Twig;

class AbstractController
{
    protected $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }
}
