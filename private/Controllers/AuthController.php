<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 05.02.2018
 * Time: 15:33
 */

namespace MyNewProject\MySiteOnClasses\Controllers;

//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Web\Engine\Controller as AppController;
use MyNewProject\MySiteOnClasses\Model\ModelAuth as Model;

class AuthController extends AppController
{
    const CLIENT_ID     = '6372731';
    const CLIENT_SECRET = 'vrkx5s1mYrHXll1Zyd8C';
    const REDIRECT_URI  =  'http://classesfront/loginvk';
    public $scope_list = [
        'notify' => 1,
        'friends ' => 2,
        'photos' => 4,
        'audio' => 8,
        'video' => 16,
        'pages' => 128,
        'add_url' => 256,
        'status' => 1024,
        'messages' => 4096,
        'ads' => 32768,
        'docs' => 131072,
        'groups' => 262144,
        'notifications' => 524288,
        'email' => 4194304,
        'market' => 134217728
    ];
    public $page_view = 'auth_view.php';
    public $template_source = 'template.php';
    protected $data = [
        'title' => 'Авторизация',
        'vk_link' => null
    ];
    private $tmp_obj;
    private $model; //TODO:plugin/VKauth
    function __construct(){
        $this->data['vk_link'] = "https://oauth.vk.com/authorize?client_id=". self::CLIENT_ID . "&display=page&redirect_uri=" . self::REDIRECT_URI . "&scope=" . $this->scope_list['email'] . "&response_type=code";
        $this->model = new Model();
    }

    function index()
    {
        var_dump($this->data);
        $page = $this->generateResponse($this->page_view,$this->template_source,$this->data);
        return $page;
    }
    function authFromVk(){
        $hello = new Request()
        var_dump()
    }
    function authUser(){ //TODO:session add
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
    function regUser(){
            $post = $_POST['reg_users_data'];
            $post = $this->filterArr($post);
            if ($post !== false){
                $bdanswer = $this->model->regUsers($post);
                $response = $this->generateAjaxResponse($bdanswer);
                return $response;
            }
            return 'php inject';
    }

    /**
     * @param $post your !JSON! array for validate
     * @return bool|mixed return false if feel php code else return $post - associated array
     */
    function filterArr($post) //TODO: plugins/DataValidator filterArr(method)
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