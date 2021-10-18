<?php
session_start();
require_once 'functions.php';
$_user_id = $_SESSION['id'] ?? 0;
$_user_name = $_SESSION['username'] ?? 0;
if (!$_user_id && !$_user_name) {
    header('Location: login.php');
    die();
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
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
$bus_from = $_POST['bus_from'] ?? '';
$bus_to = $_POST['bus_to'] ?? '';
$bus_name = $_POST['bus_name'] ?? '';
$bus_type = $_POST['bus_type'] ?? '';
$cost = $_POST['cost'] ?? '';
$seat = $_POST['seat'] ?? '';
//$message = $_GET['message'] ?? '';
if (isset($_POST['add_new_buss'])) {
    $query = "INSERT INTO buss_info (bus_from, bus_to, bus_name, bus_type, cost, seat ) VALUES ('{$bus_from}', '{$bus_to}', '{$bus_name}', '{$bus_type}', '{$cost}', '{$seat}')";
    mysqli_query($connection, $query);
    header("Location: ?message=success");
}

?>

<div class="words-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header ">
                        <h2>Hello, <span class="text-success font-weight-bold"><?php echo $_user_name; ?></span></h2>
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
                                <div class="admin-dashboard-info">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="widget-small primary coloured-icon shadow-lg p-2"><i
                                                        class="icon fa fa-users fa-3x"></i>
                                                <div class="info">
                                                    <?php
                                                    $users_query = "SELECT * FROM users";
                                                    $users_result = mysqli_query($connection, $users_query);
                                                    $no_users = mysqli_num_rows($users_result);
                                                    ?>
                                                    <h4><a href="all-users.php">Total Users</a></h4>
                                                    <p><b><?php echo $no_users = $no_users ?? 'No user found'; ?></b>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="widget-small primary coloured-icon shadow-lg p-2"><i
                                                        class="icon fa fa-star fa-3x"></i>
                                                <div class="info">
                                                    <?php
                                                    $buss_info_query = "SELECT * FROM buss_info";
                                                    $buss_info_result = mysqli_query($connection, $buss_info_query);
                                                    $no_buss = mysqli_num_rows($buss_info_result);
                                                    ?>
                                                    <h4><a href="all-transport.php">Available Transports</a></h4>
                                                    <p><b><?php echo $no_buss = $no_buss ?? 'No bus found'; ?></b> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="widget-small primary coloured-icon shadow-lg p-2"><i
                                                        class="icon fa fa-star fa-3x"></i>
                                                <div class="info">
                                                    <?php
                                                    $hotels_query = "SELECT * FROM hotels";
                                                    $hotels_result = mysqli_query($connection, $hotels_query);
                                                    $no_hotels = mysqli_num_rows($hotels_result);
                                                    ?>
                                                    <h4><a href="all-hotels.php">Available hotels</a></h4>
                                                    <p><b><?php echo $no_hotels = $no_hotels ?? 'No hotels found'; ?></b> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="widget-small primary coloured-icon shadow-lg p-2"><i
                                                        class="icon fa fa-star fa-3x"></i>
                                                <div class="info">
                                                    <?php
                                                    $restaurants_query = "SELECT * FROM restaurants";
                                                    $restaurants_result = mysqli_query($connection, $restaurants_query);
                                                    $no_restaurants = mysqli_num_rows($restaurants_result);
                                                    ?>
                                                    <h4><a href="all-restaurant.php">Available restaurant</a></h4>
                                                    <p><b><?php echo $no_restaurants = $no_restaurants ?? 'No restaurant found'; ?></b> </p>
                                                </div>
                                            </div>
                                        </div>
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