<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia Zoo</title>
    <link rel="stylesheet" href="css/connexion.css">
</head>

<body>
    <form method="POST" class="admin">
        <h1>Se Connecter</h1>
        <p class="choose-email"> Accès réservé au personnel</p>
            <div class="mb-3">
                <label for="EmailInput" class="form-label" name="pseudo">adresse email</label> 
                <input type="email" class="form-control" id="EmailInput">
            </div>
            <div class="mb-3">
                <label for="PassWord" class="form-label" name="mdp">Mot de Passe</label>
                <input type="password" class="form-control" id="PassWord">
            </div>
            <div class="text">
                <button type="submit" class="btn btn-primary" name="valider">Connexion
                </button>
                
            </div>

            <div class="lien">
                <a href="/connexion/inscription.html">Créer un compte</a>
            </div>

        <div class="lien">
            <a href="/Accueil/accueil.html">Retour à l'accueil</a>
        </div>
    </form>
</body>

</html>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Arcadia Zoo</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
