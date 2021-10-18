<?php
session_start();
require_once 'functions.php';
$_user_id = $_SESSION['id'] ?? 0;
$_user_name = $_SESSION['username'] ?? 0;
if (!$_user_id && !$_user_name) {
    header('Location: login.php');
    die();
}
$get_user_id = $_GET['edit-user'] ?? '';
$edit_query = "SELECT * FROM users WHERE id='{$get_user_id}'";
$edit_result = mysqli_query($connection, $edit_query);
$edit_row = mysqli_fetch_assoc($edit_result);
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Project</title>
    <style>
        .active {
            display: block;
        }
    </style>
</head>
<body>
<?php
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$username  = $_POST['username'] ?? '';
if (isset($_POST['update'])) {
    $query = "UPDATE users SET first_name='{$first_name}', last_name='{$last_name}', username='{$username}' WHERE id=$get_user_id";
    mysqli_query($connection, $query);
    header("Location: all-users.php?message=success");
}

?>

<div class="words-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header ">
                        <h2>User Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="bus-menu shadow-lg p-2">
                                    <nav class="navbar navbar-default">
                                        <ul class="nav navbar-nav">
                                            <li class="list-group-item bg-info">
                                                <a class="bg-info text-white" href="admin-dashboard.php">Dashboard</a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                   aria-haspopup="true" aria-expanded="false">Transport <span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="add-new-bus.php">Add new</a></li>
                                                    <li><a href="all-transport.php">All Transport</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                   aria-haspopup="true" aria-expanded="false">Hotel <span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="add-new-hotel.php">Add new</a></li>
                                                    <li><a href="all-hotels.php">All Hotels</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                   aria-haspopup="true" aria-expanded="false">Restaurant <span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="add-new-restaurant.php">Add new</a></li>
                                                    <li><a href="all-restaurant.php">All Restaurant</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                   aria-haspopup="true" aria-expanded="false">Users <span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="all-users.php">All users</a></li>
                                                </ul>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="logout.php">Logout</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card text-center">
                                    <div class="card-body text-left">
                                        <p>
                                            <?php if (isset($_GET['message'])): ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">×
                                            </button>
                                            <strong>Successfully added info</strong>
                                        </div>
                                        <?php endif; ?>
                                        </p>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">First Name</label>
                                                <input required name="first_name" value="<?php echo $edit_row['first_name'];?>"  type="text" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input required name="last_name" value="<?php echo $edit_row['last_name'];?>" type="text" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input required name="username" value="<?php echo $edit_row['username'];?>" type="text" class="form-control" id="">
                                            </div>
                                            <input name="update" type="submit" class="btn btn-primary"
                                                   value="Submit">
                                        </form>

                                    </div>
                                </div>
                            </div>
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

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/script.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>