<?php
session_start();
$_user_id = $_SESSION['id'] ?? 0;
$_user_name = $_SESSION['username'] ?? 0;
if ($_user_id && $_user_name) {
    header('Location: admin-dashboard.php');
    die();
}
include_once 'functions.php';

?>

<html>
<head>
    <title>Project</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        a {
            padding: 0px 10px;
        }
    </style>
</head>
<body>
<!---First row --->
<header>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <a href=""><img  class="timlogo" src="images/logo.jpg"></a>

            </div>
            <div class="col-6">
              <div class="login pull-right">
                  <ul class="list-unstyled mt-3">
                      <li>  <a class="btn btn-primary" href="#login-now">Login Now</a></li>
                  </ul>
              </div>
            </div>
        </div>
    </div>
</header>
<!---second row --->
<div class="carousel_section">
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-12">
                <div id="myCarousel" class="carousel slide container" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ul>
                    <!-- The slideshow -->
                    <div class="carousel-inner" style="height: 100%; width: 100%">
                        <div class="carousel-item active">
                            <img src="images/banner-1.jpg" width="1100" height="600">
                        </div>
                        <div class="carousel-item">
                            <img src="images/banner-2.jpg" width="1100" height="600">
                        </div>
                        <div class="carousel-item">
                            <img src="images/banner-3.jpg" width="1100" height="600">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Third row --->
<div class="third-row">
    <div class="container">
        <div class="row" style="margin-top: 60px;">
            <div class="col-md-6">
                <div class="container">
                    <img src="images/quote.jpg" style="height:100%; width: 100%">
                </div>
            </div>
            <div id="login-now" class="col-md-6">
                <div class="card text-center">
                    <div class="card-header ">
                        <h2>Login Now</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        $getCode = $_GET['error'] ?? 0;
                        if ($getCode) {
                            ?>
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><?php echo getErrorMessage($getCode); ?> </strong>
                            </div>

                            <?php

                        }
                        ?>
                        <div class="login-form">
                            <form action="db/tasks.php" method="post">
                                <table class="table table-striped">
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <a href="registration.php">Sign Up</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Email</label>
                                        </td>
                                        <td>
                                            <input type="email" name="username">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Password</label>
                                        </td>
                                        <td>
                                            <input type="password" name="password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <input class="btn btn-primary" type="submit" value="Login">
                                            <input type="hidden" name="action" value="login">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Welcome to our website
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--- fourth row --->
<div class="footer-area">
    <div class="container">
        <div class="row" style="margin:40px 0px;">
            <div class="col-12">
                <p style="margin:0px 0px 50px 150px; font-size: 60px">EXPLORE</p>
            </div>
            <div class="row">
                <div class="col-4">
                    <img style="width:100%; height: 300px;" src="images/img-1.jpg">
                </div>
                <div class="col-4">
                    <img style="width:100%; height: 300px;" src="images/img-2.jpg">
                </div>
                <div class="col-4">
                    <img style="width:100%; height: 300px;" src="images/img-3.jpg">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/script.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>

