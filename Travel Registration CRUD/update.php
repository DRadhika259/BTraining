<?php
 include ('traveldb.php');
 $uploaddir = 'img/';
 if(isset($_GET["id"])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tourist WHERE id =".$id;
    $result = mysqli_query($conn,$sql);
    
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
            }else{
                echo "Something went wrong! Please try again later.";
            }
            
        }

        if($_SERVER["REQUEST_METHOD"]=='POST'){
            $name = $_POST['name'];
            $place = $_POST['place'];
            $email = $_POST['email'];
            $phno = $_POST['phno'];
        
            // $file_name = $_FILES['image']['name'];
            // $file_size = $_FILES['image']['size'];
            // $file_type = $_FILES['image']['type'];
            // $file_tmp = $_FILES['image']['tmp_name'];
            // $uploaddir = 'img/';
            $imgName = $_FILES['image']['name'];
            $imgTmp = $_FILES['image']['tmp_name'];
            $imgSize = $_FILES['image']['size'];
           

            if($imgName){

                $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
    
                $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
    
                $image = time().'_'.rand(1000,9999).'.'.$imgExt;
    
                if(in_array($imgExt, $allowExt)){
    
                    if($imgSize < 5000000){
                        unlink($upload_dir.$row['image']);
                        move_uploaded_file($imgTmp ,$uploaddir.$image);
                    }else{
                        $errorMsg = 'Image too large';
                    }
                }else{
                    $errorMsg = 'Please select a valid image';
                }
            }else{
    
                $image = $row['image'];
            }
    
            if(!isset($errorMsg)){
                $sql = "UPDATE tourist SET name = '".$name."',
                place = '".$place."', email = '".$email."',
                phno = '".$phno."', image = '".$image."'
                WHERE id=".$id;
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo "<script>alert('Tourist Updated successfully.')</script>";
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
    <title>Update data</title>
    <link href="style.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <div class="row">
            <div class = "col-md-12">
                <h2 class="mt-5">Update Tourist Details</h2>

                <form action ="" method="POST">
                <div class = "form-group">
                <div class = "form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value = "">
                   
                </div>

                <div class = "form-group">
                    <label>Place</label>
                    <input type="text" name="place" class="form-control" value = "">
                   
                </div>

                <div class = "form-group">
                    <label>Email-id</label>
                    <input type="email" name="email" class="form-control" value = "">
                   
                </div>

                <div class = "form-group">
                    <label>Phone no.</label>
                    <input type="text" name="phno" class="form-control" value = "">
                  
                </div>

                <div class = "form-group">
                    <label>Photo</label>
                    <input type="file" name="image" enctype="multipart/form-data" class="form-control" value = "">
                    
                </div>

                <input type = "submit" class="btn btn-success" value="Update">
                <a href = "index.php" class="btn btn-secondary ml-2">Cancel</a>

</form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>