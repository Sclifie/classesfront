<?php
namespace MyNewProject\MySiteOnClasses\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Web\Engine\Controller as AppController;

class IndexController extends AppController
{

   public $page_title = 'Index';
   public $page_descrition = 'очень дескриптион';
   public $page_view = 'index_view.php';
   public $template_source = 'template.php';
   public $data = ['title' => 'index'];
   function __construct()
   {
       $this->page_view;
       $this->template_source;
       $this->data;
   }

   public function index(){
       $page = $this->generateResponse($this->page_view,$this->template_source,$this->data);
       return $page;
   }

}