<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 8/1/2016
 * Time: 7:39 PM
 */

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\DevAppController;
use Respect\Validation\Validator as v;

class PasswordController extends DevAppController
{
    public function getChangePassword($request, $response)
    {
        $this->view->render($response, 'auth/password/change.twig', [
            'title' =>  'Change Password',
            'name'  =>  'Christian D. Rodríguez'
        ]);
    }

    public function postChangePassword($request, $response)
    {
        $validation = $this->validator->validate($request, [
           'password_old'   =>  v::noWhitespace()->notEmpty()->matchesPassword($this->auth->user()->password),
            'password'      =>  v::noWhitespace()->notEmpty()
        ]);

        if ($validation->failed())
        {
            return $response->withRedirect($this->router->pathFor('auth.password.change'));
        }

        $this->auth->user()->setPassword($request->getParam('password'));

        $this->flash->addMessage('info', 'your password was changed.');
        return $response->withRedirect($this->router->pathFor('home'));
    }
}