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
use Respect\Validation\Validator as v;

class AuthController extends DevAppController
{

    public function getSignOut($request, $response)
    {
        $this->auth->logout();

        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignIn($request, $response)
    {
        return $this->view->render($response, 'auth/signin.twig', [
            'name'  =>  'Christian D. Rodríguez',
            'title' =>  'Sign in'
        ]);
    }

    public function postSignIn($request, $response)
    {
        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth){
            $this->flash->addMessage('error', 'Could not sign you in with those details.');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth/signup.twig', [
            'name'      =>  'Christian D. Rodríguez',
            'title'     =>  'Sign up'
        ]);
    }

    public function postSignUp($request, $response)
    {

        $validation = $this->validator->validate($request, [
            'email'     =>  v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'name'      =>  v::notEmpty()->alpha(),
            'password'  =>  v::noWhitespace()->notEmpty(),
            'avatar'    =>  V::noWhitespace()
        ]);

        if ($validation->failed())
        {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $user = User::create([
           'email'      =>  $request->getParam('email'),
            'name'      =>  $request->getParam('name'),
            'password'  =>  password_hash($request->getParam('password'), PASSWORD_DEFAULT),
            'avatar'    =>  $request->getParam('avatar')
        ]);

        $this->flash->addMessage('info', 'You have been signed up!');

        $this->auth->attempt($user->email, $request->getParam('password'));

        return $response->withRedirect($this->router->pathFor('home'));
    }
}