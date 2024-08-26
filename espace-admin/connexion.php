<?php
session_start();

if (isset($_POST['valider'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = password_hash("admin1234", PASSWORD_BCRYPT);

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if ($pseudo_saisi == $pseudo_par_defaut && password_verify($mdp_saisi, $mdp_par_defaut)) {
            $_SESSION['connected'] = true; 
            header('Location: admin.php');
            exit; 
        } else {
            echo "Votre pseudo ou votre mot de passe est incorrect...";
        }
    } else {
        echo "Veuillez remplir tous les champs...";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/espace-admin.css">
    <title>Espace de connexion admin</title>
</head>
<body>
    <form method="POST" class="admin">
        <input type="text" name="pseudo" autocomplete="off">
        <br>
        <input type="password" name="mdp">
        <br><br>
        <input type="submit" name="valider"> 
    </form>
</body>