<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Services - Tableau de Bord</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mon Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Accueil Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="animaux.php">Animaux</a>
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
    <header class="bg-primary text-white text-center py-3">
        <h1>Gestion des Services</h1>
    </header>

    <main class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <section class="add-service mb-4">
                    <h2>Ajouter un Service</h2>
                    <form action="services.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="service-title">Titre du Service:</label>
                            <input type="text" class="form-control" id="service-title" name="service-title" required>
                        </div>
                        <div class="form-group">
                            <label for="service-description">Description:</label>
                            <textarea class="form-control" id="service-description" name="service-description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="service-image">Image:</label>
                            <input type="file" class="form-control-file" id="service-image" name="service-image" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </section>
            </div>

            <div class="col-md-6">
                <section class="delete-service mb-4">
                    <h2>Supprimer un Service</h2>
                    <form action="services.php" method="post">
                        <div class="form-group">
                            <label for="service-id">ID du Service:</label>
                            <input type="text" class="form-control" id="service-id" name="service-id" required>
                        </div>
                        <button type="submit" class="btn btn-danger" name="delete-service">Supprimer</button>
                    </form>
                </section>
            </div>
        </div>

        <section class="current-services">
            <h2>Services Actuels</h2>
            <div class="row">
                <?php
                // Connexion à la base de données
                $servername = "localhost";
                $username = "root";
                $password = "[Sensitive Parameter]";
                $dbname = "arcadia-zoo";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Requête pour récupérer les services
                $sql = "SELECT id, title, description, image, reg_date FROM services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher les services
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='col-md-4'>";
                        echo "<div class='card mb-4 shadow-sm'>";
                        echo "<img src='uploads/" . $row['image'] . "' class='card-img-top' alt='" . $row['title'] . "'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row['title'] . "</h5>";
                        echo "<p class='card-text'>" . $row['description'] . "</p>";
                        echo "<p class='card-text'><small class='text-muted'>ID: " . $row['id'] . "</small></p>";
                        echo "<p class='card-text'><small class='text-muted'>Date: " . $row['reg_date'] . "</small></p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='col-12'><div class='alert alert-info'>Aucun service trouvé.</div></div>";
                }

                $conn->close();
                ?>
            </div>
        </section>
    </main>
</body>
</html>