<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 05.02.2018
 * Time: 20:10
 */

namespace MyNewProject\MySiteOnClasses;


class Session
{
    public $current_session = [
        'auth_status' => '',
        'auth_login' => '',
    ];
    private $regenerated;

    private function __construct($current_session)
    {
        $this->current_sesion = $current_session;
    }
    static function regenerateSession(){
        if(isset(self::current_session)){

        }
    }
}