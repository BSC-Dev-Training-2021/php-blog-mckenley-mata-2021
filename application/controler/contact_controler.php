<?php 
	require_once '../models/category_type.php';
    $category_types = new category_types();
    $cat_types = $category_types->findAll();
 ?>