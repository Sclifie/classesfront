<?php
namespace MyNewProject\MySiteOnClasses\Controllers;


require_once  __DIR__ . '/../vendor/autoload.php';

class Router
{
    static function run(){
        /** @var Index классов контроллера $controller_name */
        $controller_name  = 'IndexController';
        /** @var  index() - метод класса $controller_name по умолчанию index() $method_name */
        $method_name = 'index';

        $params = $_GET;
        // первая часть названия (*.Index) классов строго соответствуют запросам
        $routes = explode('/',$_SERVER['REQUEST_URI']);


        /* Проверка GET */
        if(!empty($params)){
            foreach ($routes as &$val){
                $val = stristr($val," ?",true);
                echo $val;
            }}


        /*Проверка перовой части урла*/
        if (!empty($routes[1])){
            var_dump('Первая часть урла',$routes[1]);
            $controller_name = $routes[1] . 'Controller';
            }

        /*Проверка второй части урла*/
        if(!empty($routes[2])){
            var_dump('Вторая часть урла',$routes[2]);
            $method_name = $routes[2];
        }

        /* Проверка файла */
        $controller_fname = '../private/Controllers/' . $controller_name . '.php';
        if(file_exists($controller_fname)){
            var_dump('файл найден >',$controller_fname);
            require_once $controller_fname;
        } else {var_dump('файл не найден',$controller_fname);}

        /* Проверка класса */
        var_dump($controller_name);
        var_dump(class_exists('MyNewProject\MySiteOnClasses\Controllers\\'.$controller_name));
        if (class_exists('MyNewProject\MySiteOnClasses\Controllers\\' . $controller_name)){
            var_dump('Объект создан >',$controller_name);
            $controller_name = 'MyNewProject\MySiteOnClasses\Controllers\\' . $controller_name;
            $controller = new $controller_name();
        } else {var_dump('Класс в файле не обнаружен, что странно=)', $controller_name);}

        /* Проверка метода */
        if (method_exists($controller,$method_name)){
            var_dump('Метод запущен >',$method_name . '() с парметрами ...' . var_dump($params));
            $controller->$method_name();
        } else {var_dump('Метод не найден',$method_name . '() с парметрами ...' . var_dump($params));}
    }
}

Router::run();


# Название проекта : Сайт на классах.
# Дата начала работ : 04.02.2018
# Дата конца работ :
# Разработака и поддержка : gleb.kolesnikov89@yandex.ru vk.com/sclif
