<?php

use App\Middleware\AuthMW;
use App\Middleware\GuestMW;


$app->get('/', 'HomeController:index')->setName('home');

$app->group('', function () {

//sign up
    $this->get('/auth/signup', 'AuthController:GetSignUp')->setName('auth.signup');
    $this->post('/auth/signup', 'AuthController:PostSignUp');
//sign in
    $this->get('/auth/signin', 'AuthController:GetSignIn')->setName('auth.signin');
    $this->post('/auth/signin', 'AuthController:PostSignIn');
})->add(new GuestMW($container));
//logged in can only access
$app->group('', function (){
//signout
    $this->get('/auth/signout', 'AuthController:GetSignOut')->setName('auth.signout');
//change password
    $this->get('/auth/password/change', 'PasswordController:GetChangePassword')->setName('auth.password.change');
    $this->post('/auth/password/change', 'PasswordController:PostChangePassword');
//profile
    $this->get('/auth/profile/change', 'ProfileController:GetChangeProfile')->setName('auth.profile.change');
    $this->post('/auth/profile/change', 'ProfileController:PostChangeProfile');

})->add(new AuthMW($container));
