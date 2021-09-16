<?php
require_once("connexionDB.php");

class modeleAvis extends connexionDB{

    //poster avis
    public function posterAvis($marqueM, $nomprenom_avis, $msg_avis, $note_avis) {
        $db = $this->dbConnect();
        $posteravis = $db->prepare("INSERT INTO avis(marque_assoc, nomprenom_avis, msg_avis, note_avis, status, date_poste) VALUES(?, ?, ?, ?, 'OK', NOW())");
        $newLines = $posteravis->execute(array($marqueM, $nomprenom_avis, $msg_avis, $note_avis));
        return $newLines;
    }

    //moyenne des notes
    public function getMoyNotes($marqueM) {
        $db = $this->dbConnect();
        $AVGnotes = $db -> prepare('SELECT marque_assoc, AVG(note_avis) AS note_moyenne
        FROM avis
        WHERE marque_assoc = ?
        AND status = "OK"
        GROUP BY marque_assoc ');
        $AVGnotes->execute(array($marqueM));
        return $AVGnotes;
    }
        
    //obtenir avis vetements
     public function getAvisVetements() {
        $db = $this->dbConnect();
        $Vetements = "Vêtements";
        $avisparmarqueVetements = $db -> prepare('SELECT *
        FROM marques 
        LEFT JOIN avis on marques.nom_marque = avis.marque_assoc
        WHERE secteur LIKE :Vetements
        ORDER by nom_marque');
        $avisparmarqueVetements->execute(array(':Vetements' => '%' . $Vetements . '%'));
        return $avisparmarqueVetements;
    }
    
    //obtenir avis SDB
    public function getAvisSDB() {
        $db = $this->dbConnect();
        $SDB = "SDB";
        $avisparmarqueSDB = $db -> prepare('SELECT *
        FROM marques 
        LEFT JOIN avis on marques.nom_marque = avis.marque_assoc
        WHERE secteur LIKE :SDB
        ORDER by nom_marque');
        $avisparmarqueSDB->execute(array(':SDB' => '%' . $SDB . '%'));
        return $avisparmarqueSDB;
    }
    
    //obtenir avis maison
    public function getAvisMaison() {
        $db = $this->dbConnect();
        $Maison = "Maison";
        $avisparmarqueMaison = $db -> prepare('SELECT *
        FROM marques 
        LEFT JOIN avis on marques.nom_marque = avis.marque_assoc
        WHERE secteur LIKE :Maison
        ORDER by nom_marque');
        $avisparmarqueMaison->execute(array(':Maison' => '%' . $Maison . '%'));
        return $avisparmarqueMaison;
    }
    
    //obtenir avis enfants
    public function getAvisEnfants() {
        $db = $this->dbConnect();
        $Enfants = "Enfants";
        $avisparmarqueEnfants = $db -> prepare('SELECT *
        FROM marques 
        LEFT JOIN avis on marques.nom_marque = avis.marque_assoc
        WHERE secteur LIKE :Enfants
        ORDER by nom_marque');
        $avisparmarqueEnfants->execute(array(':Enfants' => '%' . $Enfants . '%'));
        return $avisparmarqueEnfants;
    }
    
    //obtenir avis animaux
    public function getAvisAnimaux() {
        $db = $this->dbConnect();
        $Animaux = "Animaux";
        $avisparmarqueAnimaux = $db -> prepare('SELECT *
        FROM marques 
        LEFT JOIN avis on marques.nom_marque = avis.marque_assoc
        WHERE secteur LIKE :Animaux
        ORDER by nom_marque');
        $avisparmarqueAnimaux->execute(array(':Animaux' => '%' . $Animaux . '%'));
        return $avisparmarqueAnimaux;
    }
    
    //obtenir contenu d'1 avis 
    public function getUnAvis($marqueM) {
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limite = 10;
        $debut = ($page - 1) * $limite;
        /* Ne pas oublier d'adapter notre requête */
        $db = $this->dbConnect();
        $avispour1marque = $db -> prepare('SELECT id, marque_assoc, msg_avis, nomprenom_avis, note_avis, DATE_FORMAT (date_poste, \'%d/%m/%Y à %Hh%imin\') AS date_publi_avis
        FROM avis 
        WHERE marque_assoc = :marque_assoc
        AND status = "OK"
        ORDER by date_publi_avis DESC
        LIMIT :limite 
        OFFSET :debut');
        $avispour1marque->bindValue(':marque_assoc', $marqueM, PDO::PARAM_STR);
        $avispour1marque->bindValue('debut', $debut, PDO::PARAM_INT);
        $avispour1marque->bindValue('limite', $limite, PDO::PARAM_INT);
        $avispour1marque->execute();
        return $avispour1marque;
    }
    
    //Compte le nb d'avis pour pagination
    public function count_nb_chap ($marqueM) { 
        $db = $this->dbConnect();
        $countnbchap = $db->prepare("SELECT COUNT(*) as Compteur FROM avis
        WHERE marque_assoc = :marque_assoc
        AND status = 'OK' ");
        $countnbchap->bindValue(':marque_assoc', $marqueM, PDO::PARAM_STR);
        $countnbchap->execute();
        return $countnbchap;
    }
    
    //affiche le nom de la marque en haut du cadre avis
    public function get_titre_avis($marqueM) {
        $db = $this->dbConnect();
        $marque_titre_avis = $db -> prepare('SELECT *
        FROM avis 
        WHERE marque_assoc = ?
        ORDER by marque_assoc');
        $marque_titre_avis->execute(array($marqueM));
        $marque_titre_avis = $marque_titre_avis->fetch();
        return $marque_titre_avis;
    }
    
    //nombre de notes
    public function getnbAvis($marqueM) {
        $db = $this->dbConnect();
        $nombreAvis1marque = $db -> prepare('SELECT COUNT(*) AS nb_avis 
        FROM avis 
        WHERE marque_assoc= ?
        AND status = "OK"');
        $nombreAvis1marque->execute(array($marqueM));
        return $nombreAvis1marque;
    }
    
    //supprimer un avis (quand signalé ou sup par l'admin)
    public function avisNOK($marqueM, $id) {
        $db = $this->dbConnect();
        $supavis = $db -> prepare('UPDATE avis
        SET status = "NOK"
        WHERE marque_assoc= ?
        AND id = ?');
        $supavis->execute(array($marqueM, $id));
        return $supavis;
    }
    
    //revalider un avis
    public function avisOK($marqueM, $id) {
        $db = $this->dbConnect();
        $reOKavis = $db -> prepare('UPDATE avis
        SET status = "OK"
        WHERE marque_assoc= ?
        AND id = ?');
        $reOKavis->execute(array($marqueM, $id));
        return $reOKavis;
    }
    
    //avoir tous les avis OK
    public function allavisOK () {
        $db = $this->dbConnect();
        $OK = 'OK';
        $avisOK = $db -> prepare('SELECT id, marque_assoc, msg_avis, nomprenom_avis, note_avis, DATE_FORMAT (date_poste, \'%d/%m/%Y à %Hh%imin\') AS date_publi_avis
        FROM avis
        WHERE status = ? 
        ORDER by date_publi_avis DESC');
        $avisOK->execute(array($OK));
        return $avisOK;
       
    }
    
    //avoir tous les avis NOK
    public function allavisNOK () {
        $db = $this->dbConnect();
        $NOK = 'NOK';
        $avisNOK = $db -> prepare('SELECT id, marque_assoc, msg_avis, nomprenom_avis, note_avis, DATE_FORMAT (date_poste, \'%d/%m/%Y à %Hh%imin\') AS date_publi_avis
        FROM avis
        WHERE status = ? 
        ORDER by date_publi_avis DESC');
        $avisNOK->execute(array($NOK));
        return $avisNOK;
    }
}
