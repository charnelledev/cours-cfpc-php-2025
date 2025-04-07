<!-- TP2 - Register Page -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md">
    <h1 class="text-3xl font-bold text-center text-purple-700 mb-6">Créer un compte</h1>
    <form class="space-y-5">
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Nom</label>
        <input type="text" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 outline-none">
      </div>
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
        <input type="email" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 outline-none">
      </div>
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" class="w-full px-4 py-2 border rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 outline-none">
      </div>
      <button type="submit" class="w-full bg-purple-600 text-white font-semibold py-2 rounded-xl shadow-md hover:bg-purple-700 transition">S'inscrire</button>
      <p class="text-center text-sm text-gray-600 mt-3">Déjà inscrit ? <a href="#" class="text-purple-600 font-medium hover:underline">Connexion</a></p>
    </form>
  </div>
</body>
</html>
