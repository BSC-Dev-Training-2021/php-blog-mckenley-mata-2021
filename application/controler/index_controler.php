<?php 
	require_once '../models/blogpost.php';
	require_once '../models/category_type.php';
	if (isset($_GET['filter_id'])) {
        $blogpost_obj = new blogpost();
        $results=$blogpost_obj->filtering_innerJoin($_GET['filter_id']);
    }else{
    	$blogpost_obj = new blogpost();
        $results=$blogpost_obj->findAll();
    }
                    
    $blog_val = 1;

    $category_types = new category_types();
    $cat_types = $category_types->findAll();
 ?>