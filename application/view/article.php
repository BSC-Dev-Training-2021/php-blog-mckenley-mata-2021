<?php 
include '../controler/article_controler.php';
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post - Start Bootstrap Template</title>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/app.js"></script>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="category.php">Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="messages.php"><i class="fa fa-envelope-o"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                
                                <h1 class="fw-bolder mb-1"><?php echo $blogPostData['title']; ?></h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Posted on <?php echo $blogPostData['date_created']; ?> by 
                                    <?php 
                                        echo $userData['name'];
                                     ?>
                                </div>
                                <!-- Post categories-->
                                <?php 
                                    foreach ($show_cat as $value) {
                                 ?>
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $value['name']; ?></a>
                                <?php } ?>
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo $blogPostData['img_link']; ?>" alt="..." /></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                <p class="fs-5 mb-4">
                                    <?php echo $blogPostData['content']; ?>
                                </p>
                            </section>
                        </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->

                                <form class="mb-4" method="post" action="article.php?id=<?php echo $id; ?> ">
                                    <div>
                                        <textarea class="form-control mb-2" rows="3" placeholder="Join the discussion and leave a comment!" name="user-comment"></textarea>

                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary" name="submit">Post Comment</button>
                                    </div>
                                </form>
                                <!-- Comment with nested comments-->
                                    <?php 
                                        foreach ($blog_post_result as $value) { /// loop all the data from database
                                    ?>
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->

                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">
                                                <?php 
                                                    echo $userData['name'];
                                                ?>
                                            </div>
                                                <?php echo $value['comment']; ?>
                                        </div>
                                    </div>
                                <?php } ?>                            
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <?php 
                                    foreach ($cat_types as $category_values) {
                                 ?>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!"><?php echo $category_values['name']; ?></a></li>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
