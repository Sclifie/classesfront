<?php

namespace MyNewProject\MySiteOnClasses\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Web\Engine\Controller as AppController;
use MyNewProject\MySiteOnClasses\Model\ModelAuth as Model;
use MyNewProject\MySiteOnClasses\Plugins\DataValidator as Validate;


class ContactController extends AppController
{
    public $page_view = "/templates/contacts.twig";
    public $template_source = 'template.php';
    protected $data = [
        'name' => 'Gleb',
        'age' => '29'
    ];
    private $model;
    function __construct()
    {
        $this->model = new Model();
    }
    function index(Request $request)
    {
        $hello = $request->getUserInfo();
        $this->twig($this->page_view,$this->data);
        return new Response('',200);
    }
}