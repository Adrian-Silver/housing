<?php
require 'header.php';
require 'config.php';


$own_id = $own_name = $housetype = $price = $contact =$description='';
$own_id_err = $own_name_err = $housetype_err = $price_err = $contact_err =$description_err='';



if(isset($_POST['create_btn']) and isset($_FILES['uploadedFile'])) {
    $own_id = $_POST['own_id'];
    $own_name = $_POST['own_name'];
    $housetype = $_POST['house_type'];
    $price = $_POST['price'];
    $contact = $_POST['contact'];
    $description = $_POST['description'];


//    echo "$name, $price, $description, $condition";
//    $image = $_POST['product_img'];


    if(!isset($own_id)){
        $own_id_err = "Fill in the field";
    }else{
        $own_id = cleaner($own_id);
    }

    if(!isset($own_name)){
        $own_name_err = "Fill in the field";
    }else{
        $own_name = cleaner($own_name);
    }
    if(!isset($housetype)){
        $housetype_err = "Fill in the field";
    }else{
        $housetype = cleaner($housetype);
    }
    if(!isset($price)){
        $price_err = "Fill in the field";
    }else{
        $price = cleaner($price);
    }
    if(!isset($contact)){
        $contact_err = "Fill in the field";
    }else{
        $contact = cleaner($contact);
    }
    if(!isset($description)){
        $description_err = "Fill in the field";
    }else{
        $description = cleaner($description);
    }
    echo $own_name."<br>";
    echo $housetype."<br>";
    echo $price."<br>";
    echo $contact."<br>";
    echo $description."<br>";


//    process image image

    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $image = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $image);
    $fileExtension = strtolower(end($fileNameCmps));

    $extensions= array("jpeg","jpg","png");

    if(in_array($fileExtension,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if(empty($errors)==true) {
        move_uploaded_file($fileTmpPath,"images/".$image);
    }else{
        print_r($errors);
    }
    $sql = "INSERT INTO `owners`(`own_id`, `own_name`, `housetype`, `price`, `contact`, `description`) VALUES (NULL ,'$own_id','$own_name','$housetype','$price','$content')";
    if(mysqli_query($conn,$sql)){
        $msg= "Product added successfuly";
        header('location:products.php');
        exit();
    }else{
//        $msg= "Product not added successfuly";
//        header('location:products.php?message');
//        exit();
        echo "Data not inserted ".mysqli_error($conn);
    }
}

function cleaner($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    <div class="container">
        <div class="jumbotron">
            <h2 class="content-title">Welcome to Owners page</h2>
            <div class="message">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-lg-8 col-xl-8">
                <table class="table table-stripped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM `owners`";
                    $products = mysqli_query($conn,$sql);


                    while($row = mysqli_fetch_array($products)){
                        echo "<tr>";
                        $own_id = $row['own_id'];
                        $own_name = $row['own_name'];
                        $price = $row['price'];
                        $housetype = $row['house_type'];
                        $contact = $row['contact'];
                        $description = $row['description'];

                        echo "<td> $own_id</td>";
                        echo "<td> $own_name</td>";
                        echo "<td> $price</td>";
                        echo "<td> $housetype</td>";
                        echo "<td> $condition</td>";
                        echo "<td> $description</td>";
                        echo "<td style='text-align: center'>";
                        echo "<a>";
                        echo "<a href='delete.php?id=$id' class='btn btn-danger' style='margin-right: 10px'>Delete</a>";
                        echo "<a href='details.php?id=$id' class='btn btn-primary'>View</a>";
                        echo "</a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">

                    <fieldset>

                        <div class="form-group">
                            <label for="">Owner name</label>
                            <input type="text" name="own_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">House Type</label>
                            <input type="text" name="house_type" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Contact</label>
                            <input type="text" name="contact" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control">
                        </div>



                        <div class="form-group">
                            <button class="btn btn-info btn-block" name="btn_signup">SignUp</button>
                        </div>

                    </fieldset>



                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `owners`";
            $products = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($products)){
                $own_id = $row['id'];
                $own_name = $row['name'];
                $price = $row['price'];
                $contact = $row['image'];
                $housetype = $row['description'];
                $description = $row['description'];
                $condition = $row['product_condition'];
                echo "<div class='col-md-3 col-lg-3 col-xl-3'>";
                echo "<div class='card' style='500px;width=200px'>";
                echo "<img src=images/$image class='card-img' style='width: 100%;height: 250px;border-bottom: 1px solid blue'>";

                echo "<div class='card-body'>";
                echo "<p>$name <br> $price <br></p>";
                echo "</div>";
                echo "<div></div>";
                echo "</div>";
                echo "</div>";
            }
            ?>

        </div>
    </div>
<?php
require 'footer.php';
?>


