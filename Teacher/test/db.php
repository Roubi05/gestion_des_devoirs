<?php


$conn = mysqli_connect("localhost","root","","els");
if(!$conn){
    die("Cannot connect to the database. Error: ".mysqli_error($conn));
}

?>