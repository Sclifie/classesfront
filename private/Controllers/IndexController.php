<?php
namespace MyNewProject\MySiteOnClasses\Controllers;

class IndexController extends Controller
{
   public $page_title = 'Index';
   public $page_descrition = 'очень дескриптион';
   public $page_view = '../private/View/index_view.php';
   public $template_source = '../private/View/template.php';
   protected $page_data;
   function __construct()
   {
       parent::__construct($this->page_title,$this->page_descrition,$this->page_view,$this->template_source);
   }
   protected function start()
{

}
}