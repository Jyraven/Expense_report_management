<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$basePath = (in_array($currentPage, ['admin.php'])) ? "../" : "../../";
?>

<div class="bg-blue-600 text-white py-4 px-8 flex justify-between items-center">
    <div>
        <img src="<?= $basePath ?>public/images/logo.webp" alt="Logo" class="w-32">
    </div>

    <div class="flex-grow flex justify-center space-x-8">
        <?php if ($currentPage !== 'admin.php'): ?>
            <a href="<?= $basePath ?>templates/admin.php" class="text-white hover:text-gray-300 <?= $currentPage === 'admin.php' ? 'font-bold underline' : '' ?>">
                Accueil
            </a>
        <?php endif; ?>

        <?php if ($currentPage !== 'gestion_usr.php'): ?>
            <a href="<?= $basePath ?>views/users/gestion_usr.php" class="text-white hover:text-gray-300 <?= $currentPage === 'gestion_usr.php' ? 'font-bold underline' : '' ?>">
                Gestion des utilisateurs
            </a>
        <?php endif; ?>

        <?php if ($currentPage !== 'gestion_fiche.php'): ?>
            <a href="<?= $basePath ?>views/fiches/gestion_fiche.php" class="text-white hover:text-gray-300 <?= $currentPage === 'gestion_fiche.php' ? 'font-bold underline' : '' ?>">
                Gestion des fiches
            </a>
        <?php endif; ?>
    </div>

    <div class="flex items-center space-x-4">
        <span class="text-white"><?= htmlspecialchars($_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']); ?></span>
        
        <!-- Avatar -->
        <svg xmlns="http://www.w3.org/2000/svg" 
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" class="w-10 h-10 text-white rounded-full border-2 border-white bg-blue-700 p-1">
            <path stroke-linecap="round" stroke-linejoin="round" 
                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
        </svg>

        <!-- Déconnexion -->
        <form action="<?= $basePath ?>Auth/logout.php" method="post">
            <button type="submit" title="Se déconnecter"
                class="text-white hover:text-red-300 transition p-2 rounded-full border border-white">
                <i class="fas fa-sign-out-alt text-xl"></i>
            </button>
        </form>
    </div>
</div>