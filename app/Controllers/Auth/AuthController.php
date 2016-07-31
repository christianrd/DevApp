<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/31/2016
 * Time: 5:47 PM
 */

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\DevAppController;

class AuthController extends DevAppController
{
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp($request, $response)
    {
        $user = User::create([
           'email'      =>  $request->getParam('email'),
            'name'      =>  $request->getParam('name'),
            'password'  =>  password_hash($request->getParam('password'), PASSWORD_DEFAULT)
        ]);

        return $response->withRedirect($this->router->pathFor('home'));
    }
}