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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Web\Engine\Controller as AppController;
use MyNewProject\MySiteOnClasses\Model\ModelAuth as Model;
use MyNewProject\MySiteOnClasses\Plugins\DataValidator as Validate;


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
    public $page_view = 'pages/authpage.twig';
    public $template_source = 'template.php';
    protected $data = ['vars' =>[
        'page_title' => 'Авторизация',
        'vk_link' => null],
    ];
    private $model; //TODO:plugin/VKauth
    function __construct(){
        $this->data['vk_link'] = "https://oauth.vk.com/authorize?client_id=". self::CLIENT_ID . "&display=page&redirect_uri=" . self::REDIRECT_URI . "&scope=" . $this->scope_list['email'] . "&response_type=code&v=5.52";
//        $this->model = new Model();
        parent::__construct($this->data);
    }

    final function index()
    {
        parent::index(Request::create('/auth'));
//        $hi = $request->getUserInfo();
//        $this->twig($this->page_view,$this->data);
//        return new Response('',200);
    }
    function authFromVk(){ //TODO:model->getSettings
        $this->scope_list =
            $this->scope_list['notify'] +
            $this->scope_list['messages'] +
            $this->scope_list['email'];

        // 'exports' можно добавить //
        //'quotes', //любимые цитаты заюзаем в ЛК проблема с получением - не понятно сколько получишь символов 2500 вроде максимум
        $fields_to_get = //scopelist
            [   'id', //id вк
                'first_name', //имя
                'last_name', //Фамилия
                'deactivated', //проверка на Деактиватед
                'hidden', //Проверка на скрытность без токена вернёт 1
                'domain', // то что в ссылке если есть
                'photo_400_orig', //400х400 фото если https://vk.com/images/camera_400.png вставлять DEFAULT
                'nickname', //отчество или ник
                'trending', //если есть - в приоритет либо не вернёт ничего либо 1
                'verified']; //надо подумать пропускать такого или нет =) ps пропускать т.к. чёт смотрю 3 из 3 акков не подтверждены

        $fields_to_get = implode(',',$fields_to_get);

        if(!$_GET['code']){
            exit('code error');
        }

        // Опция контекста

        $options = array(
            "http"=>array(
                "header"=>"User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
            )
        );

        $contextOptions = stream_context_create($options);

        $url = 'https://oauth.vk.com/access_token?client_id='. self::CLIENT_ID . '&redirect_uri=' . self::REDIRECT_URI . '&client_secret=' . self::CLIENT_SECRET . '&code=' . $_GET['code'] . '&v=5.52';

        try{
            $token = json_decode(file_get_contents($url, true,$contextOptions),true);
        } catch (\Exception $e){
            exit("Код исключения" . $e->getCode());
        }

        $time = date('U');

        $user_data = [
            'access_token' => (string) $token['access_token'], //токен
            'user_email' => (string) $token['email'], //мыло из вк
            'vk_token_expired' => (int) $token['expires_in'] + $time - 600 // время когда закончится токен для нашего сервера
        ];

        if(!isset($token)){
            exit('miss token');
        }

        $url = 'https://api.vk.com/method/users.get?user_id=' . $token['user_id'] . '&access_token='. $token['access_token'] . '&fields=' . $fields_to_get;

        try{
            $data = json_decode(file_get_contents($url, true, $contextOptions),true);
        } catch (\Exception $e){
            exit("Код исключения" . $e->getCode());
        }
        $response = $data['response'][0]; //TODO: нужно-ли удалять дата респонс
        $response['domain_n'] = $response['domain'];
        unset($response['domain']);
        if($response['nickname'] == ''){
            if ($response['domain_n'] == ''){
                $response['nickname'] = $response['first_name'] . $response['last_name'];
                if(preg_match('(([а-я][А-Я]))', $response['nickname'])){
                    $response['nickname'] = Validate::rus_to_translit($response['nickname']);
                }
                $response['domain_n'] = $response['nickname'];
            }
            $response['nickname'] = $response['domain_n'];
        }
        //TODO: Чек на присутствие E-mail и Никнейма === Логин
        $data = array_merge($user_data,$response);

        $action = $this->model->authFromApi($data);
        if ($action === 'error'){
            return new Response('ERROR'); //Тут формочку на js ретурнить будем
        } else {
            return new RedirectResponse('/account',302);
        }
        return Response::create('Что-то пошло не так... <a href="/">На Главную</a>', 200);
    }

    function authUser(Request $request){ //TODO:session add
        $post = $request->get('auth_user_data');
        $post = Validate::filterArr($post);
        var_dump($post);
        if($post !== false){
            $bdanswer = $this->model->authUsers($post);
            $response = $this->generateAjaxResponse($bdanswer);
            return $response;
        }
        return 'php inject';

    }
    function regUser(Request $request){
            $post = $request->get('reg_users_data');
            $post = Validate::filterArr($post);
            var_dump($post);
            if ($post !== false){
                $bdanswer = $this->model->regUsers($post);
                $response = $this->generateAjaxResponse($bdanswer);
                return $response;
            }
            return 'php inject';
    }

}