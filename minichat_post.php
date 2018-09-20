<?php
session_start();
#ouverture de la session sur cette page pour attribuer la valeur du pseudo dans la variable de session créée

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

# Récupération du pseudo saisi pour la'ttribuer à la variable de session
$_SESSION['pseudo'] = $_POST['pseudo'];


// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>