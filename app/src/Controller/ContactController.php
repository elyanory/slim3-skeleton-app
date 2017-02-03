<?php
namespace App\Controller;

use App\Validator\StringValidator;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * ContactController class
 *
 * Display contact page.
 */
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

        $data = $request->getParams();

        // Treatment
        $errors = [];
        if (!isset($data['firstname']) ||
            (isset($data['firstname']) && !StringValidator::validate($data['firstname']))
        ) {
            $errors[] = 'Nom incorrect.';
        }

        if (!isset($data['lastname']) ||
            (isset($data['lastname']) && !StringValidator::validate($data['lastname']))
        ) {
            $errors[] = 'Prénom incorrect.';
        }

        if (0 == count($errors)) {
            $message = "Un nouveau visiteur essaye de vous contacter :
<ul>
    <li>Nom : " . $data['firstname']  . "</li>
    <li>Prénom : " . $data['lastname']  . "</li>
    <li>Email : " . $data['email']  . "</li>
    <li>Message : " . $data['message']  . "</li>
</ul>
";

            $this->sendMail(
                $this->settings['to'],
                'Nouveau contact',
                $message
            );

            $this->flash->addMessage('success', "Votre demande de contact a bien été envoyée, merci.");
        } else {
            foreach ($errors as $error) {
                $this->flash->addMessage('error', $error);
            }
        }

        return $this->redirect($response, 'contact');
    }
}
