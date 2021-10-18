<?php
session_start();
$_SESSION['id'] = 0;
$_SESSION['username'] = 0;
session_destroy();
header('Location: index.php');