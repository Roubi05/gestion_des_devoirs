
<?php
extract($_REQUEST);
include('db.php');

$sql=mysqli_query($conn,"select * from devoir where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("files/$row[name]");

mysqli_query($conn,"delete from devoir where id='$del'");

header("Location:index.php");

?>