<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/31/2016
 * Time: 5:33 AM
 */

$app->get('/',  'HomeController:index');
$app->get('/welcome', 'WelcomeController:index');