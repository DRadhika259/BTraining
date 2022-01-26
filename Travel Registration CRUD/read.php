<?php
 require_once ('traveldb.php');
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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Read data</title>
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
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Tourist Details</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["name"];?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Place</label>
                        <p><b><?php echo $row["place"];?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Email-id</label>
                        <p><b><?php echo $row["email"];?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Phone no.</label>
                        <p><b><?php echo $row["phno"];?></b></p>
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <p><b><?php echo $row["image"];?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>