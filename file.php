<?php

function foo($x)
{
    return $x('gehr') === 'true';
}
$x = str_rot13('gehr');
echo $x;

echo $_SERVER['DOCUMENT_ROOT'];
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 17.02.2018
 * Time: 23:08
 */