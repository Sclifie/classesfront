<?php
const CLIENT_ID     = '6372731';
const CLIENT_SECRET = 'vrkx5s1mYrHXll1Zyd8C';
const REDIRECT_URI  =  'http://classesfront/';
const SERVICE_KEY = '2b3eff252b3eff252b3eff25802b5fc25e22b3e2b3eff2571bab672e7599f2d5919bb3f';
$scope_list = [
    'notify' => 1,
    'friends ' => 2,
    'photos' => 4,
    'audio' => 8,
    'video' => 16,
    'pages' => 128,
    'add_url' => 256,
    'status' => 1024,
    'messages' => 4096,
    'ads' => 32768,
    'docs' => 131072,
    'groups' => 262144,
    'notifications' => 524288,
    'email' => 4194304,
    'market' => 134217728
];
?>


<a href="https://oauth.vk.com/authorize?client_id=<? echo CLIENT_ID ?>&display=page&redirect_uri=<? echo REDIRECT_URI ?>&scope=<? $scope_list['email'] ?>&response_type=code"


<? var_dump($_GET); ?>