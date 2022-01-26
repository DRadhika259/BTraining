<?php

$servername = 'localhost';
$dbuser = 'root';
$dbpass='';
$dbname='travel';

//Create connection
$conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

//Check connection
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
// else{
//     echo "Connected successfully";
//     echo"<br/>";
// }