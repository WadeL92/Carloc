<?php
session_start();
require "modele/UtilisateurDb.php";

$classUtilisateur = new UtilisateurDb();
$ident = $_POST["ident"];
$mdp = $_POST["password"];
$compte = $classUtilisateur->getUtilisateur($ident, $mdp);
if ($compte == 0) {
	header ('Location: index.php');
} else {
	$_SESSION["idUtil"] = $compte ["id"];
	header ('Location: listeVehicule.php');
}
