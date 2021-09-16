<?php
session_start();
require('controller/controller.php');

class Routeur { 
    public function RenvoisController () {
        $controller = new Controller ();
        try { 
            if (isset($_GET['action'])) {
                 //affiche la page home quand connecté
                if ($_GET['action'] == 'pageAccueilCo') {
                    if (isset($_SESSION['co_utilisateur']) && $_SESSION['co_utilisateur'] == 'ONLINE'){
                    $actioncontroller = $controller -> pageAccueilCo();
                } else {
                      $actioncontroller = $controller -> pageAccesRefuse();  
                    }
                }
                
                //affiche la page vetements
                if ($_GET['action'] == 'pageVetements') {
                    $actioncontroller = $controller -> pageVetements();
                }
                
                //affiche la page Vetements avec avis
                if ($_GET['action'] == 'pageAvisVetements') {
                    if (isset($_GET['marqueM'])){
                        $actioncontroller = $controller -> pageAvisVetements($_GET['marqueM']);
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //affiche la page SDB
                if ($_GET['action'] == 'pageSDB') {
                    $actioncontroller = $controller -> pageSDB();
                }
                
                //affiche la page SDB avec avis
                if ($_GET['action'] == 'pageAvisSDB') {
                    if (isset($_GET['marqueM'])){
                        $actioncontroller = $controller -> pageAvisSDB($_GET['marqueM']);
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //affiche la page Maison
                if ($_GET['action'] == 'pageMaison') {
                    $actioncontroller = $controller -> pageMaison();
                }
                
                //affiche la page Maison avec avis
                if ($_GET['action'] == 'pageAvisMaison') {
                    if (isset($_GET['marqueM'])){
                        $actioncontroller = $controller -> pageAvisMaison($_GET['marqueM']);
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //affiche la page Enfants
                if ($_GET['action'] == 'pageEnfants') {
                    $actioncontroller = $controller -> pageEnfants();
                }
                
                //affiche la page Enfants avec avis
                if ($_GET['action'] == 'pageAvisEnfants') {
                    if (isset($_GET['marqueM'])){
                        $actioncontroller = $controller -> pageAvisEnfants($_GET['marqueM']);
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //affiche la page Animaux
                if ($_GET['action'] == 'pageAnimaux') {
                    $actioncontroller = $controller -> pageAnimaux();
                }
                
                //affiche la page Animaux avec avis
                if ($_GET['action'] == 'pageAvisAnimaux') {
                    if (isset($_GET['marqueM'])){
                        $actioncontroller = $controller -> pageAvisAnimaux($_GET['marqueM']);
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                    
                //affiche la page toutes les marques
                if ($_GET['action'] == 'pageTouteLesMarques') {
                    $actioncontroller = $controller -> pageTouteLesMarques();   
                }
                
                //affiche la page toutes les marques Made In Fr
                if ($_GET['action'] == 'pageTouslesMIF') {
                    $actioncontroller = $controller -> pageTouslesMIF();
                }
                
                //affiche la page toutes les marques 0 déchet
                if ($_GET['action'] == 'pageTousles0dechet') {
                    $actioncontroller = $controller -> pageTousles0dechet();
                    
                }
                
                //affiche la page des mentions légales
                if ($_GET['action'] == 'pageMentionsLeg') {
                    $actioncontroller = $controller -> pageMentionsLeg();
                }
                    
                //quand nouvel ajout d'un avis sur des vetements :
                if ($_GET['action'] == 'publiAvisVetement') {
                    if (isset($_GET['marqueM'])) {
                        if ( !empty($_POST['note_avis']) ) {
                            $actioncontroller = $controller ->publiAvisVetement(htmlspecialchars($_POST['marque_concerned_avis']), htmlspecialchars($_POST['nomprenom_avis']), htmlspecialchars($_POST['msg_avis']), htmlspecialchars($_POST['note_avis']));
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');  
                        }
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //quand nouvel ajout d'un avis sur de SDB :
                if ($_GET['action'] == 'publiAvisSDB') {
                    if (isset($_GET['marqueM'])) {
                        if ( !empty($_POST['note_avis']) ) {
                            $actioncontroller = $controller ->publiAvisSDB(htmlspecialchars($_POST['marque_concerned_avis']), htmlspecialchars($_POST['nomprenom_avis']), htmlspecialchars($_POST['msg_avis']), htmlspecialchars($_POST['note_avis']));
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');  
                        }
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //quand nouvel ajout d'un avis sur Maison :
                if ($_GET['action'] == 'publiAvisMaison') {
                    if (isset($_GET['marqueM'])) {
                        if ( !empty($_POST['note_avis']) ) {
                            $actioncontroller = $controller ->publiAvisMaison(htmlspecialchars($_POST['marque_concerned_avis']), htmlspecialchars($_POST['nomprenom_avis']), htmlspecialchars($_POST['msg_avis']), htmlspecialchars($_POST['note_avis']));
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');  
                        }
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //quand nouvel ajout d'un avis sur Enfants :
                if ($_GET['action'] == 'publiAvisEnfants') {
                    if (isset($_GET['marqueM'])) {
                        if ( !empty($_POST['note_avis']) ) {
                            $actioncontroller = $controller ->publiAvisEnfants(htmlspecialchars($_POST['marque_concerned_avis']), htmlspecialchars($_POST['nomprenom_avis']), htmlspecialchars($_POST['msg_avis']), htmlspecialchars($_POST['note_avis']));
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');  
                        }
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //quand nouvel ajout d'un avis sur Animaux :
                if ($_GET['action'] == 'publiAvisAnimaux') {
                    if (isset($_GET['marqueM'])) {
                        if ( !empty($_POST['note_avis']) ) {
                            $actioncontroller = $controller ->publiAvisAnimaux(htmlspecialchars($_POST['marque_concerned_avis']), htmlspecialchars($_POST['nomprenom_avis']), htmlspecialchars($_POST['msg_avis']), htmlspecialchars($_POST['note_avis']));
                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');  
                        }
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //quand ajout d'une marque :
                if ($_GET['action'] == 'nouvelleMarque') {
                    if (($_SESSION['co_admin'] == 'ADMIN') && ($_SESSION['email_utilisateur'] == 'email@email.com')){
                            $actioncontroller = $controller ->nouvelleMarque(htmlspecialchars($_POST['marqueM']), htmlspecialchars($_POST['secteur_ajout']),
                            htmlspecialchars($_POST['site_ajout']), htmlspecialchars($_POST['logo_ajout']),
                            htmlspecialchars($_POST['MIF_ajout']),
                            htmlspecialchars($_POST['desc_ajout']),
                            htmlspecialchars($_POST['zd_ajout'])    
                        );
                    } else {
                        $actioncontroller = $controller -> pageAccesRefuse();
                    }
                }
              
              	//quand modif d'une marque :
                if ($_GET['action'] == 'MarqueModifiee') {
                    if (($_SESSION['co_admin'] == 'ADMIN') && ($_SESSION['email_utilisateur'] == 'email@email.com')){
                            $actioncontroller = $controller ->MarqueModifiee( htmlspecialchars($_POST['secteur_modif']), htmlspecialchars($_POST['site_modif']), htmlspecialchars($_POST['logo_modif']), htmlspecialchars($_POST['MIF_modif']), htmlspecialchars($_POST['desc_modif']), htmlspecialchars($_POST['zd_modif']), htmlspecialchars($_POST['marqueM']));
                    } else {
                        $actioncontroller = $controller -> pageAccesRefuse();
                    }
                }
                 
                //suppression d'une marque
                if ($_GET['action'] == 'suppMarque') {
                    if (($_SESSION['co_admin'] == 'ADMIN') && ($_SESSION['email_utilisateur'] == 'email@email.com')){
                    $actioncontroller = $controller -> suppMarque(htmlspecialchars($_POST['marqueM']));
                } else {
                       $actioncontroller = $controller -> pageAccesRefuse(); 
                    }
                }
                
                //suppression d'un user
                if ($_GET['action'] == 'suppUtilisateur') {
                    if (($_SESSION['co_admin'] == 'ADMIN') && ($_SESSION['email_utilisateur'] == 'email@email.com')){
                    $actioncontroller = $controller -> suppUtilisateur(htmlspecialchars($_POST['email_sup']));
                } else {
                    $actioncontroller = $controller -> pageAccesRefuse();
                }
                }
                
                //quand l'admin passe un avis en NOK
                if ($_GET['action'] == 'deOKaNOK') {
                    if (($_SESSION['co_admin'] == 'ADMIN') && ($_SESSION['email_utilisateur'] == 'email@email.com')){
                    $actioncontroller = $controller -> deOKaNOK($_GET['marqueM'], $_GET['id']);
                } else {
                    $actioncontroller = $controller -> pageAccesRefuse();
                }
                }
                    
                //quand on passe un avis en OK
                if ($_GET['action'] == 'deNOKaOK') {
                    if (($_SESSION['co_admin'] == 'ADMIN') && ($_SESSION['email_utilisateur'] == 'email@email.com')){
                    $actioncontroller = $controller -> deNOKaOK($_GET['marqueM'], $_GET['id']);
                } else {
                    $actioncontroller = $controller -> pageAccesRefuse();
                }
                }
                
                //quand qqn ajoute une marque dans ses fav :
                if ($_GET['action'] == 'AjoutDansFav'){
                    if (isset($_GET['marque_fav'])) {
                        $actioncontroller = $controller ->AjoutDansFav($_SESSION['email_utilisateur'], $_GET['marque_fav']);
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                }
                
                //quand qqn supp une marque de ses fav :
                if ($_GET['action'] == 'SuppDansFav'){
                    if (isset($_SESSION['co_utilisateur']) && $_SESSION['co_utilisateur'] == 'ONLINE'){
                    if (isset($_GET['marque_fav'])) {
                        $actioncontroller = $controller ->SuppDansFav($_SESSION['email_utilisateur'], $_GET['marque_fav']);
                    } else {
                        throw new Exception('Aucune marque envoyée');
                    }
                    } else {
                        $actioncontroller = $controller -> pageAccesRefuse();
                    }
                }
                
                //quand qqn se créé un nouveau compte
                if ($_GET['action'] == 'CreationCompte') {
                    if ( !empty($_POST['nvx_compte_mail']) &&  !empty($_POST['confirm_nvx_compte_mail']) && !empty($_POST['nvx_compte_mdp']) && !empty($_POST['confirm_nvx_compte_mdp'])) {
                        $options = [
                            'cost' => 9,
                        ];
                        $mdp_secure = password_hash((htmlspecialchars($_POST['confirm_nvx_compte_mdp'])), PASSWORD_BCRYPT, $options);

                        $actioncontroller = $controller ->CreationCompte(htmlspecialchars($_POST['confirm_nvx_compte_mail']), htmlspecialchars($mdp_secure));
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');  
                    }
                }
                
                //qd qnn change son mdp
                if ($_GET['action'] == 'changerMDP') {
                    if (isset($_SESSION['co_utilisateur']) && $_SESSION['co_utilisateur'] == 'ONLINE'){
                    $nvx_mdp_secure = htmlspecialchars($_POST['confirmer_nvx_mdp']);
                    $actioncontroller = $controller -> changerMDP($_SESSION['email_utilisateur'], $nvx_mdp_secure);
                } else {
                    $actioncontroller = $controller -> pageAccesRefuse();
                }
                }
                
                //qd qnn se connecte
                if ($_GET['action'] == 'SeCo') {
                    $secure_email = htmlspecialchars($_POST['email_co']);
                    $actioncontroller = $controller -> SeCo($secure_email);
                }
                
                //qd qnn se DEconnecte
                if ($_GET['action'] == 'SeDeco') {
                    
                    $actioncontroller = $controller -> SeDeco();
                }
                
                //Quand mot de passe oublié
                elseif ($_GET['action'] == 'MDPoublie'){
                    $secure_email_confirm = htmlspecialchars($_POST['confirm_email']);
                    $actioncontroller = $controller -> MDPoublie($secure_email_confirm);
                }
                
                //affiche la page dechets paris
                if ($_GET['action'] == 'pageDechetsParis') {
                    $actioncontroller = $controller -> pageDechetsParis();
                }
                
                //affiche la page admin
                if ($_GET['action'] == 'pageAdmin') {
                    if (($_SESSION['co_admin'] == 'ADMIN') && ($_SESSION['email_utilisateur'] == 'email@email.com')){
                    $actioncontroller = $controller -> pageAdmin();
                    } else {
                        $actioncontroller = $controller -> pageAccesRefuse();
                    }
                }
                
                //affiche la page des marques fav
                if ($_GET['action'] == 'pageMarquesFav') {
                    if (isset($_SESSION['co_utilisateur']) && $_SESSION['co_utilisateur'] == 'ONLINE'){
                    $email = $_SESSION['email_utilisateur'];
                    $actioncontroller = $controller -> pageMarquesFav($email);
                } else {
                       $actioncontroller = $controller -> pageAccesRefuse(); 
                    }
                }
                
                //affiche la page marchés paris
                if ($_GET['action'] == 'pageMarchesParis') {
                    $actioncontroller = $controller -> pageMarchesParis();
                }
                
                //Quand qqn envoie une demande de contact
                if ($_GET['action'] == 'envoyerContact') {
                    $actioncontroller = $controller -> envoyerContact();
                }
            }
            
            //Si aucune action n'est envoyée, alors on affiche la page d'accueil
            else {
                $_SESSION['co_utilisateur'] = "OFFLINE";
                $_SESSION['co_admin'] = 'NOTADMIN';
                $_SESSION['email_utilisateur'] = "";
                $actioncontroller = $controller -> afficherAcceuil();
            }
        }
        catch(Exception $e) { // S'il y a eu une erreur, alors...
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

$routeur = new Routeur;
$routeur -> RenvoisController();
