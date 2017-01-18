<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class CallbackController extends AbstractController
{
    /**
     * @param Request $request
     * @param Response $response
     *
     * @return static
     */
    public function callback(Request $request, Response $response)
    {
        if ($request->isPost() && $this->hasParam($request, 'callback-form')) {
            // Treatment
            return $this->redirect($response, $request->getParam('callback-form'));
        }
    }
}
