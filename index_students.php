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
    




</body>
</html>