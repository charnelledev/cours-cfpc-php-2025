<?php

if (isset($_POST['create'])){
    // echo"Formulaire creer avec succes! ";
    $nom_student = $_POST ['nom'];
    echo "Nom:  $nom_student". '<br>';

    $prenom_student = $_POST ['prenom'];
    echo "Prenom:  $prenom_student".'<br>';

    $email_student = $_POST ['mail'];
    echo "Email:  $email_student".'<br>';
}

// if (empty($_POST['nom'])){
//     echo "veillez saisir votre nom". '<br>';
// }
// $email = $_POST['mail'];
// if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     echo "veillez saisir une adresse email valide". '<br>';
// }


$nom_student =$_POST['nom'];
$prenom_student =$_POST['prenom'];
$email_student =$_POST['mail'];
$message ="";

if (isset($_POST['create'])) {
    if(empty($nom_student)|| empty($prenom_student)|| empty($email_student)) {
        $message ="vaillez saisir tous les champs";
    }else{
        // echo"Nom: $nom_student <br>";
    }
}











?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./src/output.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="bg-green-500 text-center m-10 ">Formulaire

    </h1>

    <form action="" method="post" class="bg-white p-6 rounded shadow max-w-md mx-auto">
    <div class ="bg-red-300 p-5 text-red-600 mb-8">
    <?php echo "$message" ?>
</div>
    <div class="mb-4">
      <input type="text" name="nom" placeholder="Nom"
        class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
    </div>
    <div class="mb-4">
      <input type="text" name="prenom" placeholder="Prénom"
        class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
    </div>
    <div class="mb-4">
      <input type="email" name="mail" placeholder="Email"
        class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
    </div>
    <div class="text-center">
      <input type="submit" name="create" value="Créer"
        class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
    </div>
  </form>
</body>
</html>