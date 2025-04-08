<?php
session_start();
require_once "database.php";

// Vérifie si l'utilisateur est admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

// Vérifie si un ID a été passé dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Supprime l'étudiant avec cet ID
    $stmt = $pdo->prepare("DELETE FROM membres WHERE id = ?");
    $stmt->execute([$id]);

    $_SESSION['message'] = "Étudiant supprimé avec succès.";
} else {
    $_SESSION['message'] = "ID invalide.";
}

// Redirection vers la page de gestion
header("Location: admindfhhtyu-dashboard.php");
exit;


