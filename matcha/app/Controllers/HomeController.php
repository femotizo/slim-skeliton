<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller
{
    public function index($request, $response)
    {

     /* creating a record
     User::create([
            'Name' => 'tony',
            'Surname' => 'Mack',
            'Email' => 'tonmanayo@poopo.com',
            'Password' => '123',
        ]);*/

        /* user model
        $user = User::where('email', 'tonmanayo@hotmail.com')->first();
        var_dump($user->Email);
        die();*/

      /*  $user = $this->db->table('users')->find('1');
        var_dump($user->Email);
        die();*/
        return $this->view->render($response, 'home.twig');
    }
}