<?php
session_start();
require_once "database.php";
if(isset($_SESSION['id']) AND $_SESSION['id']>0){
    $requser = $pdo->prepare('SELECT * FROM membres WHERE id =?');
    $requser->execute([$_SESSION['id']]);
    $user = $requser->fetch();
    // echo "<pre>";
    // var_dump($user);
    // echo "</pre>";

    // die();

    if(!empty($_POST['newpseudo']) && $_POST['newpseudo'] !== $user['pseudo']){
     
          $newpseudo = htmlspecialchars($_POST['newpseudo']);

          if(strlen($newpseudo)<255){
              $reqpseudo = $pdo->prepare("SELECT *FROM  membres WHERE pseudo = ?");
              $reqpseudo->execute([$newpseudo]);
              $pseudoexist = $reqpseudo->rowCount();

              if($pseudoexist == 0){
                  $requpdate = $pdo->prepare("UPDATE membres SET pseudo =? WHERE id = ?");
                  $requpdate->execute([$newpseudo, $_SESSION['id']]);
                  $_SESSION['pseudo'] = $newpseudo;
                  header("Location: profil.php?id=".$_SESSION['id']);
              }else{
                  $erreur = "ce pseudo est deja utiliser";
              }
          }else{
              $erreur = "votre pseudo ne doit pas depasser 255 caracteres!";
          }
      }


//mise a jour de l'email

        if(!empty($_POST['newmail']) && $_POST['newmail'] !== $user['mail']){
            
              $newmail = htmlspecialchars($_POST['newmail']);

                  if(filter_var($newmail, FILTER_VALIDATE_EMAIL)){
                      $reqmail = $pdo->prepare("SELECT *FROM  membres WHERE mail = ?");
                      $reqmail->execute([$newmail]);
                      $mailexist = $reqmail->rowCount();

                      if($mailexist == 0){
                          $requpdate = $pdo->prepare("UPDATE membres SET mail =? WHERE id = ?");
                          $requpdate->execute([$newmail, $_SESSION['id']]);
                          $_SESSION['mail'] = $newmail;
                          header("Location: profil.php?id=".$_SESSION['id']);
                      }else{
                        $erreur="cet email est deja utiliser!";
                      }
                }else{
                  $erreur= "votre mail n'est pas valide!";
                }
            }


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
//mise a jour du mot de passe

if(!empty($_POST['newmdp1']) &&!empty($_POST['newmdp1'])){

}else{
  $erreur= "veillez remplir les champs de mot de passe";
}
?>
    <div align="left">
      <form method="POST" action="" enctype="multipart/form-data">
        <label>Pseudo :</label>
        <input type="text" name="newpseudo" placeholder="Pseudo" value="<?= $user['pseudo'] ?? "" ?>" /><br /><br />
        <label>Mail :</label>
        <input type="text" name="newmail" placeholder="Mail" value="<?= $user['mail'] ?? "" ?>" /><br /><br />
        <label>Mot de passe :</label>
        <input type="password" name="newmdp1" placeholder="Mot de passe" /><br /><br />
        <label>Confirmation - mot de passe :</label>
        <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
        <label for="">Avatar :</label>
        <input type="file" name="avatar" /><br /><br />
        <input type="submit" value="Mettre à jour mon profil !" />
      </form>
     
    </div>
  </div>
</body>

</html>