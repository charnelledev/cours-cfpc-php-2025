<?php
// confirm_token.php (confirmation du token)
session_start();
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $token = trim($_POST['token'] ?? '');

  if ($token === $_SESSION['token']) {
    $success = "Token confirmé avec succès.";
    // Effectuer l'action désirée ici, comme la réinitialisation du mot de passe
    // Par exemple, rediriger vers une page de réinitialisation du mot de passe
  } else {
    $error = "Token invalide. Veuillez vérifier votre email.";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation du Token</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-200 via-pink-200 to-yellow-200 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-purple-700 mb-6">Confirmer le Token</h1>
    
    <?php if ($success): ?>
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 font-medium">
        <?= $success ?>
      </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
      <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 font-medium">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="" class="space-y-5 text-left">
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Entrez votre token</label>
        <input name="token" type="text" class="w-full px-4 py-2 border
