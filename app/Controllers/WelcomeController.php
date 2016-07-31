<?php

/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/31/2016
 * Time: 6:01 AM
 */

namespace App\Controllers;

use Slim\Views\Twig as View;

class WelcomeController extends DevAppController
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'welcome/home.twig', [
            'name'  =>  'Christian D. Rodríguez'
        ]);
    }
}