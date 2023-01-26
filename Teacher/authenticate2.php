<!--php pour login cote enseignant recuperer les informations mtable enseignat et verifier est ce que il est juste donc entree sinon non -->
<?php
session_start();
//connection info
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'els';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
//ki ykon kayn erreur fi lentre dans la base yji had lmessage et le script arrete
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//nverifiw est ce que les informations shah
if ( !isset($_POST['utilisateur'], $_POST['motpasse']) ) {
	exit('Please fill both the username and password fields!');
}
if ($stmt = $con->prepare('SELECT id, motpasse FROM enseignant WHERE utilisateur = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), l'utilisateur string donc 's'
	$stmt->bind_param('s', $_POST['utilisateur']);
	$stmt->execute();
	$stmt->store_result();
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
//if lcompte existe on verifir le motpasse
	if (password_verify($_POST['motpasse'], $password)) {
//verification est juste
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['utilisateur'];
		$_SESSION['id'] = $id;
header('Location: teac.php');	} else {
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
