<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/31/2016
 * Time: 4:22 PM
 */

namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends DevAppController
{
    public function home($request, $response)
    {

        return $this->view->render($response, 'home.twig', [
            'name'  =>  'Christian D. Rodríguez',
            'title' =>  'Home'
        ]);
    }
}