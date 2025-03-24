<?php
require_once "./database.php";
$message = "";

function clean_input($data){
    return htmlspecialchars(stripslashes(trim($data)));
}


if(isset($_GET['id'])){
  $id = clean_input($_GET['id']);
  $sql = "SELECT * FROM students WHERE id =:id";
  $request = $pdo->prepare($sql);
  $request->execute(compact('id'));
  $student = $request->fetch();

//   var_dump($student['nom']);
   

  
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
    <h1 class="text-3xl font-bold text-green-900 text-center mb-4 ">Modiffier les information de l'etudiant</h1>
  
             <?= $message ?>
            

    <form action="" method="post" class="bg-white p-6 rounded shadow max-w-md  mx-auto">
      <div class="mb-4">
        <input type="text" name="nom" placeholder="Nom" value="<?= $student['nom'] ?? '' ; ?>"
          class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="mb-4">
        <input type="text" name="prenom" placeholder="Prénom" value="<?= $student['prenom'] ?? '' ; ?>"
          class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="mb-4">
        <input type="email" name="mail" placeholder="Email" value="<?=$student['mail'] ?? '' ; ?>"
          class="w-full border border-green-300 p-2 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="text-center">
        <input type="submit" name="update" value="modifier"
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