<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: student.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'els';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//nrecuperiw lemail et le mot de passe ml base de données 
$stmt = $con->prepare('SELECT motpasse, email FROM apprenants WHERE id = ?');
//nst3mlo lid pour recuperer les informations du compte
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($motpasse, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

<head>
<body style="margin-top:0px;background:#B0C4DE;">

<div class="vert" style="margin-left:0px;background:#5c60f5;">
        <header>
        <br>
        <h1 style="color:white;">ELS</h1>
        </header>
        <br>
        <div class="vertical-menu">
            <a href="student.php"><i class="fa fa-home" style="font-size:20px"> &nbsp;Home</i></a>
            <a href="courses.php"><i class="fa fa-book" style="font-size:20px"> &nbsp;Courses</i></a>
            <a href="test.php"><i class="fa fa-file-text" style="font-size:20px"> &nbsp;Test</i></a>
            <a href="note.php" ><i class="fa fa-comments" style="font-size:20px"> &nbsp;Result</i></a>
            <a href="Profile.php"  class="active"><i class="fa fa-user-circle-o" style="font-size:20px"> &nbsp;Profil</i></a>
            <br><br>
            <a href="logout.php" style="color:red;"><i class="fas fa-sign-out-alt" style="font-size:20px"> &nbsp;Sign out</i></a>
        </div>
      
    </div>
    
<div class="mainpro" >
            <h2>My Profile</h2>
            <div class="infopro" style="height:570px;">
                <div class="profile">
                    <h3>Profile Setting</h3>
                    <img src="../assets/images/profile.png" width="60" height="60" style="float:left;" alt="Profile Picture"/>
                </div>
                    <div class="form" style="border:none;">
                    <form action="/action_page.php" style="border:none;">
                        <div class="name">
                            <label for="fname">First name:</label><br>
                            <input type="text" id="fname" name="nom" value="" style="height:10px;border:none;margin-left:20px;"><br>
                        </div>
                        <br>
                        <div class="name">
                            <label for="lname">Last name:</label><br>
                            <input type="text" id="lname" name="prenom" value="<?=$_SESSION['name']?>" style="height:10px;border:none;margin-left:20px;"><br><br>
                        </div>
                        <br>
                        <div class="name" style="width:400px;">
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" name="email" value="<?=$email?>" style="height:10px;"><br><br>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>



</body>
</html>
