<?
session_start();
$_SESSION = array();
session_destroy();
header('Location: /espace-admin/connexion.php');

?>