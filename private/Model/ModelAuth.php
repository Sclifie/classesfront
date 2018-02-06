<?php
namespace MyNewProject\MySiteOnClasses;
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 05.02.2018
 * Time: 19:07
 */

class ModelAuth extends Model
{
    private $check_email;
    private $check_login;
    function __construct($file_name, $data)
    {
        parent::__construct($file_name, $data);
    }

    function authUsers(){
        var_dump('Авторизация');
    }
    function regUsers(){
        var_dump('регистрация пользователя');
    }
    function checkUserReg(){
        var_dump('чек происходит...');
    }
    function inputDataInFile(){   //немного не универсально, но всё-же
        var_dump('происходит запись пользователя');
    }
}