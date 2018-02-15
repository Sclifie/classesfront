<?php
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 15.02.2018
 * Time: 15:55
 */

namespace MyNewProject\MySiteOnClasses\plugins;

use MyNewProject\MySiteOnClasses\Controllers\AccountController as Auth;

class VKAuth
{


    /**
     * @return array
     */
    public function getScopeList(): array
    {
        return $this->scope_list;
    }
}