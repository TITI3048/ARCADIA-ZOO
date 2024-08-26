<?php
session_start();

if (!isset($_SESSION['connected'])) {
    header('Location: connexion.php');
    exit;
}

if (isset($_SESSION['timeout'])) {
    if ($_SESSION['timeout'] + 300 < time()) { 
        session_destroy();
        header('Location: connexion.php');
        exit;
    }
} else {
    $_SESSION['timeout'] = time();
}


$_SESSION['timeout'] = time();
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
    <a href="employe_veterinaire.php">Affiché  les employés et les vétérinaires</a>

</body>
    </html>