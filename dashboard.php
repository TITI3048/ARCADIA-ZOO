<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "arcadia-zoo";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Fonction pour exécuter une requête SQL et retourner les résultats
function executeQuery($conn, $sql) {
    $result = $conn->query($sql);
    if ($result === FALSE) {
        die("Erreur : " . $conn->error);
    }
    return $result;
}

// Ajouter un employé
if (isset($_POST['add_employee'])) {
    $name = $_POST['employee_name'];
    $position = $_POST['employee_position'];
    $sql = "INSERT INTO employees (name, position) VALUES ('$name', '$position')";
    executeQuery($conn, $sql);
}

// Retirer un employé
if (isset($_POST['delete_employee'])) {
    $employee_id = $_POST['employee_id'];
    $sql = "DELETE FROM employees WHERE id = $employee_id";
    executeQuery($conn, $sql);
}

// Ajouter un service
if (isset($_POST['add_service'])) {
    $service_name = $_POST['service_name'];
    $sql = "INSERT INTO services (name) VALUES ('$service_name')";
    executeQuery($conn, $sql);
}

// Retirer un service
if (isset($_POST['delete_service'])) {
    $service_id = $_POST['service_id'];
    $sql = "DELETE FROM services WHERE id = $service_id";
    executeQuery($conn, $sql);
}

// Ajouter un animal
if (isset($_POST['add_animal'])) {
    $animal_name = $_POST['animal_name'];
    $species = $_POST['species'];
    $sql = "INSERT INTO animals (name, species) VALUES ('$animal_name', '$species')";
    executeQuery($conn, $sql);
}

// Retirer un animal
if (isset($_POST['delete_animal'])) {
    $animal_id = $_POST['animal_id'];
    $sql = "DELETE FROM animals WHERE id = $animal_id";
    executeQuery($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Inclure le CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mon Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Bienvenue sur votre Dashboard</h1>
                <p>Utilisez les sections ci-dessous pour gérer vos employés, services et animaux.</p>
            </div>
        </div>

        <!-- Section Employés -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Gérer les Employés</h2>
                <form method="post" action="dashboard.php">
                    <div class="form-group">
                        <label for="employee_name">Nom de l'employé :</label>
                        <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_position">Poste :</label>
                        <input type="text" class="form-control" id="employee_position" name="employee_position" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_employee">Ajouter Employé</button>
                </form>
                <form method="post" action="dashboard.php" class="mt-3">
                    <div class="form-group">
                        <label for="employee_id">ID de l'employé à retirer :</label>
                        <input type="number" class="form-control" id="employee_id" name="employee_id" required>
                    </div>
                    <button type="submit" class="btn btn-danger" name="delete_employee">Retirer Employé</button>
                </form>
            </div>
        </div>

        <!-- Section Services -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Gérer les Services</h2>
                <form method="post" action="dashboard.php">
                    <div class="form-group">
                        <label for="service_name">Nom du service :</label>
                        <input type="text" class="form-control" id="service_name" name="service_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_service">Ajouter Service</button>
                </form>
                <form method="post" action="dashboard.php" class="mt-3">
                    <div class="form-group">
                        <label for="service_id