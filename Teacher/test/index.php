<?php
date_default_timezone_set("Asia/Calcutta");
?>

<!--php pour ajouter une fichier avec une date et on peut le telecharger et le supprimer-->
<?php
$conn=new PDO('mysql:host=localhost; dbname=els', 'root', '') or die(mysqli_error($conn));
if(isset($_POST['submit'])!=""){
  $nom=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $date = date('Y-m-d H:i:s');
  $caption1=$_POST['caption'];
  $link=$_POST['link'];
  
  move_uploaded_file($temp,"files/".$nom);
//ay fichier nzidoh nb3toh llbase de données dans la table devoir
$query=$conn->query("INSERT INTO devoir (nom,date) VALUES ('$nom','$date')");
if($query){
header("location:index.php");
}
else{
}
}
?>


<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="globe.png" rel="shortcut icon">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<?php include('dbcon.php'); ?>
<style>
.table tr th{
	
	border:#eee 1px solid;
	
	position:relative;
	#font-family:"Times New Roman", Times, serif;
	font-size:12px;
	text-transform:uppercase;
	}
	table tr td{
	
	border:#eee 1px solid;
	color:#000;
	position:relative;
	#font-family:"Times New Roman", Times, serif;
	font-size:12px;
	
	text-transform:uppercase;
	}
	
#wb_Form1
{
   background-color: #00BFFF;
   border: 0px #000 solid;
  
}
#photo
{
   border: 1px #A9A9A9 solid;
   background-color: #00BFFF;
   color: #fff;
   font-family:Arial;
   font-size: 20px;
}

body{
    background: white;
}
.vert{
    float:left;
    width:17%;
    margin:10px;
    border-radius:10px;
    height:635px;
    background:#5c60f5;
}
.vert h1{
    color:Black;
    text-align: center;
    font-family: Castellar;
    font-size: 20px ;
}
.vertical-menu {
    width: 218px; /* Set a width if you like */
    margin-top:50px;
    margin-left:5px;
}

.vertical-menu a {
    /*background-color: white; /* blue background color */
    color: white; /* gray text color */
    display: block; /* Make the links appear below each other */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove underline from links */
    font-size:1.2rem;
}
.vertical-menu a:hover {
    background-color: #eee; /* light grey background on mouse-over */
    color:black;
    border-left: solid #70A3FF;
    border-radius:10px;
}

.vertical-menu a.active {
    background-color: white; /* Add a blue color to the "active/current" link */
    color: black;
    border-radius:10px;
    border-left: solid #70A3FF;
}
	</style>
<body style="margin-top:0px;background:#B0C4DE;">

<div class="vert" style="margin-left:10px;">
        <header>
        <br>
        <h1 style="color:white;">ELS</h1>
        </header>
        <br>
        <div class="vertical-menu">
            <a href="../teac.php"><i class="fa fa-home" style="font-size:20px"> &nbsp;Home</i></a>
            <a href="../myfilemgr/index.php"><i class="fa fa-book" style="font-size:20px"> &nbsp;Cours</i></a>
            <a href="index.php" class="active"><i class="fa fa-file-text" style="font-size:20px"> &nbsp;Test</i></a>
            <a href="../note.php" ><i class="fa fa-comments" style="font-size:20px"> &nbsp;Result</i></a>
            <a href="../proT.php"><i class="fa fa-user-circle-o" style="font-size:20px"> &nbsp;Profil</i></a>
            <br><br>
            <a href="../logout.php" style="color:red;"><i class="fas fa-sign-out-alt" style="font-size:20px"> &nbsp;Sign out</i></a>
        </div>
      
    </div>
<!--------------------------------->

<div class="col-md-18" style="margin-left:250px;margin-right:30px;">
	<div class="container-fluid" style="margin-top:0px;">
   <div class = "row">
		<div class="panel panel-default" style="margin-top:40px;border-radius:10px;" >
			<div class="panel-body" style="height:560px;margin-top:40px;border-radius:10px;">
						<h3>Add Test</h3>
				<div class="table-responsive" style="margin-top:50px;">

<!---------------->

							<table  style="margin-top:0px;margin-left:0px;width:800px;"cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
																

			<tr style="width:500px;"><td><form enctype="multipart/form-data"  action="" id="wb_Form1" name="form" method="post">
					<input type="file" name="photo" id="photo"  required="required"></td>
					<td><input type="submit" class="btn btn-danger" value="SUBMIT" name="submit">
			</form> <strong>SUBMIT HERE</strong></tr></td></table>
							 
							 <!------------------>
							<form method="post" action="delete.php" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed" id="example">
                            
                            <thead>
						
                                <tr>
                                    
                                    <th>ID</th>
                                    <th>FILE NAME</th>
                                   <th>Date</th>
				<th>Download</th>
				<th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            
							<?php 
							//recuper les donnes w n7othm fi tableau 
							$query=mysqli_query($conn,"select * from devoir ORDER BY id DESC")or die(mysqli_error($conn));
							while($row=mysqli_fetch_array($query)){
							$id=$row['id'];
							$nom=$row['nom'];
							$date=$row['date'];
							?>
                              
										<tr>
										
                                         <td><?php echo $row['id'] ?></td>
                                         <td><?php echo $row['nom'] ?></td>
                                         <td><?php echo $row['date'] ?></td>
										<td>
				<!--telecharger le fichier-->
				<a href="download.php?filename=<?php echo $nom;?>" title="click to download"><span class="glyphicon glyphicon-paperclip" style="font-size:20px; color:blue"></span></a>
				</td>
				<!--supprimer le fichier-->
				<td>
				<a href="delete.php?del=<?php echo $row['id']?>"><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
				</td>
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>               
          
</form>
</div>
</div>
</div>
        </div>
        </div>
        </div>
    </div>

</div>

</body>
</html>


