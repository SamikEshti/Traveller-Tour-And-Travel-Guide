<?php
session_start();
include_once 'functions.php';
$_user_id = $_SESSION['id'] ?? '';
$_user_name = $_SESSION['username'] ?? '';
$_last_name = $_SESSION['last_name'] ?? '';
if (!$_user_id && !$_user_name) {
    header('Location: index.php');
    die();
}

//$message = $_GET['message'] ?? '';


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
    <style>
        .active {
            display: block;
        }
    </style>
</head>
<body>
<div class="add_new_word">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h2 class="shadow-lg text-center">Hello, <span style="text-transform: uppercase;" class="text-success font-weight-bold"><?php echo $_last_name;?></span></h2>
                        <h4 class="text-left">Find out the expected results</h4>
                    </div>
                    <?php
                    $query = "SELECT * FROM districts";
                    $result = mysqli_query($connection, $query);
                    ?>
                    <div class="card-body">
                        <div class="search-form shadow p-5">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-4">
                                        <select required class="form-control" name="user_bus_from"
                                                id="">
                                            <option value="" selected disabled>Select
                                                location From
                                            </option>
                                            <?php
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $data['bus_from']; ?>"><?php echo $data['bus_from']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <?php
                                        $query_to = "SELECT * FROM districts";
                                        $result_to = mysqli_query($connection, $query_to);
                                        ?>
                                        <select required class="form-control" name="user_bus_to"
                                                id="">
                                            <option value="" selected disabled>Select
                                                To
                                            </option>
                                            <?php
                                            while ($data_to = mysqli_fetch_assoc($result_to)) {
                                                ?>
                                                <option value="<?php echo $data_to['bus_to']; ?>"><?php echo $data_to['bus_to']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <div class="col-12">
                                            <input class="btn btn-outline-info form-control" type="submit"
                                                   value="Search" name="search">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="card-body">
                            <div class="shadow-sm mb-3">
                                <?php
                                if (isset($_POST['search'])) {
                                    $user_bus_from = $_POST['user_bus_from'] ?? '';
                                    $user_bus_to = $_POST['user_bus_to'] ?? '';

                                    $query = "SELECT * FROM buss_info WHERE bus_from='{$user_bus_from}' AND bus_to='{$user_bus_to}'";
                                    $result = mysqli_query($connection, $query);


                                    $hotels_query = "SELECT * FROM hotels WHERE location='{$user_bus_to}'";
                                    $hotel_result = mysqli_query($connection, $hotels_query);

                                    $restaurants_query = "SELECT * FROM restaurants WHERE location='{$user_bus_to}'";
                                    $restaurants_result = mysqli_query($connection, $restaurants_query);

                                    ?>
                                    <div class="transport">
                                        <h3 class="text-left p-3 text-success">Transport Details</h3>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Bus Name</th>
                                                <th>Type</th>
                                                <th>Seat</th>
                                                <th>Cost</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['bus_name']; ?></td>
                                                    <td><?php echo $data['bus_type']; ?></td>
                                                    <td><?php echo $data['seat']; ?></td>
                                                    <td><?php echo $data['cost']; ?>/=</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="hotel shadow-lg">

                                        <h4 class="text-left p-3 text-success">Hotel Details</h4>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Hotel location</th>
                                                <th>Hotel name</th>
                                                <th>Hotel type</th>
                                                <th>Hotel cost</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($hotel_data = mysqli_fetch_assoc($hotel_result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $hotel_data['location']; ?></td>
                                                    <td><?php echo $hotel_data['hotel_name']; ?></td>
                                                    <td><?php echo $hotel_data['hotel_type']; ?></td>
                                                    <td><?php echo $hotel_data['hotel_cost']; ?>/=</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="restaurant shadow-sm">
                                        <h3 class="text-left p-3 text-success">Restaurant Details</h3>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Restaurant location</th>
                                                <th>Restaurant Name</th>
                                                <th>Food type</th>
                                                <th>Cost</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($restaurants_data = mysqli_fetch_assoc($restaurants_result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $restaurants_data['location']; ?></td>
                                                    <td><?php echo $restaurants_data['restaurant_name']; ?></td>
                                                    <td><?php echo $restaurants_data['food_type']; ?></td>
                                                    <td><?php echo $restaurants_data['restaurant_cost']; ?>/=</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>


                    <div class="card-footer text-muted">
                        Welcome to our website <a class="btn btn-danger" href="logout.php">Logout</a>
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