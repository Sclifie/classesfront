<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 05.02.2018
 * Time: 20:09
 */

namespace MyNewProject\MySiteOnClasses\Model;




class Model
{
    private $file_name;
    private $data;
    public $response =[];

    function __construct($file_name,$data)
    {
        $this->file_name = $file_name;
        $this->data = $data;
    }

    function getDataFromFile(){
        $file_open = file_get_contents($this->file_name);
        return unserialize($file_open);
    }

    function filterInputData(){
        foreach ($this->data as &$value){
            $value = trim($value, " \t\n\r\0\x0B");
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            if (strpos($value,'<?',0) !==false){
                echo 'попытка внедрения PHP';
                $this->response[] += false;
                return false;
            }
            unset($value);
        }
        return true;
    }

}