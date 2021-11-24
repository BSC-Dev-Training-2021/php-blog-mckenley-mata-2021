<?php 
	require_once '../models/blogpost.php';
	require_once '../models/category_type.php';

    $category_types = new category_types();
    $cat_types = $category_types->findAll();
    $blogpost_obj = new blogpost();
    if (isset($_GET['cat_id'])) {
        $filtering_results=$blogpost_obj->filtering_innerJoin($_GET['cat_id']);
    }else{
        $filtering_results=$blogpost_obj->findAll();  
    }

    $blog_val = 1;
 ?>