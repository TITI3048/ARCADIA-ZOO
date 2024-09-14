<?php
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "arcadia-zoo";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparer et lier
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Exécuter la requête
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Rediriger vers dashboard.php après une connexion réussie
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Nom d'utilisateur incorrect";
    }

    // Fermer la déclaration
    $stmt->close();
}

// Fermer la connexion
$conn->close();
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
                <br>
                <a href="accueil.html">Retour à l'accueil</a>
            </div>
        </form>
    </section>
</body>
</html>