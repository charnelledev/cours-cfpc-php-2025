<?php
// reset.php (demande de réinitialisation de mot de passe)
$success = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Simuler l'envoi du lien de réinitialisation (à remplacer par un vrai email/token)
    $success = "Un lien de réinitialisation a été envoyé à $email.";
  } else {
    $error = "Veuillez entrer une adresse email valide.";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réinitialiser le mot de passe</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-yellow-300 via-orange-300 to-red-300 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-red-600 mb-6">Réinitialisation</h1>
    <?php if ($success): ?>
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 font-medium">
        <?= $success ?>
      </div>
    <?php elseif ($error): ?>
      <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 font-medium">
        <?= $error ?>
      </div>
    <?php endif; ?>
    <form method="POST" action="" class="space-y-5 text-left">
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Adresse email</label>
        <input name="email" type="email" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-red-500 outline-none">
      </div>
      <button type="submit" class="w-full bg-red-600 text-white font-semibold py-2 rounded-xl shadow-md hover:bg-red-700 transition">Envoyer le lien</button>
    </form>
    <p class="text-sm text-gray-600 mt-4">Retour à la <a href="login.php" class="text-red-600 font-medium hover:underline">connexion</a></p>
  </div>
</body>
</html>
