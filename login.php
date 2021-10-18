<?php
session_start();
$_user_id = $_SESSION['id'] ?? 0;
$_user_name = $_SESSION['username'] ?? 0;
if ($_user_id && $_user_name) {
    header('Location: index.php');
    die();
}
include_once 'functions.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Project</title>
</head>
<body>
<div class="login-form">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card text-center">
                    <div class="card-header ">
                        <h2>Admin Login</h2>
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
                                            <label for="">Username</label>
                                        </td>
                                        <td>
                                            <input type="text" name="username">
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
                                            <input type="hidden" name="action" value="admin-login">
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
            <div class="col-2"></div>
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