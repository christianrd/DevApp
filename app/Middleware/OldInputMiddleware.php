<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 8/1/2016
 * Time: 11:24 AM
 */

namespace App\Middleware;


class OldInputMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
            $this->container->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
            $_SESSION['old'] = $request->getParams();

        $response = $next($request, $response);
        return $response;
    }
}