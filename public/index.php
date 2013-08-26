<?php
define('ROOT_DIRECTORY', dirname(__DIR__));
var_export(scandir(ROOT_DIRECTORY));
var_export(scandir(ROOT_DIRECTORY . '/config/'));

require_once(ROOT_DIRECTORY . '/config/Config.php');
require_once(ROOT_DIRECTORY . '/library/startup.php');

dispatch();