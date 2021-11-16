<?php 
require_once 'function.php';

spl_autoload_register(function($class){
	require_once $_SERVER['DOCUMENT_ROOT'].'/php-blog-mckenley-mata-2021/class/'.$class.'.php';
});


 ?>