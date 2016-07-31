<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/31/2016
 * Time: 5:33 AM
 */

$app->get('/',  'WelcomeController:index');
$app->get('/welcome', 'WelcomeController:index');

$app->get('/home', 'HomeController:home')->setName('home');

$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');