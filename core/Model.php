<?php
class Model{
	
	
	public $pdo;
	
	public function __construct(){
		$this->pdo = getPDO();
	}
	
	public function getPdo(){
		return $this->pdo;
	}
	
	
	//
	public function getFormations(){

		$sql = 'SELECT *  FROM formation inner join categorie using(categorie_id) inner join formateur using(formateur_id) where formation_statut="VALIDE"';

		$stm = $this->pdo->prepare($sql);

		$stm->execute();

		$data = $stm->fetchAll(PDO::FETCH_OBJ);
		
		return $data;
		
	}
	
	//
	public function getFormation($formation_id){

		$sql = 'SELECT *  FROM formation inner join categorie using(categorie_id) inner join formateur using(formateur_id) where formation_statut="VALIDE" and formation_id = ? ';

		$stm = $this->pdo->prepare($sql);

		$stm->execute(array($formation_id));

		$data = $stm->fetch(PDO::FETCH_OBJ);
		
		return $data;
		
	}


	//
	public function getFormationsByCategorie($categorie_id){

		$sql = 'SELECT *  FROM formation inner join categorie using(categorie_id) inner join formateur using(formateur_id) where formation_statut="VALIDE" and categorie_id = ?';

		$stm = $this->pdo->prepare($sql);

		$stm->execute(array($categorie_id));

		$data = $stm->fetchAll(PDO::FETCH_OBJ);
		
		return $data;
		
	}

	public function getCategories() {
		$sql = 'SELECT * FROM categorie
				WHERE categorie_statut = "VALIDE"';
	
		$stm = $this->pdo->prepare($sql);
	
		$stm->execute();
	
		$data = $stm->fetchAll(PDO::FETCH_OBJ);
	
		return $data;
	}
	

	//les insertions dans la base de données
	// Insertion d'un nouvel étudiant
    public function saveEtudiant($nom, $prenom, $telephone, $email) {
        $sql = 'INSERT INTO etudiant (etudiant_nom, etudiant_prenom, etudiant_telephone, etudiant_email)
                VALUES (?, ?, ?, ?)';

        $stm = $this->pdo->prepare($sql);
        $stm->execute([$nom, $prenom, $telephone, $email]);

        // Retourner l'ID de l'étudiant nouvellement inséré
        return $this->pdo->lastInsertId();
    }

    // Insertion d'une nouvelle inscription
    public function saveInscription($etudiant_id, $formation_id) {
        $sql = 'INSERT INTO inscription (etudiant_id, formation_id, inscription_date_inscription)
                VALUES (?, ?, ?)';

        $stm = $this->pdo->prepare($sql);
        $stm->execute([$etudiant_id, $formation_id, gmdate('Y-m-d H:i:s')]);

        // Retourner l'ID de l'inscription nouvellement insérée
        return $this->pdo->lastInsertId();
    }

	
}



?>