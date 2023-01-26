<!--la page d'acceuil de l'enseignant -->
<?php
session_start();
//apres login ya9dr ydkhll lpage d'acceuil sinon may9drch
if (!isset($_SESSION['loggedin'])) {
	header('Location: teacherlog.html');
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
	
	<link rel="stylesheet" href="../css/style.css">

<head>
<body style="margin-top:0px;background:#B0C4DE;">

<div class="vert" style="margin-left:10px;background:#5c60f5;">
        <header>
        <br>
        <h1 style="color:white;">ELS</h1>
        </header>
        <br>
        <div class="vertical-menu">
            <a href="teac.php" class="active"><i class="fa fa-home" style="font-size:20px"> &nbsp;Home</i></a>
            <a href="myfilemgr/index.php"><i class="fa fa-book" style="font-size:20px"> &nbsp;Cours</i></a>
            <a href="test/index.php"><i class="fa fa-file-text" style="font-size:20px"> &nbsp;Test</i></a>
            <a href="note.php"><i class="fa fa-comments" style="font-size:20px"> &nbsp;Result</i></a>
            <a href="proT.php"><i class="fa fa-user-circle-o" style="font-size:20px"> &nbsp;Profil</i></a>
            <br><br>
            <a href="logout.php" style="color:red;"><i class="fas fa-sign-out-alt" style="font-size:20px"> &nbsp;Sign out</i></a>
        </div>
      
    </div>
    
    
    <div class="main" >
    <h2>Home</h2>
    <div class="annes" style="height:560px;">
        <div class="licence2" style="background:pink;width:200px;margin-top:10px;">
            <img src="../assets/images/courses.png" style="width:50px;margin-top:5px;margin-left:10px;"/>
            <a href="myfilemgr/index.php"><h2><b>8</b> <p>Courses</p></h2></a>
        </div>
         <div class="licence2" style="background:lightgreen;width:200px;margin-top:10px;">
            <img src="../assets/images/test.png" style="width:50px;margin-top:0px;margin-left:10px;"/>
            <a href="test/index.php"><h2><b>5</b> <p>Test</p></h2></a>
        </div>
           <div class="licence2" style="background:lightblue;width:200px;margin-top:10px;">
            <img src="../assets/images/student.png" style="width:50px;margin-top:0px;margin-left:10px;"/>
                            <a href="fetch/contact/index.php">
            <a href="fetch/index.php"><h2><b>25</b> <p>Student</p></h2></a>
        </div>
    </div>
    </div>
  <!--calendrier-->
    <div class="calendrier" style="width:300px;height:150px;margin-right:20px;margin-top:100px;">
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


	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>


</body>
</html>
