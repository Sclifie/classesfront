<?php
//namespace MyNewProject\MySiteOnClasses\Controllers;

use Web\Engine\DB;
use MyNewProject\MySiteOnClasses\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MyNewProject\MySiteOnClasses\Session as Session;

class Controller
{
    public $data = [
        'title' => 404
    ];
    public $page_view;
    public $template_source;
    public $page_settings = [];

    public function __construct($page_view,$template_source,$data,$page_settings=['activate_all' => 'Y'])
                                {
                                    $this->page_view = $page_view;
                                    $this->template_source = $template_source;
                                    $this->data = [
                                        'title' => 404
                                    ];
                                    $this->$page_settings = $page_settings;
                                }
    protected function getSetDataFrom($file_name){

    }

    protected function generateDataToView(){
        $data_array_for_view = [
            "page_title" => $this->page_title,
            "page_description" => $this->page_description,
            "page_view" => $this->page_view,
        ];
        return $data_array_for_view;
    }

    protected function selectView(){
        var_dump('сорс к вью',$this->page_view);
        return $this->page_view;
    }

    protected function selectTemplate(){
        var_dump('сорс к темплату',$this->template_source);
        return $this->template_source;
    }

    function __destruct()
    {
        unset($data);
    }

    public function index()
    {
        $page_data = self::generateDataToView();
        extract($page_data);
        $template = self::selectTemplate();
        include $template;
        $page_view = self::selectView();
        include $page_view;
        return new Response('');
    }

    public function postAjax($data){
        return new Response($data = ['hello' => 'hello']);
    }
}