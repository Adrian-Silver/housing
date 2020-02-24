<?php

require 'header.php';
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `owners` WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
//        NB: To change location name if necessary
        header('location:products.php');
    }
}

