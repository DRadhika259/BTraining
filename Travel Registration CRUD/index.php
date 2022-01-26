<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Registration</title>

    <link href="style.css" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  })
</script>
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-dark" style="background-color: rgb(54, 102, 104);">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><h4>Tourist Details</h4></a>
      </div>
    </div>
  </nav>  


<div class="container">
    <div class="table-wrapper">
        <div class = "row">
        <div class="col-md-12 mt-3"><h1>Manage Tourist</h1></div>
            <div class="col-md-12">
            <div class="mt-4 mb-3 clearfix">
                <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Tourist</a>
            </div>
            <?php 
            include "traveldb.php";
        
            $sql = "SELECT * FROM tourist";
            if($result = mysqli_query($conn,$sql)){
                if(mysqli_num_rows($result)>0){
                    echo'<table class="table table-striped table-hover">';
                        echo"<thead>";
                        echo"<tr>";
                        echo"<th>Id</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Place Name</th>";
                        echo "<th>Email-ID</th>";
                        echo "<th>Phone number</th>";
                        echo"<th>Action</th>";
                        echo"</tr>";
                        echo"</thead>";
                        echo"<tbody>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo"<tr>";
                            echo"<td>" .$row['id'] . "</td>";
                            echo"<td>" .$row['name'] . "</td>";
                            echo"<td>" .$row['place'] . "</td>";
                            echo"<td>" .$row['email'] . "</td>";
                            echo"<td>" .$row['phno'] . "</td>";
                            
                            echo"<td>";
                            
                            echo'<a href="read.php? id='.$row['id'].'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                            echo'<a href="update.php? id='.$row['id'].'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                            echo'<a href="delete.php? id='.$row['id'].'" class="mr-3" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                            // echo'<a href="index.php?delete='. $row['id'] .' class="mr-3" onclick="return confirm("Are you sure to delete this record?")"><i class="fa fa-trash-alt"></i></a>';
                            echo"</td>";
                            echo"</tr>";
                        }
                        echo"</tbody>";
                        echo"</table>";

                        mysqli_free_result($result);
                }
                else{
                    echo "<div class='alert alert-danger' <em>No Records Found! </em></div>";
                }
            }
            else{
                echo "Something went wrong! Please try again later!";
            }
            mysqli_close($conn);
        ?>
        </div>
    </div>
</div>
</div>
</body>
</html>