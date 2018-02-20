<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 20.02.2018
 * Time: 7:14
 */

namespace MyNewProject\MySiteOnClasses\Model;


use Web\Engine\DB;

class ModelPost
{
    private $db;
    private $table;
    private $time;

    function __construct()
    {
        $this->time = date("Y-m-d H:i:s");
        $this->db = DB::getInstance();
        $this->table = 'posts';
    }
    function getNews($param){
        $sql = "SELECT * FROM $this->table WHERE $param[0] <= post_id <= $param[1]";
        $news = $this->db->selectAllFromTable($sql);
        var_dump($news);
        return $news;
    }
}