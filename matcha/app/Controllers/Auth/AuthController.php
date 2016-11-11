<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{
    //signout

    public function getSignOut($request, $response)
    {
        $this->auth->logout();
        return $response->withRedirect($this->router->pathFor('home'));
    }

    //signin

    public function getSignIn($request, $response)
    {
        return $this->view->render($response, 'auth/signin.twig');
    }

    public function postSignIn($request, $response)
    {
        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth){
            $this->flash->addMessage('error', 'Wrong Email, Password Combination');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }
        return $response->withRedirect($this->router->pathFor('home'));

    }

    //signup
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth/signup.twig');
    }
/*checking if valid */
    public function postSignUp($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'name' => v::notEmpty()->alpha(),
            'surname' => v::notEmpty()->alpha(),
            'username' => v::notEmpty()->alnum()->noWhitespace()->AvalibleUsername(),
            'email' => v::noWhitespace()->notEmpty()->email()->AvalibleEmail(),
            'password' => v::noWhitespace()->notEmpty()->ValidPassword(),
        ]);

        if ($validation->failed()){
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }
/*regestering user */
        $users = User::create([
            'name' => $request->getParam('name'),
            'surname' => $request->getParam('surname'),
            'username' => $request->getParam('username'),
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),

        ]);

        $this->flash->addMessage('info', 'You have been signed up');

        return $response->withRedirect($this->router->pathFor('home'));
    }

}