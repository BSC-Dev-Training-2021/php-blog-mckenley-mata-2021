<?php 
	require_once '../models/blogpost.php';
    require_once '../models/user.php';
    require_once '../models/category_type.php';
    require_once '../models/blog_post_comments.php';

    $category_types= new category_types();
                        $cat_val=$category_types->findAll();

    $in_category = new category_types();
    if (isset($_POST['btn_add_cat']) and isset($_POST['add_cat'])) {
        
        $addCat=$_POST['add_cat'];
        $dataToInsert = array(
            'name' => $addCat
            );
    	$in_category->insert($dataToInsert);
        header('location: ../view/category.php');
    }

    $cat_types=$category_types->findAll();


    




 ?>