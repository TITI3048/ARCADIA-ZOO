<?php
'session_satrt'();
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $_pseudo_par_defaut ="admin";
        $_mdp_par_defaut = "admin1234";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi ==$mdp_par_defaut){
            $_SESSION['pseudo'] = $pseudo_saisi;
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location:index.php');
        }else{
            echo"votre pseudo ou votre mot de passe et incorrect...";
        }
        }else{
            echo"veuillez remplir tous les champs...";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace de connexion admin</title>
</head>
<body>
    <form method="POST" action="" aligne="center">
        <input type="text" name="pseudo" autocomplete="off">
        <br>
        <input type="password" name="mdp">
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>