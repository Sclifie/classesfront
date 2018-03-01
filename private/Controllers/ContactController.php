<?php

namespace MyNewProject\MySiteOnClasses\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Web\Engine\Controller as AppController;
use MyNewProject\MySiteOnClasses\Model\PageModel as Model;
use MyNewProject\MySiteOnClasses\Plugins\DataValidator as Validate;


class ContactController extends AppController
{
    public $page_view = "/templates/contacts.twig";
    public $template_source = 'template.php';
    protected $data=[

    ];
    private $model;
    function __construct()
    {
        $this->model = new Model();
    }
    function index(Request $request)
    {
        $this->data['navigation'] = $this->model->getPageData();
        $this->twig($this->page_view,$this->data);
        var_dump($this->data);
        return new Response('',200);
    }
}