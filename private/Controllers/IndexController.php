<?php
namespace MyNewProject\MySiteOnClasses\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Web\Engine\Controller as AppController;

class IndexController extends AppController
{

   public $page_title = 'Index';
   public $page_descrition = 'очень дескриптион';
   public $page_view = 'index_view.php';
   public $template_source = 'template.php';
   public $data;
   function __construct()
   {
       $this->page_view;
       $this->template_source;
       $this->data = array(
           'page_title' => 'index',
           'last_news' => null
       );
   }

   public function index(){ //TODO: вывод макссимального количества символов + ссылочку
       $last_news = new CatNewsController(array(1,4));
       $this->data['last_news'] = $last_news->getNews();
       $page = $this->generateResponse($this->page_view,$this->template_source,$this->data);
       return $page;
   }


}