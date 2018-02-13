<?php
use \Web\Engine\App;

require_once __DIR__ . '/../vendor/autoload.php';

$cfg = file_get_contents('../config.json');

$app = new App($cfg);
$app->run();