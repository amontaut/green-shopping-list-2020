<?php

// Chargement des modèles
require_once('models/marques.php');
require_once('models/avis.php');
require_once('models/utilisateurs.php');
require_once('models/tableMarquesFav.php');

class Controller {

    function afficherAcceuil () {
        require('vues/accueilVue.php');
    }
    
    //affiche la page vêtements
    function pageVetements () {
        $modelemarques = new modeleMarques();
        $vetements = $modelemarques -> getVetements();
        $modeleavis = new modeleAvis();
        $avisparmarqueVetements = $modeleavis -> getAvisVetements();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeVetementsVue.php'); 
    }
    
    //affiche la page Avis vêtements
    function pageAvisVetements ($marqueM) {
        $modelemarques = new modeleMarques();
        $modeleavis = new modeleAvis();
        $AVGnotes = $modeleavis -> getMoyNotes($marqueM);
        $nombreAvis1marque = $modeleavis -> getnbAvis($marqueM);
        $marque_titre_avis = $modeleavis -> get_titre_avis($marqueM);
        $vetements = $modelemarques -> getVetements();
        $avisparmarqueVetements = $modeleavis -> getAvisVetements();
        $avispour1marque = $modeleavis -> getUnAvis($marqueM);
        $countnbchap = $modeleavis -> count_nb_chap($marqueM);
        require ('vues/vuesMarquesEtAvis/avisVetementsVue.php'); 
    }
    
    //affiche la page SDB
    function pageSDB () {
        $modelemarques = new modeleMarques();
        $SDB = $modelemarques -> getSDB();
        $modeleavis = new modeleAvis();
        $avisparmarqueSDB = $modeleavis -> getAvisSDB();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeSDBVue.php'); 
    }
    
    //affiche la page Avis SDB
    function pageAvisSDB ($marqueM) {
        $modelemarques = new modeleMarques();
        $SDB = $modelemarques -> getSDB();
        $modeleavis = new modeleAvis();
        $avisparmarqueSDB = $modeleavis -> getAvisSDB();
        $avispour1marque = $modeleavis -> getUnAvis($marqueM);
        $AVGnotes = $modeleavis -> getMoyNotes($marqueM);
        $nombreAvis1marque = $modeleavis -> getnbAvis($marqueM);
        $countnbchap = $modeleavis -> count_nb_chap($marqueM);
        $marque_titre_avis = $modeleavis -> get_titre_avis($marqueM);
        require ('vues/vuesMarquesEtAvis/avisSDBVue.php'); 
    }
    
    //affiche la page Maison
    function pageMaison () {
        $modelemarques = new modeleMarques();
        $Maison = $modelemarques -> getMaison();
        $modeleavis = new modeleAvis();
        $avisparmarqueMaison = $modeleavis -> getAvisMaison();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeMaisonVue.php'); 
    }
    
    //affiche la page Avis Maison
    function pageAvisMaison ($marqueM) {
        $modelemarques = new modeleMarques();
        $Maison = $modelemarques -> getMaison();
        $modeleavis = new modeleAvis();
        $avisparmarqueMaison = $modeleavis -> getAvisMaison();
        $avispour1marque = $modeleavis -> getUnAvis($marqueM);
        $AVGnotes = $modeleavis -> getMoyNotes($marqueM);
        $nombreAvis1marque = $modeleavis -> getnbAvis($marqueM);
        $countnbchap = $modeleavis -> count_nb_chap($marqueM);
        $marque_titre_avis = $modeleavis -> get_titre_avis($marqueM);
        require ('vues/vuesMarquesEtAvis/avisMaisonVue.php'); 
    }
    
    //affiche la page Enfants
    function pageEnfants () {
        $modelemarques = new modeleMarques();
        $Enfants = $modelemarques -> getEnfants();
        $modeleavis = new modeleAvis();
        $avisparmarqueEnfants = $modeleavis -> getAvisEnfants();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeEnfantsVue.php'); 
    }
    
    //affiche la page Avis Enfants
    function pageAvisEnfants ($marqueM) {
        $modelemarques = new modeleMarques();
        $Enfants = $modelemarques -> getEnfants();
        $modeleavis = new modeleAvis();
        $avisparmarqueEnfants = $modeleavis -> getAvisEnfants();
        $avispour1marque = $modeleavis -> getUnAvis($marqueM);
        $AVGnotes = $modeleavis -> getMoyNotes($marqueM);
        $nombreAvis1marque = $modeleavis -> getnbAvis($marqueM);
        $countnbchap = $modeleavis -> count_nb_chap($marqueM);
        $marque_titre_avis = $modeleavis -> get_titre_avis($marqueM);
        require ('vues/vuesMarquesEtAvis/avisEnfantsVue.php'); 
    }
    
    //affiche la page Animaux
    function pageAnimaux () {
        $modelemarques = new modeleMarques();
        $Animaux = $modelemarques -> getAnimaux();
        $modeleavis = new modeleAvis();
        $avisparmarqueAnimaux = $modeleavis -> getAvisAnimaux();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeAnimauxVue.php'); 
    }
    
    //affiche la page Avis Animaux
    function pageAvisAnimaux ($marqueM) {
        $modelemarques = new modeleMarques();
        $Animaux = $modelemarques -> getAnimaux();
        $modeleavis = new modeleAvis();
        $avisparmarqueAnimaux = $modeleavis -> getAvisAnimaux();
        $avispour1marque = $modeleavis -> getUnAvis($marqueM);
        $AVGnotes = $modeleavis -> getMoyNotes($marqueM);
        $nombreAvis1marque = $modeleavis -> getnbAvis($marqueM);
        $countnbchap = $modeleavis -> count_nb_chap($marqueM);
        $marque_titre_avis = $modeleavis -> get_titre_avis($marqueM);
        require ('vues/vuesMarquesEtAvis/avisAnimauxVue.php'); 
    }
    
    //affiche la page d'accueil quand connecté et pour demande de contact
    function pageAccueilCo () {
        require ('vues/accueilVue.php'); 
    }
    
    //affiche la page toutes les marques
    function pageTouteLesMarques () {
        $modelemarques = new modeleMarques();
        $allmarques = $modelemarques -> toutesMarques();
        require ('vues/toutesMarquesVue.php'); 
    }
    
    //affiche la page tous les Made In France
    function pageTouslesMIF () {
        $modelemarques = new modeleMarques();
        $allMIF = $modelemarques -> MIF();
        require ('vues/toutesMIFVue.php'); 
    }
    
    //affiche la page tous les 0 déchet
    function pageTousles0dechet () {
        $modelemarques = new modeleMarques();
        $all0dechets = $modelemarques -> zerodechet();
        require ('vues/toutes0dechetVue.php'); 
    }
    
     //affiche la page des mentions légales
    function pageMentionsLeg () {
        require ('vues/MentionsLegVue.php'); 
    }
    
    //affiche la accès refusé si personne pas co
    function pageAccesRefuse() {
        require ('vues/accesRefuseVue.php'); 
    }
    
    
    //affiche la page marques en fav
    function pageMarquesFav($email) {
        $modelemarquesfav = new modeleMarquesFav();
        $email = $_SESSION['email_utilisateur'];
        $vetementfav = $modelemarquesfav -> getMarquesVetementFav($email);
        $SDBfav = $modelemarquesfav -> getMarquesSDBFav($email);
        $maisonfav = $modelemarquesfav -> getMarquesMaisonFav($email);
        $enfantsfav = $modelemarquesfav -> getMarquesEnfantsFav($email);
        $animauxfav = $modelemarquesfav -> getMarquesAnimauxFav($email);
        require ('vues/marquesPref.php'); 
    }
    
    //publication d'un nouvel avis sur une marque de vêtements 
    function publiAvisVetement($marqueM, $nomprenom_avis, $msg_avis, $note_avis) {
        $modeleavis = new modeleAvis();
        $newLines = $modeleavis->posterAvis($marqueM, $nomprenom_avis, $msg_avis, $note_avis);
       if ($newLines === false) {
            throw new Exception('La requête n\'a pas fonctionné');
        } else {
             //Affichage la page vêtement
        $modelemarques = new modeleMarques();
        $vetements = $modelemarques -> getVetements();
        $modeleavis = new modeleAvis();
        $avisparmarqueVetements = $modeleavis -> getAvisVetements();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeVetementsVue.php');
       }   
    }
    
    //publication d'un nouvel avis sur une marque SDB 
    function publiAvisSDB($marqueM, $nomprenom_avis, $msg_avis, $note_avis) {
        $modeleavis = new modeleAvis();
        $newLines = $modeleavis->posterAvis($marqueM, $nomprenom_avis, $msg_avis, $note_avis);
       if ($newLines === false) {
            throw new Exception('La requête n\'a pas fonctionné');
        } else {
             //Affichage la page SDB
        $modelemarques = new modeleMarques();
        $SDB = $modelemarques -> getSDB();
        $modeleavis = new modeleAvis();
        $avisparmarqueSDB = $modeleavis -> getAvisSDB();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeSDBVue.php');
       }   
    }
    
    //publication d'un nouvel avis sur une marque Maison 
    function publiAvisMaison($marqueM, $nomprenom_avis, $msg_avis, $note_avis) {
        $modeleavis = new modeleAvis();
        $newLines = $modeleavis->posterAvis($marqueM, $nomprenom_avis, $msg_avis, $note_avis);
       if ($newLines === false) {
            throw new Exception('La requête n\'a pas fonctionné');
        } else {
             //Affichage la page maison
        $modelemarques = new modeleMarques();
        $Maison = $modelemarques -> getMaison();
        $modeleavis = new modeleAvis();
        $avisparmarqueMaison = $modeleavis -> getAvisMaison();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeMaisonVue.php'); 
       }   
    }
    
    //publication d'un nouvel avis sur une marque Enfants 
    function publiAvisEnfants($marqueM, $nomprenom_avis, $msg_avis, $note_avis) {
        $modeleavis = new modeleAvis();
        $newLines = $modeleavis->posterAvis($marqueM, $nomprenom_avis, $msg_avis, $note_avis);
       if ($newLines === false) {
            throw new Exception('La requête n\'a pas fonctionné');
        } else {
             //Affichage la page enfants
            $modelemarques = new modeleMarques();
        $Enfants = $modelemarques -> getEnfants();
        $modeleavis = new modeleAvis();
        $avisparmarqueEnfants = $modeleavis -> getAvisEnfants();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeEnfantsVue.php'); 
       }   
    }
    
    //publication d'un nouvel avis sur une marque Animaux 
    function publiAvisAnimaux($marqueM, $nomprenom_avis, $msg_avis, $note_avis) {
        $modeleavis = new modeleAvis();
        $newLines = $modeleavis->posterAvis($marqueM, $nomprenom_avis, $msg_avis, $note_avis);
       if ($newLines === false) {
            throw new Exception('La requête n\'a pas fonctionné');
        } else {
             //Affichage la page animaux
            $modelemarques = new modeleMarques();
        $Animaux = $modelemarques -> getAnimaux();
        $modeleavis = new modeleAvis();
        $avisparmarqueAnimaux = $modeleavis -> getAvisAnimaux();
        $_SESSION['$pageencours'] = $_SERVER['REQUEST_URI'];
        require ('vues/vuesMarquesEtAvis/listeAnimauxVue.php'); 
       }   
    }
    
    //ajout d'une nouvelle marque
    function nouvelleMarque($marqueM, $secteur, $site_internet, $logo, $MIF, $petite_desc, $zdechet) {
        $modelemarques = new modeleMarques();
        $newMarque = $modelemarques->ajoutMarque($marqueM, $secteur, $site_internet, $logo, $MIF, $petite_desc, $zdechet);
       if ($newMarque === false) {
            throw new Exception('La requête n\'a pas fonctionné');
        } else {
            $modelemarques = new modeleMarques();
            $allmarques = $modelemarques -> toutesMarques();
         	$allmarquesbis = $modelemarques -> toutesMarquesbis();
            $modeleutilisateurs = new modeleUtilisateurs();
            $Allinfosconnex = $modeleutilisateurs->getAllUser();
            $modeleavis = new modeleAvis();
            $avisOK = $modeleavis -> allavisOK();
            $avisNOK = $modeleavis -> allavisNOK();
            require ('vues/adminVue.php');
        ?>
<script>
    alert('La marque a bien été ajoutée au site.');

</script>
<?php
       }   
    }
    
  	//modif d'une marque
    function MarqueModifiee($secteur, $site_internet, $logo, $MIF, $petite_desc, $zdechet, $marqueM) {
        $modelemarques = new modeleMarques();
        $modifierMarque = $modelemarques->modifMarque($secteur, $site_internet, $logo, $MIF, $petite_desc, $zdechet, $marqueM);
       if ($modifierMarque === false) {
            throw new Exception('La requête n\'a pas fonctionné');
        } else {
            $modelemarques = new modeleMarques();
            $allmarques = $modelemarques -> toutesMarques();
         	$allmarquesbis = $modelemarques -> toutesMarquesbis();
            $modeleutilisateurs = new modeleUtilisateurs();
            $Allinfosconnex = $modeleutilisateurs->getAllUser();
            $modeleavis = new modeleAvis();
            $avisOK = $modeleavis -> allavisOK();
            $avisNOK = $modeleavis -> allavisNOK();
            require ('vues/adminVue.php');
        ?>
<script>
    alert('La marque a bien été modifée.');

</script>
<?php
       }   
    }
  
    //supp d'une marque et supp d'une marque de la table fav 
    function suppMarque ($marqueM) {
        $modelemarques = new modeleMarques();
        $marqueSup = $modelemarques->SuppressionMarque($marqueM);
        $modelemarques = new modeleMarques();
        $marqueSupSupFav = $modelemarques->SuppressionMarqueSupFav($marqueM);
        $modelemarques = new modeleMarques();
        $allmarques = $modelemarques -> toutesMarques();
      	$allmarquesbis = $modelemarques -> toutesMarquesbis();
        $modeleutilisateurs = new modeleUtilisateurs();
        $Allinfosconnex = $modeleutilisateurs->getAllUser();
        $modeleavis = new modeleAvis();
        $avisOK = $modeleavis -> allavisOK();
        $avisNOK = $modeleavis -> allavisNOK();
        require ('vues/adminVue.php');
        ?>
<script>
    alert('La marque a bien été supprimée du site.');

</script>
<?php
        
        
    }
    
    //supp d'un user et de ses fav
    function suppUtilisateur ($email) {
        $modeleutilisateurs = new modeleUtilisateurs();
        $utilisateurSup = $modeleutilisateurs->SuppressionUser($email);       
        $modelemarquesfav = new modeleMarquesFav();
        $utilisateurSupSupFav = $modelemarquesfav->SuppressionUserSupFav($email);
        $modelemarques = new modeleMarques();
        $allmarques = $modelemarques -> toutesMarques();
      $allmarquesbis = $modelemarques -> toutesMarquesbis();
        $modeleutilisateurs = new modeleUtilisateurs();
        $Allinfosconnex = $modeleutilisateurs->getAllUser();
        $modeleavis = new modeleAvis();
        $avisOK = $modeleavis -> allavisOK();
        $avisNOK = $modeleavis -> allavisNOK();
        require ('vues/adminVue.php');
        ?>
<script>
    alert("l'utilisateur a bien été supprimé.");

</script>
<?php
    }

    
    //Ajout d'un marque dans ses favoris 
    function AjoutDansFav($email, $marque_fav) {
        $modelemarquesfav = new modeleMarquesFav();
        $isMarqueFav = $modelemarquesfav->test($email, $marque_fav);
        $modeleavis = new modeleAvis();
        $modelemarques = new modeleMarques();
        $avisparmarqueVetements = $modeleavis -> getAvisVetements();

        if (strpos($_SESSION['$pageencours'], "pageVetements")){
            $avisparmarqueVetements = $modeleavis -> getAvisVetements();
            $vetements = $modelemarques -> getVetements();
            require ('vues/vuesMarquesEtAvis/listeVetementsVue.php');

        } else if (strpos($_SESSION['$pageencours'], "pageSDB")) {
            $avisparmarqueSDB = $modeleavis -> getAvisSDB();
            $SDB = $modelemarques -> getSDB();
            require ('vues/vuesMarquesEtAvis/listeSDBVue.php');

        } else if (strpos($_SESSION['$pageencours'], "pageMaison")) {
            $avisparmarqueMaison = $modeleavis -> getAvisMaison();
            $Maison = $modelemarques -> getMaison();
            require ('vues/vuesMarquesEtAvis/listeMaisonVue.php');

        } else if (strpos($_SESSION['$pageencours'], "pageEnfants")) {
            $avisparmarqueEnfants = $modeleavis -> getAvisEnfants();
            $Enfants = $modelemarques -> getEnfants();
            require ('vues/vuesMarquesEtAvis/listeEnfantsVue.php');

        }  else if (strpos($_SESSION['$pageencours'], "pageAnimaux")) {
            $avisparmarqueAnimaux = $modeleavis -> getAvisAnimaux();
            $Animaux = $modelemarques -> getAnimaux();
            require ('vues/vuesMarquesEtAvis/listeAnimauxVue.php');
        } else {
            require('vues/accueilVue.php');
        }
        
        if ($_SESSION['co_utilisateur'] == 'ONLINE'){
        while ($verif = $isMarqueFav->fetch()) {
            if ($verif['article_exists'] == 1){ ?>
<script>
    alert('Vous avez déjà ajouté cette marque à vos favoris');

</script>
<?php
            } else { 
                $newfav = $modelemarquesfav->ajoutMarqueFav($email, $marque_fav);
                $modeleavis = new modeleAvis();
                $modelemarques = new modeleMarques();
                $avisparmarqueVetements = $modeleavis -> getAvisVetements();
?>
<script>
    alert('Cette marque a bien été ajoutée à votre liste !');

</script>
<?php
            }
        }
        } else {
            ?>
<script>
    alert('Inscrivez-vous ou connectez vous pour pouvoir ajouter des marques à vos favoris.');

</script>
<?php
        }
    }
    
    //Suppression d'un marque de ses favoris 
    function SuppDansFav($email, $marque_fav) {
        $modelemarquesfav = new modeleMarquesFav();
        $suppfav = $modelemarquesfav-> SuppMarqueFav($email, $marque_fav);
       if ($suppfav === false) {
            throw new Exception('La requête n\'a pas fonctionné');
        } else {
            $modelemarquesfav = new modeleMarquesFav();        
            $vetementfav = $modelemarquesfav -> getMarquesVetementFav($email);
           $SDBfav = $modelemarquesfav -> getMarquesSDBFav($email);
           $maisonfav = $modelemarquesfav -> getMarquesMaisonFav($email);
           $enfantsfav = $modelemarquesfav -> getMarquesEnfantsFav($email);
           $animauxfav = $modelemarquesfav -> getMarquesAnimauxFav($email);
            require ('vues/marquesPref.php');
           ?>
<script>
    alert('La marque a bien été supprimée de votre liste.');

</script>
<?php
           
           
       }   
    }
    
    //Quand qqn se créé un nouveau compte 
    function CreationCompte($email_nvx_compte, $mdp_nvx_compte) {
        $modeleutilisateurs = new modeleUtilisateurs();
        $newCompte = $modeleutilisateurs->nvx_compte ($email_nvx_compte, $mdp_nvx_compte);
        
       if ($newCompte == false) {
           require('vues/accueilVue.php');
             ?>
<script>
    alert("Un compte avec cette adresse e-mail est déja enregistré. Vous pouvez vous connecter en l'utilisant. Si vous ne vous souvenez pas de votre mot de passe, cliquez sur 'mot de passe oublié' dans l'espace de connexion");

</script>
<?php
        } else {
           if ($_POST['nvx_compte_mdp'] == $_POST['confirm_nvx_compte_mdp']) {
         require('vues/accueilVue.php');
             $_SESSION['co_admin'] = 'NOTADMIN';
$_SESSION['co_utilisateur'] = 'OFFLINE';
$_SESSION['email_utilisateur'] = "";
?>
<script>
    alert('Votre compte à bien été créé. Bienvenue !');

</script>

<?php
           } else {
               require('vues/accueilVue.php');
             ?>
<script>
    alert('Les mots de passes sont différents');

</script>
<?php
           }
       }   
    }
    
    //Quand qnn veut changer son mdp
    function changerMDP ($nvwmdp, $email) {
        if ($_POST['confirmer_nvx_mdp'] == $_POST['nvx_mdp']) {
            $options = [
                'cost' => 9,
            ];
            $nvwmdp = password_hash((htmlspecialchars($_POST['confirmer_nvx_mdp'])),PASSWORD_BCRYPT, $options);
            $email = $_SESSION['email_utilisateur']; 
            $modeleutilisateurs = new modeleUtilisateurs();
            
            $nouveaumdp = $modeleutilisateurs->changeMdp ($nvwmdp, $email);
            if ($nouveaumdp == false) {
                throw new Exception('La requête n\'a pas fonctionné / le mail est en double');
            } else {
             require('vues/accueilVue.php');
             ?>
<script>
    alert('Votre mot de passe a bien été changé');

</script>
<?php
            }
        } else {
             require('vues/accueilVue.php');
             ?>
<script>
    alert('Les mots de passes sont différents');

</script>
<?php
        }
    }
    
    //Quand qnn s'identifie
    function SeCo ($email_co) {
        $modeleutilisateurs = new modeleUtilisateurs();
        $infosconnex = $modeleutilisateurs->getUser($email_co);
        $checkemail = $modeleutilisateurs->checkemailco($email_co);
        while ($mailpresent = $checkemail->fetch()) { 
            if ($mailpresent['nbr'] != 0){
                // echo 'on peut faire les trucs car email dans data base <br>';
                $secure_email = htmlspecialchars($_POST['email_co']);
                $secure_mdp = htmlspecialchars($_POST['mdp_co']);
                while ($recupUserInfos = $infosconnex->fetch()) { 
                    $hash = $recupUserInfos['mdp'];
                    $mailsbdd = $recupUserInfos['email'];      
                    if (password_verify($secure_mdp, $hash)) {
                        $_SESSION['co_utilisateur'] = 'ONLINE';
                        $_SESSION['email_utilisateur'] = $mailsbdd;
                        //Pour l'admin 
                        if ($secure_email == 'email@email.com'){
                            $_SESSION['co_admin'] = 'ADMIN';
                            $modelemarques = new modeleMarques();
                            $allmarques = $modelemarques -> toutesMarques();
                          	$allmarquesbis = $modelemarques -> toutesMarquesbis();
                            $modeleutilisateurs = new modeleUtilisateurs();
                            $Allinfosconnex = $modeleutilisateurs->getAllUser();
                            $modeleavis = new modeleAvis();
                            $avisOK = $modeleavis -> allavisOK();
                            $avisNOK = $modeleavis -> allavisNOK();
                        require ('vues/adminVue.php'); 
                            //pour le commun des mortels
                        } else {
                        require('vues/accueilVue.php');
                        }
                    } else {
                        require('vues/accueilVue.php');
             ?>
<script>
    alert("L'email et/ou le mot de passe est/sont incorrect(s)");

</script>
<?php
                    } 
                }
                $infosconnex->closeCursor();
            } else {
                 require('vues/accueilVue.php');
             ?>
<script>
    alert("Il n'existe pas de compte associé à cette adresse email. Créez vous un compte aujourd'hui !");

</script>
<?php
            }
        }
        $checkemail->closeCursor();    
    }
    
    
    //Quand qnn se deconnecte
    function SeDeco () {
        $_SESSION['co_admin'] = 'NOTADMIN';
        $_SESSION['co_utilisateur'] = 'OFFLINE';
        $_SESSION['email_utilisateur'] = "";
        require ('vues/accueilVue.php');
    }
        
    //affiche la page dechets paris
    function pageDechetsParis () {
        require ('vues/dechetsParisVue.php'); 
    }
    
    //affiche la page marchés à paris
    function pageMarchesParis () {
        require ('vues/marchesParisVue.php'); 
    }
    
    //affiche la page admin
    function pageAdmin() {
        $modelemarques = new modeleMarques();
        $allmarques = $modelemarques -> toutesMarques();
      	$allmarquesbis = $modelemarques -> toutesMarquesbis();
        $modeleutilisateurs = new modeleUtilisateurs();
        $Allinfosconnex = $modeleutilisateurs->getAllUser();
        $modeleavis = new modeleAvis();
        $avisOK = $modeleavis -> allavisOK();
        $avisNOK = $modeleavis -> allavisNOK();
        require ('vues/adminVue.php'); 
    }
    
    //pour passer un avis en NOK
    function deOKaNOK ($marqueM, $id) {
        $modeleavis = new modeleAvis();
        
        $modelemarques = new modeleMarques();
        $allmarques = $modelemarques -> toutesMarques();
      	$allmarquesbis = $modelemarques -> toutesMarquesbis();
        $modeleutilisateurs = new modeleUtilisateurs();
        $Allinfosconnex = $modeleutilisateurs->getAllUser();
        $supavis = $modeleavis -> avisNOK($marqueM, $id);
        $avisOK = $modeleavis -> allavisOK();
        $avisNOK = $modeleavis -> allavisNOK();
        require ('vues/adminVue.php'); 
    }
    
    //pour passer un avis en OK
    function deNOKaOK ($marqueM, $id) {
        $modeleavis = new modeleAvis();
        $modelemarques = new modeleMarques();
        $allmarques = $modelemarques -> toutesMarques();
      	$allmarquesbis = $modelemarques -> toutesMarquesbis();
        $modeleutilisateurs = new modeleUtilisateurs();
        $Allinfosconnex = $modeleutilisateurs->getAllUser();
        $reOKavis = $modeleavis -> avisOK($marqueM, $id);
        $avisOK = $modeleavis -> allavisOK();
        $avisNOK = $modeleavis -> allavisNOK();
        require ('vues/adminVue.php'); 
    }
    
    //Quand demande de contact sur la page d'accueil
    function envoyerContact () {
        if ( !empty($_POST['msg']) ) {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.ionos.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'email@email.com';                 // SMTP username
        $mail->Password = '***';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom('almontaut@orange.fr', 'Site l\'annuaire eco-responsable');
        $mail->addAddress('email@email.com', 'Formulaire contact');     // Add a recipient
          // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Demande de contact (L\'annuaire eco-responsable)';
        
        //Corps du mail
        if  ($_POST['email'] == '' && $_POST['nomprénom'] == ''){
            $mail->Body    = '<b>La personne n\'a pas renseigné son nom/prénom.</b>
           <br>
           <br>
           <b>La personne n\'a pas laissé d\'email.</b>
           <br>
           <br>
           <b>Message laissé par la personne : </b>' . htmlspecialchars($_POST['msg']); 
        } elseif ($_POST['nomprénom'] == ''){
           $mail->Body    = '<b>La personne n\'a pas laissé son nom/prénom.</b> 
           <br>
           <br>
           <b>Email laissé par la personne : </b>' .  htmlspecialchars($_POST['email']) . '
           <br>
           <br>
           <b>Message laissé par la personne : </b>' . htmlspecialchars($_POST['msg']);
            
        } elseif ($_POST['email'] == '') {
            $mail->Body    = '<b>Nom/prénom laissé par la personne : </b>' . htmlspecialchars($_POST['nomprénom']) . '
           <br>
           <br>
           <b>La personne n\'a pas laissé d\'email.</b>
           <br>
           <br>
           <b>Message laissé par la personne : </b>' . htmlspecialchars($_POST['msg']);
        } else {
            $mail->Body    = '<b>Nom/prénom laissé par la personne : </b>' . htmlspecialchars($_POST['nomprénom']) . '
           <br>
           <br>
           <b>Email laissé par la personne : </b>' .  htmlspecialchars($_POST['email']) . '
           <br>
           <br>
           <b>Message laissé par la personne : </b>' . htmlspecialchars($_POST['msg']);
        }
        
        //Corps alertnatif du mail, en html
        if  ($_POST['email'] == '' && $_POST['nomprénom'] == ''){
            $mail->AltBody    = '<b>La personne n\'a pas renseigné son nom/prénom.</b>
           <br>
           <br>
           <b>La personne n\'a pas laissé d\'email.</b>
           <br>
           <br>
           <b>Message laissé par la personne : </b>' . htmlspecialchars($_POST['msg']); 
        } elseif ($_POST['nomprénom'] == ''){
           $mail->AltBody    = '<b>La personne n\'a pas laissé son nom/prénom.</b> 
           <br>
           <br>
           <b>Email laissé par la personne : </b>' .  htmlspecialchars($_POST['email']) . '
           <br>
           <br>
           <b>Message laissé par la personne : </b>' . htmlspecialchars($_POST['msg']);
            
        } elseif ($_POST['email'] == '') {
            $mail->AltBody    = '<b>Nom/prénom laissé par la personne : </b>' . htmlspecialchars($_POST['nomprénom']) . '
           <br>
           <br>
           <b>La personne n\'a pas laissé d\'email.</b>
           <br>
           <br>
           <b>Message laissé par la personne : </b>' . htmlspecialchars($_POST['msg']);
        } else {
            $mail->AltBody    = '<b>Nom/prénom laissé par la personne : </b>' . htmlspecialchars($_POST['nomprénom']) . '
           <br>
           <br>
           <b>Email laissé par la personne : </b>' .  htmlspecialchars($_POST['email']) . '
           <br>
           <br>
           <b>Message laissé par la personne : </b>' . htmlspecialchars($_POST['msg']);
        }
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else { ?>
<script>
    alert('Votre message a bien été envoyé');

</script>
<?php 
        }
        
        require ('vues/accueilVue.php'); 
    } else { ?>
                        <script>
                            alert ('Veuillez remplir le champs "Votre message :"');
                        </script>
<?php
            require ('vues/accueilVue.php');
        }
    }

    //Pour mot de passe oublié
    function MDPoublie ($email_co) {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
      	$mail->Host = 'smtp.ionos.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'email@email.com';                 // SMTP username
        $mail->Password = '***';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom('almontaut@orange.fr', "Mot de passe oublie - Site l'annuaire eco-responsable");
        $mail->addAddress($_POST['confirm_email'], 'Mot de passe oublie');     // Add a recipient
          // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Mot de passe oublie (L'annuaire eco-responsable)";
        
        //Generation d'une chaine aléatoire
        $longueur = 10; 
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++) {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        
        //corps du mail
        $mail->Body    = "Bonjour. Vous avez oublié votre mot de passe pour le site de l'annuaire éco-responsable. Voici un mot de passe provisoire que vous pouvez utliser pour vous reconnecter : $chaineAleatoire.<br> Vous pourrez changer ce mot de passe une fois connecté. ";
        
        //corps alternatif
        $mail->AltBody = "Bonjour. Vous avez oublié votre mot de passe pour le site de l'annuaire éco-responsable. Voici un mot de passe provisoire que vous pouvez utliser pour vous reconnecter : $chaineAleatoire.<br> Vous pourrez changer ce mot de passe une fois connecté. ";
        
        $modeleutilisateurs = new modeleUtilisateurs();
        $checkemail = $modeleutilisateurs->checkemailco($email_co);
        
                while ($mailpresent = $checkemail->fetch()) { 
                    if ($mailpresent['nbr'] != 0){
                        if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else { ?>
<script>
    alert("Un mail vient d'être envoyé à l'adresse <?= htmlspecialchars($_POST['confirm_email']) ?>. Utilisez le mot de passe contenu dans le mail pour vous reconnecter");

</script>
<?php
                    $options = [
                        'cost' => 9,
                    ];
                    $nvx_mdp_secure = password_hash(($chaineAleatoire), PASSWORD_BCRYPT, $options);
                    $email_co = htmlspecialchars($_POST['confirm_email']);
                    $modeleutilisateurs = new modeleUtilisateurs();
                    $nvx_mdp_oublie = $modeleutilisateurs->pswoublie($nvx_mdp_secure, $email_co);                    
                    require('vues/accueilVue.php');
                        }
                    } else { ?>
<script>
    alert('Cette adresse email est inconnue');

</script>
<?php
                        require('vues/accueilVue.php');
                    }
                    
                }
    }
}
