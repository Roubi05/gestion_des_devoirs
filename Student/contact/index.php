
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
?>
<?php
//Base de donnée
if(!empty($_POST["send"])) {
	$id = $_POST["id"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	//$connexion = mysqli_connect("localhost", "root", "", "contact-form") or die("Erreur de connexion: " . mysqli_error($connexion));
	$connexion = mysqli_connect("localhost", "root", "", "els") or die("Erreur de connexion: " . mysqli_error($connexion));
	$result = mysqli_query($connexion, "INSERT INTO contact (id,name,email,subject, message) VALUES ('" . $id. "', '" . $name. "', '" . $email. "','" . $subject. "','" . $message. "')");
	if($result){
		$db_msg = "Vos informations de contact sont enregistrées avec succés.";
		$type_db_msg = "success";
	}else{
		$db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
		$type_db_msg = "error";
	}
	
}
//l'envoie du mail
if(!empty($_POST["send"])) {
	$id = $_POST["id"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$toEmail = "VotreGmailId@gmail.com";    
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	//$mailHeaders = "From: " . $id . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $message, $mailHeaders)) {
	    $mail_msg = "Vos informations de contact ont été reçues avec succés.";
		$type_mail_msg = "success";
	}else{
		$mail_msg = "Erreur lors de l'envoi de l'e-mail.";
		$type_mail_msg = "error";
	}
}
?>

<html>
	<head>


	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link rel="stylesheet" href="contact.css" />
		<script type="text/javascript" src="contact.js"></script>
	</head>
	<body>
		<div id="box">
		  <form id="form" enctype="multipart/form-data" onsubmit="return validate()" method="post">
		    <h3>Formulaire de contact</h3>
		    <label>Nom: <span>*</span></label>
		    <input type="text" id="name" name="name" placeholder="Nom"/>
			<label>Id: <span>*</span></label>
		    <input type="text" id="id" name="id" placeholder="num"/>
		    <label>Email: <span>*</span></label><span id="info" class="info"></span>
		    <input type="text" id="email" name="email" placeholder="Email"/>
		    <label>Sujet: <span>*</span></label>
		    <input type="text" id="subject" name="subject" placeholder="Demande de renseignement"/>
		    <label>Message:</label>
		    <textarea id="message" name="message" placeholder="Message..."></textarea>
		    <input type="submit" name="send" value="Envoyer le message"/>
			<div id="statusMessage"> 
            <?php if (! empty($db_msg)) { ?>
              <p class='<?php echo $type_db_msg; ?>Message'><?php echo $db_msg; ?></p>
            <?php } ?>
            <?php if (! empty($mail_msg)) { ?>
              <p class='<?php echo $type_mail_msg; ?>Message'><?php echo $mail_msg; ?></p>
            <?php } ?>
            </div>
		  </form>
	    </div>
		<a href="../fetch/index.php" class="button">repondre</a>  

	</body>
</html>
