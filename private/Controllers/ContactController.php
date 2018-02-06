<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 06.02.2018
 * Time: 14:23
 */

namespace MyNewProject\MySiteOnClasses\Controllers;


class ContactController extends Controller
{
    public $page_title = 'Контакты';
    public $page_descrition = 'очень дескриптион 2';
    public $page_view = '../private/View/contact_view.php';
    public $template_source = '../private/View/template.php';
    protected $page_data;
    function __construct()
    {
        parent::__construct($this->page_title,$this->page_descrition,$this->page_view,$this->template_source);
    }
    protected function start()
    {

    }
}