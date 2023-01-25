<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $utilisateur = isset($_POST['utilisateur']) ? $_POST['utilisateur'] : '';
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $motpasse = isset($_POST['motpasse']) ? $_POST['motpasse'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $stmt = $pdo->prepare('UPDATE enseignant SET id = ?, utilisateur = ?, nom = ?, prenom = ?, motpasse = ?, email=? ');
        $stmt->execute([$id, $utilisateur, $nom, $prenom, $motpasse, $email]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM enseignant WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Username</label>
        <input type="text" name="id" placeholder="1" value="<?=$contact['id']?>" id="id">
        <input type="text" name="utilisateur" placeholder="" value="<?=$contact['utilisateur']?>" id="name">
        <label for="nom">Name</label>
        <label for="prenom">Last Name</label>
        <input type="text" name="nom" placeholder="" value="<?=$contact['nom']?>" id="name">
        <input type="text" name="prenom" placeholder="" value="<?=$contact['prenom']?>" id="name">
        <label for="motpasse">Password</label>
        <label for="email">Email</label>
        <input type="text" name="motpasse" placeholder="" value="<?=$contact['motpasse']?>" id="email">
        <input type="text" name="email" placeholder="" value="<?=$contact['email']?>" id="email">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
        <a href="read.php">Return</a>
</div>

<?=template_footer()?>