<?php
// Configuration de la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ma_base_de_donnees";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Créer la base de données si elle n'existe pas
$sql = "CREATE DATABASE IF NOT EXISTS ma_base_de_donnees";
if ($conn->query($sql) === TRUE) {
    echo "Base de données créée avec succès ou déjà existante.";
} else {
    die("Erreur lors de la création de la base de données: " . $conn->error);
}

// Sélectionner la base de données
$conn->select_db("ma_base_de_donnees");

// Création de la table si elle n'existe pas
$sql = "CREATE TABLE IF NOT EXISTS animaux (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    habitat VARCHAR(50) NOT NULL,
    espece VARCHAR(30) NOT NULL,
    likes INT(6) NOT NULL DEFAULT 0
)";
$conn->query($sql);

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $habitat = $_POST['habitat'];
    $espece = $_POST['espece'];

    $sql = "INSERT INTO animaux (nom, habitat, espece) VALUES ('$nom', '$habitat', '$espece')";
    if ($conn->query($sql) === TRUE) {
        echo "Nouvel enregistrement créé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// Traitement du formulaire de suppression
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    $sql = "DELETE FROM animaux WHERE id='$delete_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement supprimé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// Récupération des données
$sql = "SELECT id, nom, habitat, espece, likes FROM animaux";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animaux</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Ajouter un Animal</h2>
    <form method="post" action="animaux.php">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="habitat">Habitat:</label>
            <input type="text" class="form-control" id="habitat" name="habitat" required>
        </div>
        <div class="form-group">
            <label for="espece">Espèce:</label>
            <input type="text" class="form-control" id="espece" name="espece" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <h2 class="mt-5">Liste des Animaux</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Habitat</th>
                <th>Espèce</th>
                <th>Likes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . $row["nom"]. "</td>
                            <td>" . $row["habitat"]. "</td>
                            <td>" . $row["espece"]. "</td>
                            <td>" . $row["likes"]. "</td>
                            <td>
                                <form method='post' action='animaux.php' style='display:inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Supprimer</button>
                                </form>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Aucun animal trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>