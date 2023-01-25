<!-- Adi la page d'acceil pour l'apprenant li tkon faha calendrier tmchi m3a les jours ykono faha div llcours w test licence2 informatique et les cours de licence 3 avec menu vertical-->
<?php
session_start();
// ida madarch l'utilisateur login may9drch ydkhll lpage d'acceuil w yb9a fi login.html
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

<head>
<body style="margin-top:0px;background:#B0C4DE;">

<div class="vert" style="margin-left:10px;background:#5c60f5;">
        <header>
        <br>
        <h1 style="color:white;">ELS</h1>
        </header>
        <br>
        <div class="vertical-menu">
            <a href="student.php" class="active"><i class="fa fa-home" style="font-size:20px"> &nbsp;Home</i></a>
            <a href="courses.php"><i class="fa fa-book" style="font-size:20px"> &nbsp;Courses</i></a>
            <a href="test.php"><i class="fa fa-file-text" style="font-size:20px"> &nbsp;Test</i></a>
            <a href="note.php"><i class="fa fa-comments" style="font-size:20px"> &nbsp;Result</i></a>
            <a href="Profile.php"><i class="fa fa-user-circle-o" style="font-size:20px"> &nbsp;Profil</i></a>
            <br><br>
            <a href="logout.html" style="color:red;"><i class="fas fa-sign-out-alt" style="font-size:20px"> &nbsp;Sign out</i></a>
        </div>
      
    </div>
    
    
    <div class="main" >
    <h2>Home</h2>
    <div class="annes" style="height:560px;">
       <h2>Licence 2</h2>
        <div class="licence2">
            <img src="../assets/images/courses.png" style="width:70px;margin-top:5px;margin-left:10px;"/>
            <a href="courses.php"><h2><b>8</b> <p>Courses</p></h2></a>
        </div>
         <div class="licence2">
            <img src="../assets/images/test.png" style="width:70px;margin-top:0px;margin-left:10px;"/>
            <a href="test.php"><h2><b>5</b> <p>Test</p></h2></a>
        </div>
        <br>
            <div class="annes" style="height:300px;">

      <h2 style="margin-top:10px;">Licence 3</h2>
        <div class="licence2" >
            <img src="../assets/images/courses.png" style="width:70px;margin-top:5px;margin-left:10px;"/>
            <a href="courl3.html"><h2><b>8</b> <p>Courses</p></h2></a>
        </div>
         <div class="licence2">
            <img src="../assets/images/test.png" style="width:70px;margin-top:0px;margin-left:10px;"/>
            <a href="#"><h2><b>5</b> <p>Test</p></h2></a>
        </div>
    </div>
    </div>
 
    <!--Calendrier-->
    <div class="calendrier" style="width:330px;height:150px;margin-right:0px;margin-top:50px;margin-left:50px;">
     <div class="container2">
			<div class="row">
				<div class="col-md-12">
					<div class="calendar calendar-first" id="calendar_first">
				    <div class="calendar_header">
				        <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
				         <h2></h2>
				        <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
				    </div>
				    <div class="calendar_weekdays"></div>
				    <div class="calendar_content"></div>
					</div>
				</div>
			</div>
		</div>
    </div>

<!--script li tab3in llcalendrier-->
	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>


</body>
</html>
