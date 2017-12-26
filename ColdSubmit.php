<?php 
include "base.php";

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pfe;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$categories = $_GET['cat'];

// stocker categories dans user
$bdd->query("UPDATE users SET Categories = '".$categories."' WHERE Username = '".$_SESSION['Username']."'");

// Mettre session Cold Start à 0
$_SESSION['ColdStart'] = null; 

header('Location: index.php');

?>