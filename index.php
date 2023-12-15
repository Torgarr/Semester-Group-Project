<?php
    require_once(".\\lib\\json.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>The ULTIMATE Gaming Website</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <?php
                        if (isset($_SESSION['email'])){
                            ?>
                            <li class="nav-item"><a class="nav-link" href="./Authentication/signout.php">Sign out</a></li>
                            <?php
                        }
                        else{
                            ?>
                            <li class="nav-item"><a class="nav-link" href="./Authentication/signin.php">Sign in</a></li>
                            <li class="nav-item"><a class="nav-link" href="./Authentication/signup.php">Sign up</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to The ULTIMATE Gaming Center Home!</h1>
                    <p class="lead mb-0">Your one-stop shop for all things gaming news!</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <h1>Here's Our Latest Post!</h1>
                    <br>
                        <?php
                            latestPost($pdo, 'SELECT * FROM posts ORDER BY Date_Created Desc');
                        ?>
                    <hr>
                    <br>
                    <h3>All Posts:</h3>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                readPosts($pdo, 'SELECT * FROM posts');
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">User Comments</div>

                        <?php
                            readComments($pdo, 'SELECT * FROM comment Join users on comment.User_ID=users.User_ID');
                        ?>

                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright Jakob Banta, Carson Rolph, and Dexter Walters &copy; The ULTIMATE Gaming Center 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
