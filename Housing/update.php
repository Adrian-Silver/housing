<?php
require 'header.php';
require 'config.php';
$own_id=$own_name=$price=$housetype=$contact=$description=$image='';

if(isset($_POST['id'])){
    $own_id = $_POST['id'];
    echo "$own_id";

    if(isset($_POST['own_name'])){
        $own_name = $_POST['own_name'];
    }
    if(isset($_POST['price'])){
        $price = $_POST['price'];
    }
    if(isset($_POST['house_type'])){
        $housetype = $_POST['house_type'];
    }
    if(isset($_POST['contact'])){
        $contact = $_POST['contact'];
    }


    if(isset($_POST['description'])){
        $description = $_POST['description'];
    }

    echo $own_name;
//    $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`description`='$description'],`product_condition`='$condition' WHERE id='$id'";
//    if(mysqli_query($conn,$sql)){
//        header('location:products.php?id= $_GET["id"]');
//    }

}

?>
