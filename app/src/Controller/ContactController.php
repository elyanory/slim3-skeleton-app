<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class ContactController extends AbstractController
{
    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response)
    {
        return $this->view->render($response, 'contact/contact.twig', [
            'messages' => $this->flash->getMessages(),
            'name' => $request->getAttribute('csrf_name'),
            'value' => $request->getAttribute('csrf_value')
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return static
     */
    public function contact(Request $request, Response $response)
    {
        if (!$request->isPost()) {
            $this->flash->addMessage('danger', 'Error method.');
            return $this->redirect($response, 'contact');
        }

        $this->flash->addMessage('success', 'Good');
        $data = $request->getParams();

        // Treatment

        return $this->redirect($response, 'contact');
    }
}
