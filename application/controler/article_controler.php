<?php 

    require_once '../models/blogpost.php';
    require_once '../models/user.php';
    require_once '../models/category_type.php';
    require_once '../models/blog_post_comments.php';


    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = 1;
    $blogpost_obj = new blogpost();

    $blogPostData = $blogpost_obj->findById($id);
    $user_obj = new user();
    $userData = $user_obj->findById($user_id);

    }

    if (isset($_POST['user-comment'])) {
        $n_comment = new blog_post_comments();

        $dataTo_Insert = array(
            'comment' => $_POST['user-comment'],
            'user_id' => $user_id,
            'blog_post_id' => $id
        );
          $n_comment->insert($dataTo_Insert);
    }

    ///show selected category types
    $category_types = new category_types();
    $show_cat = $category_types->innerJoin($id);

    ///show comments
    $int_num = (int) $_GET['id'];                   
    $blog_post_comments = new blog_post_comments();
    $blog_post_result = $blog_post_comments->findComments($int_num);

    ///show all category on cat-widget
    $cat_types = $category_types->findAll();

?>




