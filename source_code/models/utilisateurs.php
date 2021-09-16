<?php
require_once("connexionDB.php");

class modeleUtilisateurs extends connexionDB{
    
    //pour creation d'un nouveau compte
    public function nvx_compte ($email_nvx_compte, $mdp_nvx_compte) {
        $db = $this->dbConnect();
        $creercompte = $db -> prepare("INSERT INTO utilisateurs (email, mdp, user_ok) VALUES (?, ?, 1)");
        $newCompte = $creercompte->execute(array($email_nvx_compte, $mdp_nvx_compte));
        return $newCompte;
    }
        
     //recup des infos users pour connexion
    public function getUser ($email_co) {
        $db = $this->dbConnect();
        $infosconnex = $db->prepare ("SELECT * FROM utilisateurs WHERE email = ? ");
        $infosconnex->execute(array($email_co));
        return $infosconnex;
    }
    
    //recup Toutes les infos users pour connexion
    public function getAllUser () {
        $db = $this->dbConnect();
        $user_ok = '1';
        $Allinfosconnex = $db->prepare ("SELECT * FROM utilisateurs
        WHERE user_ok = ? ");
        $Allinfosconnex->execute(array($user_ok));
        return $Allinfosconnex;
    }
    
    
    
    //suppression d'un user
    public function SuppressionUser($email) {
        $db = $this->dbConnect();
        $utilisateurSup= $db->prepare("DELETE FROM utilisateurs WHERE email = ?");
        $utilisateurSup->execute(array($email));
        return $utilisateurSup; ;
    }
    
    //Pour changer de mdp
    public function changeMdp ($nvwmdp, $email) {
        $db = $this->dbConnect();
        $requ = $db -> prepare ('UPDATE utilisateurs SET mdp = :nvxmdp WHERE email = :email ');
        $nouveaumdp = $requ->execute(array(
            'nvxmdp' => $nvwmdp, 
            'email' => $email
        ));
        return $nouveaumdp;
    }
    
    //Qd mdp oublié, changement du mdp dans la base avec le mdp aléatoire
    public function pswoublie ($mdp, $email_co) {
        $db = $this->dbConnect();
        $requ = $db -> prepare ('UPDATE utilisateurs SET mdp = :mdp WHERE email = :email ');
        $nvx_mdp_oublie = $requ->execute(array(
            'mdp' => $mdp, 
            'email' => $email_co
        ));
        return $nvx_mdp_oublie;
    }
    
     //check si email présent
    public function checkemailco ($email_co) {
        $db = $this->dbConnect();
        $checkemail = $db->prepare ("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE email = ? ");
        $checkemail->execute(array($email_co));
        return $checkemail;        
    }
    
}