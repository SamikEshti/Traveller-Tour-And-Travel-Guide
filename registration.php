<?php
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
                        <h2>Create a new user account</h2>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php if (isset($_GET['message'])): ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×
                            </button>
                            <strong>Successfully added user</strong>
                        </div>
                        <?php endif; ?>
                        </p>
                        <div class="vocabulary">
                            <form method="post" action="db/tasks.php">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <h3 style="color: red;">
                                                <?php
                                                $error = $_GET['error'] ?? 0;
                                                if ('1' == $error || '0' == $error || '2' == $error) {
                                                    echo getErrorMessage($error);
                                                }
                                                ?>
                                            </h3>
                                            <h3 style="color: green;">
                                                <?php
                                                $error = $_GET['error'] ?? 0;
                                                if ('3' == $error) {
                                                    echo getErrorMessage($error);
                                                }
                                                ?>
                                            </h3>
                                        </td>
                                        <td>
                                            <a class="login" href="index.php">Login</a> || <a class="register text-danger font-weight-bold" href="">Create an account</a>
                                        </td>
                                    </tr>





                                    <tr>
                                        <td>
                                            <label for="">First name</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="first_name" placeholder="First Name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Last name</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <label for="">Email</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="email" name="email" placeholder="Email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Password</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="password" name="password" placeholder="Password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <input class="btn btn-primary" type="submit" value="Register Now">
                                            <input type="hidden" name="action" id="logreg" value="registration">
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