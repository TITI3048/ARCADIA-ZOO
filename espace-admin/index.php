<?php
session_start();
if(!$_SESSION['mdp']){
    header('location: /espace-admin/connexion.php');
}

?>