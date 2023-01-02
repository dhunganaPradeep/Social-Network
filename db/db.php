<?php
include 'connect.php';
//php code to create database
$sql = "CREATE DATABASE IF NOT EXISTS `db_name`";
if (mysqli_query($connection, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($connection);
}

    ?>