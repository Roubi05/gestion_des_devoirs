<!--Page cours de licence 2 juste le cours de theorie de graphe qu'il fonctionne commme exemple 3la lcours et devoir dans cette page tous les modules de 2 semestre existe avec les noms de l'enseignant-->
<?php
session_start();
// lazm ydir login sinon may9drch ydkhll llpage
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

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
            <a href="courses.php"  class="active"><i class="fa fa-book" style="font-size:20px"> &nbsp;Courses</i></a>
            <a href="test.php"><i class="fa fa-file-text" style="font-size:20px"> &nbsp;Test</i></a>
            <a href="note.php"><i class="fa fa-comments" style="font-size:20px"> &nbsp;Result</i></a>
            <a href="Profile.php"><i class="fa fa-user-circle-o" style="font-size:20px"> &nbsp;Profil</i></a>
            <br><br>
            <a href="logout.php" style="color:red;"><i class="fas fa-sign-out-alt" style="font-size:20px"> &nbsp;Sign out</i></a>
        </div>
      
    </div>
    
    <!--liste de cours-->
    <div class="main" style="margin-top:0px;">
            <h2>My Course</h2>
            <div class="course">
                <div class="modules">
                    <div class="theory" style="margin-left:0px;">
                       <h3><a href="theory.php">Th&eacuteorie des graphes</a></h3>
                       <a href="contact/index.php"><p>Mr.Benouhaiba Toufik</p></a>
                    </div>
                    <div class="theory">
                       <h3>Architecture des ordinateurs</h3>
                       <p>Mr.Cherif Tolba</p>
                    </div>
                    <div class="theory">
                       <h3>Logique Math&eacutematique</h3>
                       <p>Mr.Mohamed Said Mehdi MENDJEL</p>
                    </div>
                    <div class="theory">
                       <h3>Algorithmique et structure de donn&eacutees 3</h3>
                       <p>Mr.Sabri Ghazi</p>
                    </div>
                </div>

                <div class="modules">
                    <div class="theory" style="margin-left:0px;">
                       <h3>Syst&egravemes d'information</h3>
                       <p>Mm.Hassina Seridi</p>
                    </div>
                    <div class="theory">
                       <h3>M&eacutethodes Num&eacuteriques</h3>
                       <p>Mm.hakima BENLARBI</p>
                    </div>
                    <div class="theory">
                       <h3>Anglais 2</h3>
                       <p>Mm.Sara Stiti</p>
                    </div>
                    <div class="theory">
                       <h3>Th&eacuteorie des Langages</h3>
                       <p>Mr.Toufik BENOUHIBA</p>
                    </div>
                </div>


                <div class="modules">
                    <div class="theory" style="margin-left:0px;">
                       <h3>Bases des Donn&eacutees</h3>
                       <p>Mm.Habiba BELLEILI</p>
                    </div>
                    <div class="theory">
                       <h3>D&eacuteveloppement Web</h3>
                       <p>Mr.Mohamed BESNACI</p>
                    </div>
                    <div class="theory">
                       <h3>Syst&egravemes d'exploitation 1</h3>
                       <p>Mr.Nadir FARAH</p>
                    </div>
                    <div class="theory">
                       <h3>R&eacuteseaux</h3>
                       <p>Mm.Fatiha DJEMILI</p>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>
