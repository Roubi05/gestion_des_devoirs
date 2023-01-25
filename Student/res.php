<?php
session_start();

echo "Note :".$_GET['note']."<br>";
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'els';
// Create connection
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql="select * from reponse where utilisateur='".$_SESSION['name']."'";
$result=$conn->query($sql);
if ($result->num_rows ==0) {
echo "insertion";
$sql = "INSERT INTO reponse (utilisateur, note) VALUES ('".$_SESSION['name']."',".$_GET['note'].")";
}
/*else
{
echo "modification";
$sql = "UPDATE reponse set note=".$_GET['note']." where utilisateur='".$_SESSION['name']."'";
}*/
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<table class="table table-bordered">
<tr>
    <th><p class="text-error">#</p></th>
    <th><p class="text-error">username</p></th>
     <th><p class="text-error">note</p></th>
    </tr>
<tr>
<? while($row = $req->fetch()) { ?>
        <td><? echo $row['id']; ?></td>
        <td><? echo $row['utilisateur']; ?></td>
        <td><? echo $row['note']; ?></td>
</tr>
<? }   
$req->closeCursor();   
?>
</table>

</body>
</html>







