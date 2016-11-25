<?php

defined('APPLICATION_PATH')
	|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/src'));

spl_autoload_extensions('.php');
spl_autoload_register(function ($class_name) {
    include APPLICATION_PATH."/$class_name.php";
});
