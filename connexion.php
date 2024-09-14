<?php

session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "arcadia zoo";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Préparer et exécuter la requête SQL
    $sql = "SELECT * FROM utilisateurs WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifier si les informations d'identification sont correctes
    if ($result->num_rows > 0) {
        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['username'] = $username;
        // Rediriger vers dashboard.php
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form method="post" action="connexion.php">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>
    <section>
        <form>
            <div class="lien">
                <a href="iscription.html">Créer un compte</a>
            </div>
            <div class="lien">
                <a href="accueil.html">Retour à l'accueil</a>
            </div>
        </form>
    </section>
</body>
</html>