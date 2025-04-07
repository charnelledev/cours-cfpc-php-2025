<?php
// login.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Ici tu mettras la vérification depuis ta base de données
    if ($email === 'admin@example.com' && $password === '123456') {
        $_SESSION['user'] = $email;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Identifiants invalides';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-400 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md">
    <h1 class="text-3xl font-bold text-center text-teal-700 mb-6">Connexion</h1>
    <form class="space-y-5">
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
        <input type="email" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-teal-500 outline-none">
      </div>
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-teal-500 outline-none">
      </div>
      <div class="flex items-center justify-between">
        <label class="flex items-center text-sm text-gray-600">
          <input type="checkbox" class="mr-2"> Se souvenir de moi
        </label>
        <a href="#" class="text-sm text-teal-600 hover:underline">Mot de passe oublié ?</a>
      </div>
      <button type="submit" class="w-full bg-teal-600 text-white font-semibold py-2 rounded-xl shadow-md hover:bg-teal-700 transition">Se connecter</button>
      <p class="text-center text-sm text-gray-600 mt-3">Pas encore de compte ? <a href="register.php" class="text-teal-600 font-medium hover:underline">S'inscrire</a></p>
    </form>
  </div>
</body>
</html>

