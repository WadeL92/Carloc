<?php
require_once 'Modele.php';
class VehiculeDb extends Modele {

    public function getVehicules() {
        $sql = "SELECT id, modele, marque, km, etat, prixKm, disponible, image FROM vehicules";
		$resultats = $this->executerRequete($sql);
		return $resultats;
    }

    public function getVehicule ($id) {
		$sql = "SELECT modele, marque, km, etat, prixKm, disponible, image FROM vehicules WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch();
		else
			return 0;
    }

    public function modifVehiculeId ($id, $nom, $prenom, $mail, $telephone, $idCompte) {
		$sql = "UPDATE vehicules SET modele=?, marque=?, km=?, etat=?, prixKm=?, disponible=?, image=? WHERE id = ?"; 
		$this->executerRequete($sql, array ($nom, $prenom, $mail, $telephone, $idCompte, $id));
	}

	public function ajoutVehicule($nom, $prenom, $mail, $telephone, $idCompte) {
		$sql = 'INSERT INTO vehicules(modele, marque, km, etat, prixKm, disponible, image) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array($nom, $prenom, $mail, $telephone, $idCompte));
	}
}