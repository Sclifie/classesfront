<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 24.02.2018
 * Time: 19:15
 */

namespace MyNewProject\MySiteOnClasses\Plugins;


use MyNewProject\MySiteOnClasses\Model\Model;

class FileLoader
{
    private $dir_name;
    private $model;
    public function __construct($dir_name = __DIR__ . "/users_data/tmp/",$model = null)
    {
        $this->dir_name = $dir_name;
        $this->model = $model;
    }



    function index(){

    }

    function fileUp(){

        $uploaddir = getcwd().DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR;
        $uploadfile = $uploaddir.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

    }

}