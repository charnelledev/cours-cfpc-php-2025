<?php
require_once "./database.php";
$message = "";
function clean_input($data){
  return htmlspecialchars(stripslashes(trim($data)));
  
}

if(isset($_POST['create'])){
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['mail'];
}
  if(empty($nom) || empty($prenom) || empty($mail)){
    $message = ' <span style="background:red; padding:10px;  color:white margin:15px;"> Veillez remplir les champs </span>';
}else{
  $sql_mail = "SELECT * FROM students WHERE mail = :mail";
  $request_mail = $pdo->prepare($sql_mail);
  $request_mail->execute(compact('mail'));
  $mail_exist= $request_mail->fetch();

  if($mail_exist){
    $message = ' <span style="background:red; padding:10px;  color:white margin:15px;"> Email existe deja </span>';
  }else{
    $sql="INSERT INTO students(nom, prenom, mail) VALUES(:nom, :prenom, :mail)";
    $request= $pdo->prepare($sql);
    $request->execute(compact('nom', 'prenom', 'mail'));
    $message = ' <span style="background:green; padding:10px;  color:white margin:15px;"> Etudiant creer avec succes </span>';
  }

  $sql="INSERT INTO students(nom, prenom, mail) VALUES(:nom, :prenom, :mail)";
  $request= $pdo->prepare($sql);
  $request->execute(compact('nom', 'prenom', 'mail'));
  $message = ' <span style="background:green; padding:10px;  color:white margin:15px;"> Etudiant creer avec succes </span>';

  // $request->execute([
  //   'nom' => $nom,
  //   'prenom' => $prenom,
  //   'mail' => $mail
  // ]);
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/output.css">
  <title>Créer un nouveau Etudiant</title>

</head>

<body class="bg-green-100">
  <div class="container mx-auto p-4  text-center">
    <h1 class="text-3xl font-bold text-green-900 text-center mb-4 ">Créer un nouveau Etudiant</h1>
  
             <?= $message ?>
            

    <form action="" method="post" class="bg-white p-6 rounded shadow max-w-md  mx-auto">
      <div class="mb-4">
        <input type="text" name="nom" placeholder="Nom"
          class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="mb-4">
        <input type="text" name="prenom" placeholder="Prénom"
          class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="mb-4">
        <input type="email" name="mail" placeholder="Email"
          class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="text-center">
        <input type="submit" name="create" value="Créer"
          class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
      </div>
    </form>

    <div class="mt-4 text-center">
      <a class=" my-5 px-4 py-2 mr-5 bg-green-600 text-white rounded hover:bg-green-700" href="http://localhost/cours-cfpc-php-2025/tp-01-crud-student/">Liste
        des étudiants
      </a>
    </div>
  </div>


</body>


</html>