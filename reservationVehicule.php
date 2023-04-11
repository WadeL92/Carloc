<!doctype html>
<?php
session_start();
    require "Modele/VehiculeDb.php";
    require "Modele/UtilisateurDb.php";
    //recherche l'id du véhicule
$idVehicule = $_REQUEST["id"];
$classVehicule = new VehiculeDb();
$infosVehicule = $classVehicule->getVehicule($idVehicule);
$id = $_SESSION["idUtil"];
$classUtilisateur = new UtilisateurDb();
$utilisateur = $classUtilisateur->getUtilisateurId($id);
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Confirmation location</title>
  <link rel="stylesheet" href="css/cssReservation.css">
</head>
<body>
        <div class="container">
        <h1>Confirmation de location du véhicule</h1>
            <div class="details">
                <span>Nom :</span>
                <span><?php echo $utilisateur['nom'];?></span>
            </div>
            <div class="details">
                <span>Prénom :</span>
                <span><?php echo $utilisateur['prenom'];?></span>
            </div>
            <div class="details">
            <span>Marque du véhicule :</span>
            <span><?php echo $infosVehicule['marque'];?></span>
            </div>
            <div class="details">
                <span>Modèle du véhicule :</span>
                <span><?php echo $infosVehicule['modele'];?></span>
            </div>
            <div class="details">
                <span>KmDébut :</span>
                <input type="number" step="any" id="kmDebut" name="name">
            </div>
            <div class="details">
            <span>Date début location :</span>
            <input type="date" id="dateDebut" name="name">
            </div>
            <div class="details">
            <span>Date fin location :</span>
            <input type="date" id="dateFin" name="name">
            </div>
            <div class="details">
            <span>Prix :</span>
            <span>0,15€/Km</span>
            </div>
            <?php
            if ($infosVehicule['disponible']==1){
            echo'<div class="confim-button">Confirmer la réservation
            </div>';
            }
            ?>
            <div class="return-button">
                <a href="listeVehicule.php"> Retour </a>
            </div>
        </div>
        </body>
        </html>