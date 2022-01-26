<?php
require_once ('traveldb.php');
$uploaddir = 'img/';

$name = $place = $email = $phno =  "";
if($_SERVER["REQUEST_METHOD"]=='POST'){
    $name = $_POST['name'];
    $place = $_POST['place'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];

    // $efile_name = $_FILES['image']['name'];
    // $file_size = $_FILES['image']['size'];
    // $file_type = $_FILES['image']['type'];
    // $file_tmp = $_FILES['image']['tmp_name'];
    $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
   

    if(empty($name)){
        echo "<script>alert('Name cannot be empty! Please enter your name.')</script>";
    }elseif (empty($place)) {
        echo "<script>alert('Place cannot be empty! Please enter place.')</script>";

    }elseif (empty($email)) {
        echo "<script>alert('Email cannot be empty! Please enter email-id.')</script>";

    }elseif (empty($phno)) {
        echo "<script>alert('Phone no. cannot be empty! Please enter your phone no.')</script>";

    }
    // else{
    //     $extensions=array("jpeg","jpg",'png');
    //     $file_ext=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    //     // $image = time().'_'.rand(1000,9999).'.'. $extensions;

    //     if(in_array($file_ext,$extensions)===false){
    //         $errors ="Extension not allowed, please choose the specified type";
       
    //     if($file_size<6000000)
    //     {
    //         move_uploaded_file($file_tmp,$uploaddir.$image);
    //     }else{
    //         $errors ='File size must be atmost 6mb';
    //     }
    //  }
    else{

        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

        $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

        $image = time().'_'.rand(1000,9999).'.'.$imgExt;

        if(in_array($imgExt, $allowExt)){

            if($imgSize < 5000000){
                move_uploaded_file($imgTmp ,$uploaddir.$image);
            }else{
                $errorMsg = 'Image too large';
            }
        }else{
            $errorMsg = 'Please select a valid image';
        }
    }
   

    if(!isset($errorMsg)){
        $sql = "INSERT INTO tourist ( name, place, email, phno, image)
                VALUES('".$name."','".$place."','".$email."','".$phno."','".$image."')";

                $result = mysqli_query($conn,$sql);
                if($result){
                      echo "<script>alert('Tourist added successfully.')</script>";
                      header('location:index.php');
                }else{
                    $errorMsg='Error'.mysqli_error($conn);
                }
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert data</title>
    <link href="style.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
</head>
<body>

<nav class="navbar navbar-fixed-top navbar-dark" style="background-color: rgb(54, 102, 104);">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><h4>Tourist Details</h4></a>
      </div>
    </div>
  </nav> 

<div class="table-wrapper">
    <div class="container">
        <div class=row>
            <div class="col-mg-12">
                <h2 class="mt-5">Insert Tourist Data</h2>
               
                <form action ="" method="post" enctype="multipart/form-data">
                
                <div class = "form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder='Enter full name' class="form-control" value = "" required autocomplete="off">
                    
                </div>

                <div class = "form-group">
                    <label>Place</label>
                    <input type="text" name="place" placeholder='Enter place name' class="form-control" value = ""required autocomplete="off">
                   
                </div>

                <div class = "form-group">
                    <label>Email-id</label>
                    <input type="email" name="email" placeholder='Enter email-id' class="form-control" value = ""required autocomplete="off">
                    
                </div>

                <div class = "form-group">
                    <label>Phone no.</label>
                    <input type="text" name="phno" placeholder='Enter contact no' class="form-control" value = ""required autocomplete="off">
                    
                </div>

                <div class = "form-group">
                    <label>Photo</label>
                    <input type="file" name="image"  class="form-control" value = "">
                </div>

                <input type = "submit" class="btn btn-success" value="ADD">
                <a href = "index.php" class="btn btn-secondary ml-2">Cancel</a>

</form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

