<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 8/1/2016
 * Time: 11:18 PM
 */

namespace App\Middleware;


class AuthMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        if (!$this->container->auth->check()){
            $this->container->flash->addMessage('error', 'Please sign in before doing that.');
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }

        $response = $next($request, $response);
        return $response;
    }
}