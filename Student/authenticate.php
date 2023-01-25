<?php
session_start();
//connection info
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'els';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
 if( !isset($_POST['utilisateur'], $_POST['motpasse']) ) {
	exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT id, motpasse FROM apprenants WHERE utilisateur = ?')) {
	$stmt->bind_param('s', $_POST['utilisateur']);
	$stmt->execute();
	// verifir est ce que lcompte existe dans la base ou non
	$stmt->store_result();
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// compte exists,  verifier motpasse.
	if (password_verify($_POST['motpasse'], $password)) {
		// Verification juste
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['utilisateur'];
		$_SESSION['id'] = $id;
header('Location: student.php');	} else {
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
