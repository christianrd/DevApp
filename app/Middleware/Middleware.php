<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/31/2016
 * Time: 11:30 PM
 */

namespace App\Middleware;


class Middleware
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
}