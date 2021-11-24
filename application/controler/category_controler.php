<?php 
	require_once '../models/blogpost.php';
    require_once '../models/user.php';
    require_once '../models/category_type.php';
    require_once '../models/blog_post_comments.php';

    $in_category = new category_types();
    if (isset($_POST['addcat'])) {
    	$addCat=$_POST['addcat'];
    	$dataToInsert = array(
            'name' => $addCat
        );
    	$in_category->insert($dataToInsert);
    }


    




 ?>