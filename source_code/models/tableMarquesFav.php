<?php
require_once("connexionDB.php");

class modeleMarquesFav extends connexionDB{
        
    public function getMarquesVetementFav ($email) {
        $db = $this->dbConnect();
        $vetementfav = $db->prepare ("SELECT *
        FROM marques 
        INNER JOIN marques_fav on marques.nom_marque = marques_fav.marque_fav
        WHERE secteur LIKE '%Vêtements%'
        AND email = ?
        ORDER by nom_marque");
        $vetementfav->execute(array($email));
        return $vetementfav;
    }
    
    public function getMarquesSDBFav ($email) {
        $db = $this->dbConnect();
        $SDBfav = $db->prepare ("SELECT *
        FROM marques 
        INNER JOIN marques_fav on marques.nom_marque = marques_fav.marque_fav
        WHERE secteur LIKE '%SDB%'
        AND email = ?
        ORDER by nom_marque");
        $SDBfav->execute(array($email));
        return $SDBfav;
    }
    
    public function getMarquesMaisonFav ($email) {
        $db = $this->dbConnect();
        $maisonfav = $db->prepare ("SELECT *
        FROM marques 
        INNER JOIN marques_fav on marques.nom_marque = marques_fav.marque_fav
        WHERE secteur LIKE '%Maison%'
        AND email = ?
        ORDER by nom_marque");
        $maisonfav->execute(array($email));
        return $maisonfav;
    }
    
    public function getMarquesAnimauxFav ($email) {
        $db = $this->dbConnect();
        $animauxfav = $db->prepare ("SELECT *
        FROM marques 
        INNER JOIN marques_fav on marques.nom_marque = marques_fav.marque_fav
        WHERE secteur LIKE '%Animaux%'
        AND email = ?
        ORDER by nom_marque");
        $animauxfav->execute(array($email));
        return $animauxfav;
    }
    
    public function getMarquesEnfantsFav ($email) {
        $db = $this->dbConnect();
        $enfantsfav = $db->prepare ("SELECT *
        FROM marques 
        INNER JOIN marques_fav on marques.nom_marque = marques_fav.marque_fav
        WHERE secteur LIKE '%Enfants%'
        AND email = ?
        ORDER by nom_marque");
        $enfantsfav->execute(array($email));
        return $enfantsfav;
    }

        
    public function ajoutMarqueFav($email, $marque_fav) {
        $db = $this->dbConnect();
        $newfav = $db->prepare("INSERT INTO marques_fav(email, marque_fav) VALUES(?, ?)");
        $newfav->execute(array($email, $marque_fav));
        return $newfav;
    }
    
    public function test($email, $marque_fav) {
        $db = $this->dbConnect();
        $isMarqueFav = $db->prepare("SELECT EXISTS( SELECT * FROM marques_fav WHERE email = ? AND marque_fav = ? ) AS article_exists");
        $isMarqueFav->execute(array($email, $marque_fav));
        return $isMarqueFav;
    }//Retourne 1 si existe, 0 si existe pas
    
    public function SuppMarqueFav($email, $marque_fav) {
        $db = $this->dbConnect();
        $suppfav = $db->prepare("DELETE FROM marques_fav WHERE email = ? AND marque_fav = ? ");
        $suppfav->execute(array($email, $marque_fav));
        return $suppfav;
    }
    
    //suppression des marques fav d'un user si l'user est sup
    public function SuppressionUserSupFav($email) {
        $db = $this->dbConnect();
        $utilisateurSupSupFav= $db->prepare("DELETE FROM marques_fav WHERE email = ?");
        $utilisateurSupSupFav->execute(array($email));
        return $utilisateurSupSupFav; ;
    }
    
}