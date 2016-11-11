<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;

class PasswordController extends Controller
{

    public function getChangePassword($request, $response)
    {
        return $this->view->render($response, 'auth/password/change.twig' );
    }

    public function postChangePassword($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'password_old' => v::noWhitespace()->notEmpty()->MatchesPassword($this->auth->user()->password),
            'password' => v::noWhitespace()->notEmpty(),
        ]);
        if ($validation->failed()){
            $this->flash->addMessage('error', "Password Change Fail");
            return $response->withRedirect($this->router->pathFor('auth.password.change'));
        }
        $this->auth->user()->setPassword($request->getParam('password'));

        $this->flash->addMessage('info', "Password Changed");
        return $response->withRedirect($this->router->pathFor('home'));
    }

}