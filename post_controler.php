<?php 


$blogpost_obj= new blogpost();
$blog_post_categories=new blog_post_categories();

if (isset($_POST['submit'])) {
    $checkbox=$_POST['checkbox'];
    $nameimg ="src/".$_FILES['file']['name'];
    

    $targetFile = 'src/' . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {

    }


    $title=$_POST['title'];
    $description=$_POST['description'];
    $content = $_POST['content'];

    $dataToInsert = array(
        'title' => $title,
        'description' => $description,
        'content' => $content,
        'created_by' => 1,
        
        'img_link'=> $nameimg
 
    ); 

    $blogpost_obj->insert($dataToInsert);


    $return_id=$blogpost_obj->id;
        
    foreach ($checkbox as $value) {

        $setdata= array(
            'blog_post_id'=> $return_id,
            'category_id'=> $value
        );
         $blog_post_categories->insert($setdata);
    }
} ?>