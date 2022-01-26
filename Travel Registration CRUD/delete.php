<?php
   include ('traveldb.php');
   $uploaddir='img/';
if(isset($_GET["id"])){
 $id = $_GET['id'];
 $sql = "SELECT * from tourist where id = ".$id;
 $result = mysqli_query($conn, $sql);
 
 if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
        unlink($uploaddir.$image);
        $sql = "DELETE FROM tourist WHERE id =".$id;
        if(mysqli_query($conn,$sql)){
            header('location:index.php');
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
    <title>Delete data</title>
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
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="" method="POST">
                    <div class="alert alert-danger">
                        <input type="hidden" name="id" value="">
                        <p>You are about to delete a record! Are you sure?</p>
                        <p>
                            <button type="submit" name="Yes" class="btn btn-danger">YES</button>
                            <a href="index.php" class="btn btn-secondary">NO</a>
                        </p>
                    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
