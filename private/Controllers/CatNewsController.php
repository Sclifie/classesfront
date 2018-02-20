<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 19.02.2018
 * Time: 21:43
 */

namespace MyNewProject\MySiteOnClasses\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Web\Engine\Controller as AppController;
use MyNewProject\MySiteOnClasses\Model\ModelAuth as Model;
use MyNewProject\MySiteOnClasses\Plugins\DataValidator as Validate;
use MyNewProject\MySiteOnClasses\Model\ModelPost;

class CatNewsController
{
    private $template_source = 'template.php';
    private $page_view = 'auth_view.php';
    private $data;
    private $model;
    private $params;

    function __construct($params)
    {
        $this->params = $params;
        $this->model = new ModelPost();
        $this->data = null; //получить всё или по гету
    }

    function index(){

    }

    public function getNews(){
        $news =  $this->model->getNews($this->params);
        return $news;
    }
}