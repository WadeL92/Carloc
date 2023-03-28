<?php
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
    <section id="details"
        <h1 class="details_title">DETAILS DU VEHICULE</h1>
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
                    <td>".$infosVehicule['chevaux']."</td>
                </tr>
                <tr>
                    <th>Couple</th>
                    <td>".$infosVehicule['couple']."</td>
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
        
    <div class='bouttons'>
    "<?php if($dispo==1){
        echo "<button class='validate-button'>Réserver ce véhicule</button>";
    }
    else{
        echo "<button class='annul-button'>Annuler la réservation</button>";
    }
    ?>
    <button class='return-button'>Retour</button>
    <button class='validate-button'>Réserver ce véhicule</button>
    <button class='annul-button'>Annuler la réservation</button>
    </div>
    </main>"
    ?>
</body>