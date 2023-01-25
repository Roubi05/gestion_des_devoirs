<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $id = isset($_POST['id']) ? $_POST['id'] : NULL;
    $utilisateur = isset($_POST['utilisateur']) ? $_POST['utilisateur'] : '';
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $motpasse = isset($_POST['motpasse']) ? $_POST['motpasse'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $stmt = $pdo->prepare('INSERT INTO enseignant VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $utilisateur, $nom, $prenom, $motpasse, $email,]);
    $msg = 'Created Successfully!';
}
?>
<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
    <label for="id">ID</label>
        <label for="name">Username</label>
        <input type="text" name="id" placeholder="1" value="" id="id">
        <input type="text" name="utilisateur" placeholder="" value="" id="name">
        <label for="nom">Last Name</label>
        <label for="prenom">First Name</label>
        <input type="text" name="nom" placeholder="" value="" id="name">
        <input type="text" name="prenom" placeholder="" value="" id="name">
        <label for="motpasse">Password</label>
        <label for="email">Email</label>
        <input type="text" name="motpasse" placeholder="" value="" id="email">
        <input type="text" name="email" placeholder="" value="" id="email">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
        <a href="read.php">Return</a>
</div>

<?=template_footer()?>