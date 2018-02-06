<?php
namespace MyNewProject\MySiteOnClasses\Controllers;

use MyNewProject\MySiteOnClasses\Model;

class Controller
{
    public $page_view,$page_title,$page_description,$template_source;

    protected function __construct(
                                   $page_title = 'Страница не найдена',  // Будет имитировать 404
                                   $page_description = 'Страница не найдена',
                                   $page_view = '../View/404.php',
                                   $template_source = '../private/View/template.php'
                                    )

                                {
                                    $this->page_title = $page_title;
                                    $this->page_description = $page_description;
                                    $this->page_view = $page_view;
                                    $this->template_source = $template_source;
                                    $page_data_static = [];
                                }
    protected function getSetDataFrom($file_name){

    }

    protected function pushDataToView(){
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
        // обнуление контроллера по завершении использования
        // TODO: Implement __destruct() method.
    }

    public function index()
    {
        $page_data = self::pushDataToView();
        var_dump($page_data);
        extract($page_data);
        var_dump(123,$page_title,321,$page_description);
        $template = self::selectTemplate();
        include $template;
        $page_view = self::selectView();
        include $page_view;
    }
}