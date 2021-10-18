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
    <title>Project</title>
    <style>
        .active {
            display: block;
        }
    </style>
</head>
<body>
<div class="words-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header ">
                        <h2>Busses</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td class="left_menu shadow-lg p-3 mb-5 bg-white rounded">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="">All busses</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="add_new_bus.php">Add New bus</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="logout.php">Logout</a>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="wordtable">
                                            <table id="words_table" class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Bus Name</th>
                                                    <th>Location From</th>
                                                    <th>Location To</th>
                                                    <th>Cost</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT * FROM buss_info";
                                                $result = mysqli_query($connection, $query);
                                                while ($data = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $data['bus_name']; ?></td>
                                                        <td><?php echo $data['location_from']; ?></td>
                                                        <td><?php echo $data['location_to']; ?></td>
                                                        <td><?php echo $data['cost']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
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