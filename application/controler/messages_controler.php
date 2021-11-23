<?php 
	require_once '../application/models/category_type.php';
    $category_types = new category_types();
    $cat_types = $category_types->findAll();

 ?>