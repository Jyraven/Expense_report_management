<?php
// Vérifier si l'utilisateur est connecté et a le rôle "Visiteur"
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Visiteur') {
    header('Location: login.php');
    exit();
}

// Déterminer la page en cours
$current_page = basename($_SERVER['PHP_SELF']);

// Déterminer la profondeur du fichier pour ajuster le chemin du logo
$depth = substr_count($_SERVER['PHP_SELF'], '/');
$logo_path = str_repeat('../', $depth - 1) . "public/images/logo.webp";
?>

<div class="bg-blue-600 text-white py-4 px-8 flex justify-between items-center">
    <div>
        <img src="<?= $logo_path ?>" alt="Logo" class="w-32">
    </div>

    <div class="flex-grow flex justify-center space-x-8">
        <?php if ($current_page === "gestion_fiche.php"): ?>
            <a href="../vues/visiteur.php" class="text-white hover:text-gray-300">Accueil</a>
        <?php else: ?>
            <a href="../views/fiches/gestion_fiche.php" class="text-white hover:text-gray-300">Gestion des fiches</a>
        <?php endif; ?>

        <a href="../views/fiches/historique_remboursement.php" class="text-white hover:text-gray-300">Historique des remboursements</a>
    </div>

    <div class="flex items-center space-x-4">
        <span class="text-white"><?= htmlspecialchars($_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']); ?></span>
        <img src="<?= $logo_path ?>" alt="Profil" class="w-10 h-10 rounded-full border-2 border-white">
    </div>
</div>