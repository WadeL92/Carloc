<?php
require_once 'Modele.php';
class VehiculeDb extends Modele {

    public function getVehicules() {
        $sql = "SELECT * FROM vehicules";
		$resultats = $this->executerRequete($sql);
		return $resultats;
    }

    public function getVehicule ($id) {
		$sql = "SELECT * FROM vehicules WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch();
		else
			return 0;
    }

    public function modifVehiculeId () {
		$sql = "UPDATE vehicules SET modele=?, marque=?, km=?, couleur=?, etat=?, prixKm=?, disponible=?, image=?, moteur=?, carburant=?, transmission=?, chevaux=?, couple=?, vitesse=?, dimLong=?, dimLarg=?, dimH=?, poids=? WHERE id = ?"; 
		$this->executerRequete($sql, array ());
	}

	public function ajoutVehicule() {
		$sql = 'INSERT INTO vehicules(modele marque, km, couleur, etat, prixKm, disponible, image, moteur, carburant, transmission, chevaux, couple, vitesse, dimLong, dimLarg, dimH, poids) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array());
	}
}