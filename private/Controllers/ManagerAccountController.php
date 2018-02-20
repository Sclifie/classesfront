<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 20.02.2018
 * Time: 7:33
 */

namespace MyNewProject\MySiteOnClasses\Controllers;

use MyNewProject\MySiteOnClasses\Model\ModelModerator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Web\Engine\Controller as AppController;
use Symfony\Component\HttpFoundation\Session\Session;
use Web\Engine\DB;

class ManagerAccountController extends AppController
{
    private $manager_id;
    private $model;
    public $page_view = 'moderator_view.php';
    public $template_source = 'template.php';
    protected $data = [
        'title' => 'Управление информацией',
    ];
    function __construct()
    {
        $this->model = new ModelModerator();
    }

    function index(){

        return $this->generateResponse($this->page_view,$this->template_source,$this->data);
    }

    function getUser(Request $request){
        $hello = $request->get('getData');
        return new Response($hello,200);
    }

    function updateUsers(Request $request){
        $data = $request->get('getData');
        $data_response = $this->model->getUsers($data);
        return new Response($data_response,200);
    }

    function getNews(Request $request){
        $data = $request->get('getData');
        $data_response = $this->model->getNews($data);
        return new Response($data_response,200);
    }

    function updateNews(){

    }

    function sendMessage(){

    }
}