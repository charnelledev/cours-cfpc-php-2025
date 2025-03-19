<?php
require_once "database/database.php";


//requete sql
$sql = "SELECT *FROM students";
// $result = $connect->query($sql);

//preparer notre requete

$request =$pdo->prepare($sql);

//executer notre requete
$request->execute();


// $result=$request->fetchALL();
$result=$request->fetchALL(PDO::FETCH_ASSOC);


echo"<pre>";
var_dump($result);
echo"</pre>";

if (count($result)>0)
{



foreach($result as $row)
{

    echo "Id:" .$row['id'].       "</br>";
    echo "Nom:" .$row['nom'].       "</br>";
    echo "Prenom:" .$row['prenom'].       "</br>";
    echo "Mail:" .$row['mail'].       "</br>";
    echo "Password:" .$row['password'].       "</br>";
}
}else{
    echo "AUcun resultat trouver";
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index_student</title>
</head>
<body>
    

<style>
  table {
    border-collapse: collapse;
    width: 50%;
  }

  th,
  td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
  }
  </style>
</head>

<body>
  <?php if (count($result) > 0): ?>
  <table>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Mail</th>
      <th>Password</th>
    </tr>
    <?php foreach ($result as $row) : ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?=$row['nom']; ?></td>
      <td><?=$row['prenom']; ?></td>
      <td><?=$row['mail']; ?></td>
      <td><?=$row['password']; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php else: ?>
  <p>Aucun résultat trouvé.</p>
  <?php endif; ?>


</body>
</html>