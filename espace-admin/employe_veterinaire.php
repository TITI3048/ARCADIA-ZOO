<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace-admin', 'root', '');

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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employé et vétérinaire</title>
</head>
<body>
    
<?php
    $recupUsers = $bdd->query('SELECT * FROM employe_veterinaire');
    while($user = $recupUsers->fetch()) {
        echo $user['pseudo'];
        echo "<br>";
    }
?>


</body>
</html>