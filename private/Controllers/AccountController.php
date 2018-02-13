<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 12.02.2018
 * Time: 12:05
 */

namespace MyNewProject\MySiteOnClasses\Controllers;

use Web\Engine\Controller as AppController;

class AccountController extends AppController
{
    public $page_view = 'account_view.php';
    public $template_source = 'account_template.php';
    public $data = [
        'title' => 'Ваш аккаунт'
    ];
    function __construct(){

    }

    function index(){
        $page = $this->generateResponse($this->page_view,$this->template_source,$this->data);
        return $page;
    }
}