<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "codealpha_shop";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("<div class='alert alert-danger'>Connection Failed: " . mysqli_connect_error() . "</div>");
}
?>