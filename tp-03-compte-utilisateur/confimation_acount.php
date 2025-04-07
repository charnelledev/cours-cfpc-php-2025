<?php
// confirmation.php (confirmation de compte par token)
$success = $error = '';

// Simuler une vérification de token reçu par GET
if (isset($_GET['token'])) {
  $token = $_GET['token'];

  // Exemple de token attendu (à remplacer par une vérif BDD)
  if ($token === '123456') {
    $success = "Votre compte a été confirmé avec succès !";
  } else {
    $error = "Token invalide ou expiré.";
  }
} else {
  $error = "Aucun token fourni.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation de compte</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-300 via-blue-300 to-purple-300 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-purple-700 mb-6">Confirmation de compte</h1>
    <?php if ($success): ?>
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 font-medium">
        <?= $success ?>
      </div>
      <a href="login.php" class="inline-block mt-4 bg-purple-600 text-white px-4 py-2 rounded-xl shadow-md hover:bg-purple-700 transition">Se connecter</a>
    <?php else: ?>
      <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 font-medium">
        <?= $error ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
