<?php 
    include '../controler/category_controler.php';
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
        <?php include 'header.php'; ?>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">Category</h1>
                    </header>
                    <div class="card mb-4">
                        <form method="post" action="category.php">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Insert your category here." aria-label="Enter search term..." aria-describedby="button-search" name="add_cat" required  />
                                <button class="btn btn-primary" id="button-search" type="submit" name="btn_add_cat">Add Category</button>
                            </div>
                        </form>
                    </div>
                    <!-- Submitted messages -->
                    <section>
                        <div class="card mb-2">
                            <?php 
                                foreach ($cat_val as $cat_values) { 
                            ?>
                            <div class="card-body">
                                <form method="post">
                                    <li class="list-group-item">
                                        <?php echo $cat_values['name']; ?>
                                            <input type="hidden" name="cat_id" value="<?php echo $cat_values['id'] ?>">
                                            <button type="submit" class="btn btn-warning float-right" name="update-btn">Update</button>
                                            <button type="submit" class="btn btn-danger float-right" name="delete-btn">Delete</button>
                                    </li>
                                </form>  
                            </div>
                            <?php } ?>
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
        <?php include 'footer.php'; ?>
    </body>
</html>
