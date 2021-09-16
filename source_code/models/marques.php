<?php
require_once("connexionDB.php");

class modeleMarques extends connexionDB{

    public function getVetements() {
        $db = $this->dbConnect();
        $Vetements = "Vêtements";
        $vetements = $db -> prepare('SELECT * FROM marques WHERE secteur LIKE :Vetements
        ORDER BY nom_marque');
        $vetements->execute(array(':Vetements' => '%' . $Vetements . '%'));
        return $vetements;
    }
    
    public function getSDB() {
        $db = $this->dbConnect();
        $SDBvar = "SDB";
        $SDB = $db -> prepare('SELECT * FROM marques WHERE secteur LIKE :SDB
        ORDER BY nom_marque');
        $SDB->execute(array(':SDB' => '%' . $SDBvar . '%'));
        return $SDB;
    }
    
    public function getMaison() {
        $db = $this->dbConnect();
        $Maisonvar = "Maison";
        $Maison = $db -> prepare('SELECT * FROM marques WHERE secteur LIKE :Maison
        ORDER BY nom_marque');
        $Maison->execute(array(':Maison' => '%' . $Maisonvar . '%'));
        return $Maison;
    }
    
    public function getEnfants() {
        $db = $this->dbConnect();
        $Enfantsvar = "Enfants";
        $Enfants = $db -> prepare('SELECT * FROM marques WHERE secteur LIKE :Enfants
        ORDER BY nom_marque');
        $Enfants->execute(array(':Enfants' => '%' . $Enfantsvar . '%'));
        return $Enfants;
    }
    
    public function getAnimaux() {
        $db = $this->dbConnect();
        $Animauxvar = "Animaux";
        $Animaux = $db -> prepare('SELECT * FROM marques WHERE secteur LIKE :Animaux
        ORDER BY nom_marque');
        $Animaux->execute(array(':Animaux' => '%' . $Animauxvar . '%'));
        return $Animaux;
    }
    
    //OK
    public function toutesMarques() {
        $db = $this->dbConnect();
        $MIF = '1';
        $allmarques = $db -> prepare('SELECT * FROM marques 
        WHERE MIF = ?
        OR MIF = 0
        ORDER BY nom_marque');
        $allmarques->execute(array($MIF));
        return $allmarques;  
    }
  
  	public function toutesMarquesbis() {
        $db = $this->dbConnect();
        $MIF = '1';
        $allmarquesbis = $db -> prepare('SELECT * FROM marques 
        WHERE MIF = ?
        OR MIF = 0
        ORDER BY nom_marque');
        $allmarquesbis->execute(array($MIF));
        return $allmarquesbis;  
    }
    
    //OK
    public function MIF() {
        $db = $this->dbConnect();
        $MIF = '1';
        $allMIF = $db -> prepare('SELECT * FROM marques WHERE MIF = ?
        ORDER BY nom_marque');
        $allMIF->execute(array($MIF));
        return $allMIF;  
    }
    
    //OK
    public function zerodechet() {
        $db = $this->dbConnect();
        $zdechet = '1';
        $all0dechets = $db -> prepare('SELECT * FROM marques WHERE 0dechet = ?
        ORDER BY nom_marque');
        $all0dechets->execute(array($zdechet));
        return $all0dechets;  
    }
    
    
    //ajout d'une marque
    public function ajoutMarque($marqueM, $secteur, $site_internet, $logo, $MIF, $petite_desc, $zdechet) {
        $db = $this->dbConnect();
        $ajouterMarque = $db->prepare("INSERT INTO marques(nom_marque, secteur, site_internet, logo, MIF, petite_desc, 0dechet) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $newMarque = $ajouterMarque->execute(array($marqueM, $secteur, $site_internet, $logo, $MIF, $petite_desc, $zdechet));
        return $newMarque;
    }
  
  	//modif d'une marque
    public function modifMarque($secteur, $site_internet, $logo, $MIF, $petite_desc, $zdechet, $marqueM) {
        $db = $this->dbConnect();
        $modifierMarque = $db -> prepare('UPDATE marques
        SET secteur = ?, 
        site_internet = ?,
        logo = ?,
        MIF = ?, 
        petite_desc = ?,
        0dechet = ?
        WHERE nom_marque = ?');
        $modifierMarque->execute(array($secteur, $site_internet, $logo, $MIF, $petite_desc, $zdechet, $marqueM));
        return $modifierMarque;
    }
    
    //suppression d'une marque
    public function SuppressionMarque($marqueM) {
        $db = $this->dbConnect();
        $marqueSup = $db->prepare("DELETE FROM marques WHERE nom_marque = ?");
        $marqueSup->execute(array($marqueM));
        return $marqueSup; ;
    }
    
    //suppression d'une marque des fav quand elle a été supp du site
    public function SuppressionMarqueSupFav($marqueM) {
        $db = $this->dbConnect();
        $marqueSupSupFav = $db->prepare("DELETE FROM marques_fav WHERE marque_fav = ?");
        $marqueSupSupFav->execute(array($marqueM));
        return $marqueSupSupFav; ;
    }
}
