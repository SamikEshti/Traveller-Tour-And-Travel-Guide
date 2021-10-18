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
                        <h2>Hotels Information</h2>
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

                                    <p>
                                        <?php
                                        if (isset($_GET['delete-hotel'])){
                                        $get_delete_bus = $_GET['delete-hotel'] ?? '';
                                        $delete_query = "DELETE FROM hotels WHERE id=$get_delete_bus";
                                        $delete_result=mysqli_query($connection, $delete_query);
                                        ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">×
                                        </button>
                                        <strong>Successfully Deleted info</strong>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    </p>
                                    <p>
                                        <?php if (isset($_GET['message'])): ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">×
                                        </button>
                                        <strong>Successfully updated info</strong>
                                    </div>
                                    <?php endif; ?>
                                    </p>
                                    <div class="card-body text-left">
                                        <table class="table" id="hotel_table">
                                            <thead class="table-light">
                                            <tr>
                                                <th scope="col">Location</th>
                                                <th scope="col">Hotel Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Cost</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $query = "SELECT * FROM hotels";
                                            $result = mysqli_query($connection, $query);
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $data['location']; ?></td>
                                                    <td><?php echo $data['hotel_name']; ?></td>
                                                    <td><?php echo $data['hotel_type']; ?></td>
                                                    <td><?php echo $data['hotel_cost']; ?>/=</td>
                                                    <td>
                                                        <a href="edit-hotel.php?edit-hotel=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a>
                                                        <a onclick="return confirm('Are you sure want to delete ?')"
                                                           class="btn btn-danger"
                                                           href="?delete-hotel=<?php echo $data['id']; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }

                                            ?>


                                            </tbody>
                                        </table>
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