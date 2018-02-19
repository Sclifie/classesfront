<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 19.02.2018
 * Time: 21:43
 */

namespace MyNewProject\MySiteOnClasses\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Web\Engine\Controller as AppController;
use MyNewProject\MySiteOnClasses\Model\ModelAuth as Model;
use MyNewProject\MySiteOnClasses\Plugins\DataValidator as Validate;

class CatNewsController
{
    private $template;
    private $view;
    private $data;
    private $model;
    private $get;

    function __construct()
    {
        $this->get =
    }

    function
}