<!doctype html>
<?php
    require "Modele/VehiculeDb.php";
?>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Liste Vehicule de Location</title>
  <link rel="stylesheet" href="css/cssListe.css">
</head>
<body>
    <section id="cars">
        <h1 class="section_title">NOS VEHICULE DE LOCATION</h1>
        <div class="images">
            <ul>
			<?php
				//recherche la liste des vehicules dans la base
				$classVehicules = new VehiculeDb();
				$vehicules = $classVehicules->getVehicules();
				foreach ($vehicules as $vehicule) {
					echo "<li class='car'>";
						echo "<div>";
						echo "<img src='images/".$vehicule['image']."' alt=''>";
						echo "</div>";
						echo "<span>".$vehicule['marque']."</span>";
						echo "<span>".$vehicule['km']." Km</span>";
						echo "<span class='prix'>".$vehicule['prixKm']."</span>";
						if ($vehicule['disponible'] == 1) {
							echo "<span>Disponibilité</span>";
						} else {
							echo "<span>Non disponible</span>";
						}
						echo "<a href=vehicule.php?id=".$vehicule['id'].">Louer ce vehicule</a>";
					echo "</li>";
				}
			?>
            </ul>
        </div>
	</section>
</body>
</html>