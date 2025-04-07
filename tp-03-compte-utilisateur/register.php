<?php
require_once "database2.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //recuperation des donnees du formulaires
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = $_POST['mdp'];
  

    function register($nom, $email, $mdp)
    {
        global  $pdo;
        //verification des champs
        if (empty($nom) || empty($mail)  || empty($mdp) ) {
            return "Tous les champs doivent etre remplis";
          
        }
        //verification de la longueur du nom
        if (strlen($nom) > 255) {
            return "Votre nom ne doit pas depasser 255 caracteres";
        }
        $sql = "SELECT * FROM membres WHERE nom = :nom";
        $reqnom = $pdo->prepare($sql);
        $reqnom->execute(compact('nom'));
        $nomExist = $reqnom->fetch();
        if ($nomExist) {
            return "Ce nom est deja utilisé";
        }
        $sql = "SELECT*FROM membres WHERE email = :email";
        $reqEmail = $pdo->prepare($sql);
        $reqEmail->execute(compact('email'));
        $emailExist = $reqMail->fetch();
        if($emailExist){
            return "le mail est deja utiliser";
        }
    if(strlen($mdp<8) ||!preg_match("#[0-9]+#",$mdp) ||!preg_match("#[a-zA-Z]+#",$mdp)){
        return"le mot de passe doit contenir au moins 8caracteres,une lettre et un chiffre";
    }
    //crytage du mot de passe
    $mdp = password_hash($mdp,PASSWORD_DEFAULT);
    //insertion des donnee dans la base de donnee
    $sql = "INSERT INTO membres(nom,email,mdp)VALUES (:nom, :email, :mdp)";
    $req = $pdo->prepare($sql);
    $req->execute(compact('nom','email','mdp'));
    return "votre compte a bien ete cree !<a style= 'color:white;' href = \"login.php\">connexion</a>";
    }
    //verification de la validité de l'adresse mail
    $error = register($nom, $email, $mdp);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md">
    <h1 class="text-3xl font-bold text-center text-purple-700 mb-6">Créer un compte</h1>

          
    <form class="space-y-5">
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Nom</label>
        <input type="text" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 outline-none">
      </div>
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
        <input type="email" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 outline-none">
      </div>
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 outline-none">
      </div>
      <button type="submit" class="w-full bg-purple-600 text-white font-semibold py-2 rounded-xl shadow-md hover:bg-purple-700 transition">S'inscrire</button>
      <p class="text-center text-sm text-gray-600 mt-3">Déjà inscrit ? <a href="login.php" class="text-purple-600 font-medium hover:underline">Connexion</a></p>
    </form>
  </div>
</body>
</html>

