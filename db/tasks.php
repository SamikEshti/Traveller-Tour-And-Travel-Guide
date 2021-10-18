<?php
session_start();
include_once 'config.php';
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//mysqli_set_charset($connection, 'utf8');
$action = $_POST['action'] ?? '';
$errorCode = 0;
$issueCode = 0;
$code = 0;
if (!$connection) {
    throw new Exception("Cannot connect to database");
} else {
    if ('registration' == $action) {
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $username = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($username && $password) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (first_name, last_name,username, password) VALUES ('{$first_name}', '{$last_name}','{$username}', '{$hash}')";
            mysqli_query($connection, $query);
            if (mysqli_error($connection)) {
                $errorCode = 1;
            } else {
                $errorCode = 3;
            }
        } else {
            $errorCode = 2;
        }
        header("Location: ../registration.php?error={$errorCode}");
    } elseif ('login' == $action) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($username && $password) {
            $query = "SELECT * FROM users WHERE username='{$username}'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                $_password = $data['password'];
                $_id = $data['id'];
                $_username = $data['username'];
                $_last_name = $data['last_name'];
                if (password_verify($password, $_password)) {
                    $_SESSION['id'] = $_id;
                    $_SESSION['username'] = $_username;
                    $_SESSION['last_name'] = $_last_name;
                    header("Location: ../user-page.php");
                    die();
                } else {
                    $errorCode = 4;
                }
            } else {
                $errorCode = 5;
            }
        } else {
            $errorCode = 2;
        }
        header("Location: ../index.php?error={$errorCode}");
    } elseif ('admin-login' == $action) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($username && $password) {
            $query = "SELECT id, password, username FROM admins WHERE username='{$username}'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                $_password = $data['password'];
                $_id = $data['id'];
                $_username = $data['username'];
                if (password_verify($password, $_password)) {
                    $_SESSION['id'] = $_id;
                    $_SESSION['username'] = $_username;
                    header("Location: ../admin-dashboard.php");
                    die();
                } else {
                    $errorCode = 4;
                }
            } else {
                $errorCode = 5;
            }
        } else {
            $errorCode = 2;
        }
        header("Location: ../login.php?error={$errorCode}");
    }
}