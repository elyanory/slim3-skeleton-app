<?php
namespace App\Controller;

use App\Validator\PhoneValidator;
use App\Validator\StringValidator;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * CallbackController class
 *
 * Form treatment of callback.
 */
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
            $data = $request->getParams();

            $errors = [];
            if (!isset($data['name']) ||
                (isset($data['name']) && !StringValidator::validate($data['name']))
            ) {
                $errors[] = 'Nom incorrect.';
            }


            if (!isset($data['phone']) ||
                (isset($data['phone']) && !PhoneValidator::validate($data['phone']))
            ) {
                $errors[] = 'Téléphone non valide.';
            }

            if (0 == count($errors)) {
                $message = "Un nouveau visiteur souhaite être recontacté :                    
<ul>
    <li>Nom : " . $data['name']  . "</li>
    <li>Téléphone : " . $data['phone']  . "</li>
</ul>
";

                $this->sendMail(
                    $this->settings['to'],
                    "Rappel d'un visiteur",
                    $message
                );

                $this->flash->addMessage('success', "Nous avons bien pris compte de vous rappeler, merci.");
            } else {
                foreach ($errors as $error) {
                    $this->flash->addMessage('error', $error);
                }
            }

            return $this->redirect($response, $request->getParam('callback-form'));
        }
    }
}
