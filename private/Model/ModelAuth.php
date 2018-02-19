<?php
namespace MyNewProject\MySiteOnClasses\Model;

use Web\Engine\DB;
use DateTime;
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
    private $time;

    //Table users
    const USER_EMAIL = 'user_email';
    const USER_PASSWORD = 'user_password';
    const USER_LOGIN = 'user_login';

    //Statuses
    const USER_ADDED = 'ok_add';
    const USER_AUTH = 'ok_auth';
    const USER_NOT_FOUND = 'usr_not_found';
    const USER_WRONG_PASSWORD = 'wrong_pw';
    const USER_DUPLICATE_EMAIL = 'user_duplicate_email';
    const USER_DUPLICATE_PHONE = 'user_duplicate_phone';
    const USER_DUPLICATE_LOGIN = 'user_duplicate_login';
    const ERROR = 'error';

    function __construct()
    {
        $this->time = date("Y-m-d H:i:s");
        $this->db = DB::getInstance();
        $this->table = 'users';
    }

    function authUsers($data){ //TODO:password in hash
        $sql = "SELECT `user_email`,`user_password` FROM $this->table WHERE `user_email`=:user_email";
        $answer = $this->db->selectByParam($sql,['user_email'=>$data['userEmail']]);
        if($answer){
            if($data['userPassword'] == $answer['user_password']){
                $up = $answer['user_email'];
                $sqlup = "UPDATE $this->table SET 'user_last_log'=DEFAULT WHERE user_email=:$up";
                $update = $this->db->update($sqlup);
                if ($update !== true){return self::ERROR;}
                return self::USER_AUTH;
            }
            return self::USER_WRONG_PASSWORD;
        }
        return self::USER_NOT_FOUND;
    }
    function regUsers($data){ //TODO:VALIDATE PHONE == LOGIN == EMAIL
        $check = $this->authUsers($data);
        if ($check == self::USER_AUTH){
            return self::USER_DUPLICATE_EMAIL;
        }
        if ($check == self::USER_WRONG_PASSWORD or self::USER_NOT_FOUND){
            $sql =
                "INSERT INTO $this->table 
                       (`id`, `user_email`, `user_password`, `user_login`, `user_register_date`) 
                VALUES (DEFAULT,:userEmail,:userPassword,:userLogin,DEFAULT)";
            $answer = $this->db->insertIntoTable($sql,$data);
            if($answer === false){
                return self::ERROR;
            }
            return self::USER_ADDED;
        }
        return self::ERROR;
    }
    function checkUserReg(){
        var_dump('чек происходит...');
    }
    function inputDataInFile(){   //немного не универсально, но всё-же
        var_dump('происходит запись пользователя');
    }
    function authFromApi($data){
        //чек мыла или телефона
        var_dump($data);
        $sql = "INSERT INTO users_vk_info (access_token, vk_token_expired, uid, user_email, domain, nick, photo_vk, verified, first_name, last_name) VALUES (:access_token,:vk_token_expired,:uid,:user_email,:domain_n,:nickname,:photo_400_orig,:verified,:first_name,:last_name)";
        $answer = $this->db->insertIntoTable($sql,$data);
        var_dump($answer);
        if ($answer === false){
            return self::ERROR;
        }
        return self::USER_ADDED;
    }
}