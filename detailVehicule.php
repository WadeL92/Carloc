<?php
session_start();
echo "Test".$_SESSION["idUtil"];
require "Modele/VehiculeDb.php";
//recherche l'id du véhicule
$idVehicule = $_REQUEST["id"];
$classVehicule = new VehiculeDb();
$infosVehicule = $classVehicule->getVehicule($idVehicule);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Detail Vehicule</title>
  <link rel="stylesheet" href="css/cssDetail.css">
</head>
<body>
    <section id="details">
        <h1 class="details_title"> DETAILS DU VEHICULE</h1>
    </section>
    
    <?php
    echo "<img src='images/".$infosVehicule['image']."'>";
    echo "<main>
        <section id='car'>
            <h2>Fiche Technique</h2>
            <table>
                <tr>
                    <th>Constructeur</th>
                    <td>".$infosVehicule['marque']."</td>
                </tr>
                <tr>
                    <th>Modèle</th>
                    <td>".$infosVehicule['modele']."</td>
                </tr>
                <tr>
                    <th>Année</th>
                    <td>".$infosVehicule['annee']."</td>
                </tr>
                <tr>
                    <th>Couleur</th>
                    <td>".$infosVehicule['couleur']."</td>
                </tr>
                <tr>
                    <th>Type de Transmission</th>
                    <td>".$infosVehicule['transmission']."</td>
                </tr>
                <tr>
                    <th>Carburant</th>
                    <td>".$infosVehicule['carburant']."</td>
                </tr>
            </table>
        </section>
        <section id='specs'>
            <h2>Performances</h2>
            <table>
                <tr>
                    <th>Moteur</th>
                    <td>".$infosVehicule['moteur']."</td>
                </tr>
                <tr>
                    <th>Chevaux</th>
                    <td>".$infosVehicule['chevaux']." Ch</td>
                </tr>
                <tr>
                    <th>Couple</th>
                    <td>".$infosVehicule['couple']." Nm</td>
                </tr>
                <tr>
                    <th>Vitesse Max</th>
                    <td>".$infosVehicule['vitesse']." Km/h</td>
                </tr>
                <tr>
                    <th>Dimensions (l x L x H)</th>
                    <td>".$infosVehicule['dimLarg']." cm x ".$infosVehicule['dimLong']." cm x ".$infosVehicule['dimH']." cm</td>
                </tr>
                <tr>
                    <th>Poids</th>
                    <td>".$infosVehicule['poids']." Kg</td>
                </tr>
            </table>
        </section>
        
    <div class='bouttons'>" ;
    if ($infosVehicule['disponible']==1){
        echo "<div class='validate-button'>
                    <a href=reservationVehicule.php?id=".$idVehicule.">Réserver ce véhicule</a>
              </div>";
    }
    else{
        echo "<div class='annul-button'>
                <a href=annuler.php?id=".$idVehicule.">Annuler la réservation</a>
            </div>";
    }
    ?>
        <div class='return-button'>
            <a href=listeVehicule.php>Retour</a>
        </div>
    </div>
    </main>
</body>