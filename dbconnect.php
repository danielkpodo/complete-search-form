<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpwd = '';
$dbname = 'phpsearch';
$conn = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error($conn));
}