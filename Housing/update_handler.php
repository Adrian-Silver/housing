<?php


require 'config.php';

if (isset($_POST['update_btn'])){
//    if button was clicked,
//    grab id first
    if(isset($_POST['id'])){
        $own_id = $_POST['id'];
        //    grab form data

        $own_name =$_POST['own_name'];
        $price =$_POST['price'];
        $housetype =$_POST['house_type'];
        $contact =$_POST['contact'];
        $description =$_POST['description'];


        /*The update command is yet to be edited

        $sql = "UPDATE `owners` SET `own_id`=[value-1],`own_name`=[value-2],`housetype`=[value-3],`price`=[value-4],`contact`=[value-5],`description`=[value-6] WHERE 1";
        $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`description`='$description' WHERE id =$id";

          NB:     Don't touch for now */





//    execute update instruction
        if(mysqli_query($conn,$sql)){
            header("location:details.php?id=$id");

            exit();

        }else{
            echo "ERROR".mysqli_error($conn);
        }

    }

}



?>
