<?php
/**
 * Created by PhpStorm.
 * User: tmack
 * Date: 2016/11/11
 * Time: 9:40 AM
 */

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;

class ProfileController extends Controller
{
    public function getChangeProfile($request, $response)
    {
        return $this->view->render($response, 'auth/profile/change.twig');
    }

    public function postChangeProfile($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'age' => v::notEmpty()->age(),
            'interests' => v::notEmpty()->alpha(),
            'phone_number' => v::notEmpty()->phone(),
    ]);

        if ($validation->failed()) {
            $this->flash->addMessage('error', 'Profile Failed To Update!');
            return $response->withRedirect($this->router->pathFor('auth.profile'));
        }
        $this->auth->user()->updateProfile(
            $request->getParam('age'),
            $request->getParam('interests'),
            $request->getParam('phone_number')
        );
        $this->flash->addMessage('info', 'You have Succesfully updated your Profile');
        return $response->withRedirect($this->router->pathFor('home'));
    }
}