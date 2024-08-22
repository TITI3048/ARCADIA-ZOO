<?php
if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){

}else{
    echo "Veuillez remplir tous les champs...";
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