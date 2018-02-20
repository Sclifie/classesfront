<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 20.02.2018
 * Time: 7:33
 */

namespace MyNewProject\MySiteOnClasses\Controllers;

use Web\Engine\Controller as AppController;
use Symfony\Component\HttpFoundation\Session\Session;
use Web\Engine\DB;

class ManagerAccount extends AppController
{
    private $manager_id;
    private $model;
    public $page_view = 'auth_view.php';
    public $template_source = 'template.php';
    protected $data = [
        'title' => 'Управление информацией',
        'vk_link' => null
    ];
    function __construct()
    {
        $this->model = new Model
    }
}