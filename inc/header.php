<?php
    require_once "core/autoload.php";
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    ob_start();//header ko html tag dwe nk yww yay ml so must need dude
    

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--  Font Awesome for Bootstrap fonts and icons -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <!-- Toastr css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- remix icon css -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>MM-Coder</title>
    <style>

    </style>
</head>

<body>
    <!-- Start Nav -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand text-warning" href="index.php">Blogging!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Articles</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?Php if(User::auth()){ ?>
                        <a class="dropdown-item" href="#">Welcome <?php echo User::auth()['name']; ?></a>
                        <a class="dropdown-item" href="profile.php?user=<?php echo User::auth()['slug']; ?>">My Profile</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <?php }else{ ?>
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="register.php">Register</a>
                        <?php } ?>
                    </div>
                </li>
                <?Php if(User::auth()){ ?> 
                    <li class="nav-item ml-5">
                        <a class="nav-link btn btn-sm  btn-warning" href="create.php">
                        <i class="fas fa-plus"></i>
                        Create Article</a>
                    </li>
                <?php } ?>
                

            </ul>
            <form class="form-inline my-2 my-lg-0" action="index.php?">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- Start Header -->

    <div class="jumbotron jumbotron-fluid header">
        <div class="container">
            <h1 class="text-white">Pure PHP CMS</h1>
            <p class="lead text-white">Hello Now I published this soucre code free.</p>
            <br>
            <?php 
                if(User::auth()){ ?>
                    <h3 class="text text-white">Welcome <?php echo User::auth()['name']; ?></h3>
                
           <?php }else{?>
            <a href="register.php" class="btn btn-warning">Create Account</a>
            <a href="login.php" class="btn btn-outline-success">Login</a>
            <?php } ?>
        </div>
    </div>

    <!-- Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 pr-3 pl-3">
                <!-- Category List -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h4>All Category</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            $categories = Database::raw("select * ,(select count(id) from articles where categories.id=category_id) as article_count from categories")->getAll();
                        ?>
                        <ul class="list-group">
                            <a href="index.php" style="text-decoration:none;" class="text text-white">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                All categories
                                <span class="badge badge-primary badge-pill">
                                    <?php echo Database::table('articles')->count(); ?>
                                </span>
                            </li>
                            </a>
                            
                            <?php foreach($categories as $category){ ?>
                                <a href="<?php echo "?page_no=1&category=".$category->slug;?>" style="text-decoration:none;" class="text text-white">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?php echo $category->name; ?>
                                        <span class="badge badge-primary badge-pill"><?php echo $category->article_count; ?></span>
                                    </li>
                                </a>
                            <?php } ?>
                            
                        </ul>
                    </div>

                </div>
                <hr>
                <!-- Language List -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h4>All Languages</h4>
                    </div>

                    <div class="card-body">
                        <?php 
                            $languages = Database::raw("Select * ,(select count(id) from article_language where article_language.language_id=languages.id) as article_count from languages")->getAll();
                            
                        ?>
                        <ul class="list-group">
                            <a href="index.php" style="text-decoration:none;" class="text text-white">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    All languages
                                    <span class="badge badge-primary badge-pill">
                                        <?php echo Database::table('articles')->count(); ?>
                                    </span>
                                </li>
                            </a>
                            <?php foreach($languages as $language){ ?>
                            <a href="<?php echo "?page_no=1&language=".$language->slug;?>" style="text-decoration:none;" class="text text-white">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $language->name; ?>
                                    <span class="badge badge-primary badge-pill"><?php echo $language->article_count; ?></span>
                                </li>
                            </a>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </div>

           
                
                                 
