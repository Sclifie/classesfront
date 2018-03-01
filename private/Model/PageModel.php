<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 01.03.2018
 * Time: 1:48
 */

namespace MyNewProject\MySiteOnClasses\Model;

use Web\Engine\DB;

class PageModel
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getPageData(){
       $nav = $this->db->selectAllFromTable("SELECT nav_title, nav_href, nav_id FROM main_nav WHERE 1");
       return $nav;
    }
}