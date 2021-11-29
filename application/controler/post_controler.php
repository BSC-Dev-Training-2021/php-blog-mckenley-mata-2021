<?php 
    require_once '../models/blogpost.php';
    require_once '../models/category_type.php';

    $blogpost_obj = new blogpost();
    $blog_post_categories = new blog_post_categories();
    $category_types = new category_types();
    $cat_types = $category_types->findAll();

    

    if (isset($_POST['submit'])) {
        $checkbox = $_POST['checkbox'];
        $nameimg = "../../img_src/".$_FILES['file']['name'];
        
        $targetFile = '../../img_src/' . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile) != TRUE) {
            echo "Failed to upload image!";
        }


        $title = $_POST['title'];
        $description = $_POST['description'];
        $content = $_POST['content'];

        $dataToInsert = array(
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'created_by' => 1,
            'img_link' => $nameimg
        ); 
        ///insert blogpost
        $blogpost_obj->insert($dataToInsert);
        $return_id=$blogpost_obj->id;
        
        ///show all the categories on checbox    
        foreach ($checkbox as $value) {
            $setdata = array(
                'blog_post_id'=> $return_id,
                'category_id'=> $value
            );
             $blog_post_categories->insert($setdata);
        } 

         
    } 
?>