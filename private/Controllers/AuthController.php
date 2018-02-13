<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 05.02.2018
 * Time: 15:33
 */

namespace MyNewProject\MySiteOnClasses\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Web\Engine\Controller as AppController;
use MyNewProject\MySiteOnClasses\Model\ModelAuth as Model;

class AuthController extends AppController
{

    public $page_view = 'auth_view.php';
    public $template_source = 'template.php';
    public $data = [
        'title' => 'Авторизация'
    ];
    private $model;
    function __construct(){
       $this->model = new Model();
    }

    function index()
    {
        $page = $this->generateResponse($this->page_view,$this->template_source,$this->data);
        return $page;
    }

    function authUser(){
        $post = $_POST['auth_user_data'];
        $post = $this->filterArr($post);
        if($post !== false){
            $bdanswer = $this->model->authUsers($post);
            $response = $this->generateAjaxResponse($bdanswer);
            return $response;
        }
        return 'php inject';
//        $new_user = new Model($this->users_file,$user_data);
//        $new_user->filterInputData();
//        $new_user->authUsers();
    }
    function regUser($data){
            var_dump($data);
    }

    function filterArr($post)
    {
        $post = (json_decode($post, true, 5, 0));
        $post = str_replace(' ', '', $post);

        foreach ($post as &$value) {
            $value = trim($value, " \t\n\r\0\x0B");
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            if (strripos($value, '<?', 0) !== false) {
                return false;
            }
            unset($value);
        }
        return $post;
    }
}