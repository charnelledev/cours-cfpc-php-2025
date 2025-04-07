<?php
// logout.php
session_start();
session_unset();
session_destroy();

header("Location: login.php?logout=1");
exit;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Déconnexion</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-red-300 via-pink-300 to-yellow-300 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-pink-700 mb-6">Vous êtes déconnecté</h1>
    <a href="login.php" class="inline-block bg-pink-600 text-white px-4 py-2 rounded-xl shadow-md hover:bg-pink-700 transition">Retour à la connexion</a>
  </div>
</body>
</html>
