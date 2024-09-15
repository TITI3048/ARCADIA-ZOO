<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "arcadia-zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Démarrer la session et stocker le nom d'utilisateur
            $_SESSION['username'] = $username;
            // Rediriger vers dashboard.php après une connexion réussie
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Mot de passe incorrect";
        }
    } else {
        $error = "Nom d'utilisateur incorrect";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/connexion.css">
    <title>Connexion</title>
</head>
<body>
    <div class="login-container">
        <form method="post" action="connexion.php">
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Se connecter</button>
            <div class="lien">
                <a href="iscription.html">Créer un compte</a>
                <br>
                <a href="accueil.html">Retour à l'accueil</a>
            </div>
        </form>
    </div>
</body>
</html>