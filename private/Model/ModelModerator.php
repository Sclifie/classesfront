<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 20.02.2018
 * Time: 7:54
 */

namespace MyNewProject\MySiteOnClasses\Model;

use Web\Engine\DB;
use DateTime;
use MyNewProject\MySiteOnClasses\Plugins\DataValidator;

class ModelModerator
{
    private $time;
    private $db;
    private $table;
    function __construct()

        //TODO:СТАТУСЫ ОТВЕТА

    {
        $this->time = date("Y-m-d H:i:s");
        $this->db = DB::getInstance();
    }

    function getNews($data){ //TODO:VAlidate array from ajax
        $this->table = 'posts';
        $data = json_decode($data,true);
        $count = $data['countElem'];
        $sql = "SELECT * FROM $this->table WHERE post_id < $count";
        $data['data'] = $this->db->selectAllFromTable($sql);
        unset($data['countElem']); //TODO: UNSET ALL save new data
        unset($data['type']);
        return json_encode($data,JSON_FORCE_OBJECT);
    }
    function getUsers($data){
        $this->table = 'users';
        $data = json_decode($data,true, 5);
        $count = $data['countElem'];
        $sql = "SELECT `id`,`user_email`,`user_login`,`user_register_date`,`first_name`,`last_name`,`photo_min`,`user_phone` FROM `users` WHERE id < $count";
        $data = $this->db->selectAllFromTable($sql);
        unset($data['countElem']);
        unset($data['type']);
        return $data;
    }
}