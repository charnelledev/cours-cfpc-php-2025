<?php
// remember.php (simule la fonctionnalité "se souvenir de moi")
session_start();
$error = $success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $remember = isset($_POST['remember']);

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if ($remember) {
      setcookie('remembered_email', $email, time() + (86400 * 30), "/"); // Cookie pour 30 jours
      $success = "Email mémorisé : $email";
    } else {
      setcookie('remembered_email', '', time() - 3600, "/"); // Supprimer le cookie
      $success = "Mémoire désactivée.";
    }
  } else {
    $error = "Adresse email invalide.";
  }
}
$remembered_email = $_COOKIE['remembered_email'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Se souvenir de moi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-200 via-teal-200 to-green-200 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-teal-700 mb-6">Se souvenir de moi</h1>
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
        <input name="email" type="email" value="<?= htmlspecialchars($remembered_email) ?>" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-teal-500 outline-none">
      </div>
      <div class="flex items-center space-x-2">
        <input name="remember" type="checkbox" id="remember" class="accent-teal-600" <?= $remembered_email ? 'checked' : '' ?>>
        <label for="remember" class="text-sm text-gray-700">Se souvenir de moi</label>
      </div>
      <button type="submit" class="w-full bg-teal-600 text-white font-semibold py-2 rounded-xl shadow-md hover:bg-teal-700 transition">Soumettre</button>
    </form>
    <p class="text-sm text-gray-600 mt-4">Retour à la <a href="login.php" class="text-teal-600 font-medium hover:underline">connexion</a></p>
  </div>
</body>
</html>
