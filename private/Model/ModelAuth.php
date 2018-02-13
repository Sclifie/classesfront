<?php
namespace MyNewProject\MySiteOnClasses\Model;

use Web\Engine\DB;
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 05.02.2018
 * Time: 19:07
 */

class ModelAuth
{
    private $db;
    private $table;

    const USER_ADDED = 'ok';
    const USER_AUTH = 'ok';
    const USER_NOT_FOUND = 'usr_not_found';
    const USER_WRONG_PASSWORD = 'wrong_pw';
    const USER_DUPLICATE_EMAIL = 'user_duplicate_email';
    const USER_DUPLICATE_PHONE = 'user_duplicate_phone';

    function __construct()
    {
        $this->db = DB::getInstance();
        $this->table = 'users';
    }

    function authUsers($data){
        $sql = "SELECT * FROM $this->table WHERE user_email=:user_email";
        $answer = $this->db->selectByParam($sql,['user_email'=>$data['userEmail']]);

        if($answer){
            if($data['userPassword'] == $answer['user_password']){
                return self::USER_AUTH;
            }
            return self::USER_WRONG_PASSWORD;
        }
        return self::USER_NOT_FOUND;
    }

    function regUsers(){

    }
    function checkUserReg(){
        var_dump('чек происходит...');
    }
    function inputDataInFile(){   //немного не универсально, но всё-же
        var_dump('происходит запись пользователя');
    }
}