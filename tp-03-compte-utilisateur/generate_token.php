<?php
// generate_token.php (génération d’un token unique pour confirmation ou réinitialisation)
session_start();
$success = '';



function generateToken($length = 32) {
  return bin2hex(random_bytes($length / 2));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $token = generateToken();
    $_SESSION['token'] = $token;
    $success = "Token généré pour $email : $token";
  } else {
    $success = "Adresse email invalide.";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Générer un Token</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-200 via-pink-200 to-yellow-200 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-purple-700 mb-6">Générer un Token</h1>
    <?php if ($success): ?>
      <div class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded mb-4 font-medium break-words">
        <?= $success ?>
      </div>
    <?php endif; ?>
    <form method="POST" action="" class="space-y-5 text-left">
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Adresse email</label>
        <input name="email" type="email" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 outline-none">
      </div>
      <button type="submit" class="w-full bg-purple-600 text-white font-semibold py-2 rounded-xl shadow-md hover:bg-purple-700 transition">Générer</button>
    </form>
    <p class="text-sm text-gray-600 mt-4">Retour à la <a href="login.php" class="text-purple-600 font-medium hover:underline">connexion</a></p>
  </div>
</body>
</html>
