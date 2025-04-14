<?php
session_start();
require_once('./includes/database.php');
require_once('./includes/function.php');


// chifre de 1 a 9
// $chiffre = range(0, 9);
// // lettre de a a z
// $minuscule = range('a','z');
// // lettre de A a Z
// $majuscule = range('A','Z');

// $token= generateToken(100);

// echo "<pre>";
// print_r($token);
// echo "</pre>";
// die();

// echo "<pre>";
// print_r($minuscule);
// echo "</pre>";


// echo "<pre>";
// print_r($majuscule);
// echo "</pre>";

// die();

if(isset($_POST)){
    $errors=[];
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // $usernamme
    if(empty($_POST['username']) ||
    !preg_match(
        "/^[a-zA-Z0-9_]{3,20}$/",
        $_POST['username'])){
        $errors['username']="veillez entrer un nom d'utilisateur valide(3-20 caractères)";
            // var_dump($errors['username']);
        }else{
            $query=$pdo->prepare("SELECT * FROM users WHERE username=?");
            $query->execute([$_POST['username']]);  
            $user=$query->fetch(PDO::FETCH_ASSOC);
            if($user){
                $errors['username']="Ce nom d'utilisateur existe déjà";
            }
        }

     //mail
        if(empty($_POST['mail']) || !filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
            $errors['mail']="veillez entrer un adresse mail valide";
        }else{
            $query=$pdo->prepare("SELECT * FROM users WHERE mail=?");
            $query->execute([$_POST['mail']]);  
            $user=$query->fetch(PDO::FETCH_ASSOC);
            if($user){
                $errors['mail']="Cette adresse mail existe déjà";
            }
        }

// die();
        //password
            if (empty($_POST['password']) 
            ) {
            $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre";
        } else if ($_POST['password'] !== $_POST['confirm_password']) {
            $errors['confirm_password'] = "Les mots de passe ne correspondent pas";
        }

    // if (empty($_POST['confirm_password'])) {
    //     $errors['confirm_password'] = "Veuillez confirmer le mot de passe";
    // } else if ($_POST['password'] !== $_POST['confirm_password']) {
    //     $errors['confirm_password'] = "Les mots de passe ne correspondent pas";
    // }

    // echo "<pre>";
    // print_r($errors);
    // echo "</pre>";
    // die();
//INSERT INTO
if(empty($errors)){
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $mail=$_POST['mail'];
    $username=$_POST['username'];
    
    //appele la function generateToken pour generer un  token aleatoire de 100 caractere
    $token=generateToken(100);
    
    $sql="INSERT INTO users (username,mail,  password, confirmation_token) VALUES (:username,:mail, :password,:confirmation_token)";
    
    $query=$pdo->prepare($sql);
    
    //Exection de la requete avec parametre nommer 
    $query->execute([
        "mail" => $mail,
        "username" => $username,
        "password" => $password,
        "confirmation_token" => $token,]);

        $userId=$pdo->lastInsertId();
        $mail = $_POST['mail'];
        $subject = "Confirmation du compte";
        $link = "http://localhost/cours-cfpc-php-2025/gestion_compte_user//confirm?id=$userId&token=$token";

        $message = "Afin de confirmer votre compte, merci de cliquer sur ce lien : 
        <a href='$link'>Confirmer mon compte</a>";

        // Envoi de l'e-mail en utilisant le format HTML
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($mail, $subject, $message, $headers);
        //envoyez un message de success ver la page de conexion
        $_SESSION['flash']['success'] = "Un email de confirmation a été envoyé à l'adresse $mail. Veuillez verifier votre boites de receptionbafin de confirmer votre mot de passe.";
        header('Location: login.php');
        exit();



        
        // $userId=$pdo->lastInsertId();

        // $mail = $_POST['mail'];
        // $subject = "Confirmation du compte";
        // link = "http://localhost/cours-cfpc-php-2025/gestion_compte_user/confirm?id=$userId&token=$token";
        // $message = "Afin de confirmer votre compte, merci de cliquer sur ce lien";
        // $message .= "<br>"; : 
        // <a href='$link'>Confirmer mon compte</a> 
        // // Envoi de l'e-mail en utilisant le format HTML
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // mail($mail, $subject, $message, $headers);  
        
        // mail($mail,$subject,$message);

        // var_dump($userId);
        // die();   
}
}

?>
<?php require_once './includes/header.php'; ?>


<div class="content">
    <div class="container">
        <div class="header">
            <h2>S'inscrire</h2>
        </div>
        <?php
        if (!empty($errors)) {
            echo '<div style="color:white; text-align: center; background-color:#ff6c6c; padding:2px 7px; margin-bottom:10px; font-size:23px;">' . reset($errors) .'</div>';
        }
        ?>
        <form action="" class="form" id="form" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" placeholder="nom" name="username" autocomplete="off"
                value="<?= isset($_POST['username']) ? $_POST['username']: ''; ?>">
                
            </div>
            <div class="form-control">
                <label for="mail">mail</label>
                <input type="email" id="mail" placeholder="nom" name="mail" autocomplete="off">
            
            </div>

            

            <div class="form-control">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">

            </div>

            <div class="form-control">
                <label for="confirm_password">Confirmation du mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password">

            </div>
            

            <button type="submit"> S'inscrire</button>

        </form>

    </div>
</div>
<?php
require_once './includes/footer.php';
?>