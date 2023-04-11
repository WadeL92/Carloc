<?php
require_once 'Modele.php';
class UtilisateurDb extends Modele {

    public function getUtilisateur ($identifiant, $mdp) {
		$sql = "SELECT id, nom, prenom FROM utilisateur WHERE identifiant = ? AND motDePasse = ?"; 
		
		$resultat = $this->executerRequete($sql, array($identifiant, $this->cryptage($mdp)));
		if ($resultat->rowCount() > 0) {
			return $resultat->fetch();
		} else {
			return 0;
		}
    }

	public function getUtilisateurId ($id) {
		$sql = "SELECT nom, prenom FROM utilisateur WHERE id = ?";
		$resultat = $this->executerRequete($sql, array ($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch();
		else
			return 0;
	}

    public function modifUtilisateurId ($id, $identifiant, $mdp, $nom, $prenom) {
		$sql = "UPDATE utilisateur SET identifiant = ?, motDePasse = ?, nom = ?, prenom = ? WHERE id = ?"; 
		$this->executerRequete($sql, array ($identifiant, $this->cryptage($mdp), $nom, $prenom, $id));
	}

	public function ajoutUtilisateur($identifiant, $mdp, $nom, $prenom) {
		$sql = 'INSERT INTO utilisateur(identifiant, motDePasse, nom, prenom) VALUES (?, ?, ?, ?)';
		$this->executerRequete($sql, array($identifiant, $this->cryptage($mdp), $nom, $prenom));
	}

	private function cryptage($info) {
		return hash('sha512',$info);
	}
}
