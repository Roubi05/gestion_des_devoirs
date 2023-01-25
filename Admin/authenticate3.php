<?php
session_start();
//connection infor
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'els';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//nverifiw est ce que kayn had les informations dans cette table
if ( !isset($_POST['utilisateur'], $_POST['motpasse']) ) {
	exit('Please fill both the username and password fields!');
}
if ($stmt = $con->prepare('SELECT id, motpasse FROM administrateur WHERE utilisateur = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc)
	$stmt->bind_param('s', $_POST['utilisateur']);
	$stmt->execute();
	// Store the result pour verifier est ce que les informations yexcito ou non 
	$stmt->store_result();
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
//ida kan lcompte il existe nverifiw le motpasse
	if (password_verify($_POST['motpasse'], $password)) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['utilisateur'];
		$_SESSION['id'] = $id;
header('Location: admin.php');	} else {
		// Incorrect password
		echo 'Incorrect username and/or password!';
	}
} else {
	// Incorrect username
	echo 'Incorrect username and/or password!';
}

	$stmt->close();
}
?>
