<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: connexion.php");
    exit();
}

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "arcadia_zoo";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

function executeQuery($conn, $sql, $params)
{
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    $types = array_shift($params);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute() === false) {
        die("Erreur d'exécution de la requête : " . $stmt->error);
    }

    return $stmt->get_result();
}

if (isset($_POST['add_employe'])) {
    $nom = $_POST['employe_name'];
    $prenom = $_POST['employe_firstname'];
    $email = $_POST['employe_email'];
    $poste = $_POST['employe_position'];
    $sql = "INSERT INTO employes (nom, prenom, email, poste) VALUES (?, ?, ?, ?)";
    executeQuery($conn, $sql, ['ssss', $nom, $prenom, $email, $poste]);
    header("Location: employes.php");
    exit();
}

if (isset($_POST['delete_employe'])) {
    $employee_id = $_POST['employe_id'];
    $sql = "DELETE FROM employes WHERE id = ?";
    executeQuery($conn, $sql, ['i', $employee_id]);
    header("Location: employes.php");
    exit();
}

$sql = "SELECT id, nom, prenom, email, poste FROM employes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        background-color: #2980b9 ;
    }

    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mon Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="employes.php">Employés <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="animaux.php">Animaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php">Déconnexion</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="accueil.html">Retour au Site</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Gérer les Employés</h1>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="employes.php">
                    <div class="form-group">
                        <label for="employe_name">Nom de l'employé :</label>
                        <input type="text" class="form-control" id="employe_name" name="employe_name" required>
                    </div>
                    <div class="form-group">
                        <label for="employe_firstname">Prénom de l'employé :</label>
                        <input type="text" class="form-control" id="employe_firstname" name="employe_firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="employe_email">Email de l'employé :</label>
                        <input type="email" class="form-control" id="employe_email" name="employe_email" required>
                    </div>
                    <div class="form-group">
                        <label for="employe_position">Poste :</label>
                        <input type="text" class="form-control" id="employe_position" name="employe_position" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_employe">Ajouter Employé</button>
                </form>
                <form method="post" action="employes.php" class="mt-3">
                    <div class="form-group">
                        <label for="employe_id">ID de l'employé à retirer :</label>
                        <input type="number" class="form-control" id="employe_id" name="employe_id" required>
                    </div>
                    <button type="submit" class="btn btn-danger" name="delete_employe">Retirer Employé</button>
                </form>
            </div>
        </div>

        <h1 class="mt-5">Liste des Employés</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Poste</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . $row["prenom"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["poste"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Aucun employé trouvé</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>