<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/31/2016
 * Time: 6:09 AM
 */

namespace App\Controllers;


class DevAppController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        if ($this->container->{$property}){
            return $this->container->{$property};
        }
    }
}