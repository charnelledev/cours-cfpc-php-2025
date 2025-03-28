<?php
session_start();
require_once "database.php";
if(isset($_SESSION['id']) AND $_SESSION['id']>0){
    $requser = $pdo->prepare('SELECT * FROM membres WHERE id =?');
    $requser->execute([$_SESSION['id']]);
    $user = $requser->fetch();
    echo "<pre>";
    var_dump($user);
    echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUTO PHP</title>
</head>
<body>
  <div align="center">
    <h2>Edition de mon profil</h2>
    <?php
if (isset($erreur)) {
echo '<font color="red">' . $erreur . "</font>";
}
?>
    <div align="left">
      <form method="POST" action="" enctype="multipart/form-data">
        <label>Pseudo :</label>
        <input type="text" name="newpseudo" placeholder="Pseudo" value="" /><br /><br />
        <label>Mail :</label>
        <input type="text" name="newmail" placeholder="Mail" value="" /><br /><br />
        <label>Mot de passe :</label>
        <input type="password" name="newmdp1" placeholder="Mot de passe" /><br /><br />
        <label>Confirmation - mot de passe :</label>
        <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
        <label for="">Avatar :</label>
        <input type="file" name="avatar" /><br /><br />
        <input type="submit" value="Mettre à jour mon profil !" />
      </form>
      <?php if (isset($msg)) {
        echo $msg;
      } ?>
    </div>
  </div>
</body>

</html>