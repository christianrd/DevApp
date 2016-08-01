<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 8/1/2016
 * Time: 3:46 PM
 */

namespace App\Auth;


use App\Models\User;

class Auth
{
    public function user()
    {
        return User::find($_SESSION['user']);
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }

    public function attempt($email, $password)
    {
        $user = User::where('email',$email)->first();

        if (!$user)
        {
            return false;
        }

        if (password_verify($password, $user->password)){
            $_SESSION['user'] = $user->id;
            return true;
        }

        return false;
    }
}