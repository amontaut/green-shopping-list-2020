<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="alicemntt">
    <meta name="robots" content="index, follow">

    <meta name="description" content="Votre annuaire éco-responsible">
    <meta name="keywords" content="annuaire, annuaire éco-responsable, éco-responsable, écologie, vert, zéro déchet, bio, made in france">
    <link rel="canonical" href="http://annuaireeco.alicemta.com">
    <link rel="stylesheet" type="text/css" href="global/annuaireeco.css">
    <link rel="shortcut icon" href="global/images/favicon.ico" type="image/x-icon">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sulphur+Point&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
    <!-- fonts awesome -->
    <script src="https://kit.fontawesome.com/f3421f1a5c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- carte -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
</head>

<body>
    <header>
        <div class="menu_burger_span">
            <div class="header_burger">
                <a id="hamburger-icon" href="#" class="open-close-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span></a>
            </div>
        </div>
        <div id="myNav" class="overlay">
            <div class="overlay-content">
                <div class="front">
                    <?php
        if ($_SESSION['co_utilisateur'] == 'ONLINE'){ ?>
                    <a href="index.php?action=pageAccueilCo" class="header_home_co"><i class="fas fa-home"></i></a>
                    <?php } else { ?>
                    <a href="index.php" class="header_home_deco"><i class="fas fa-home"></i></a>
                    <?php } ?>

                    <a href="index.php?action=pageVetements" class="header_vetement">Vêtements</a>

                    <a href="index.php?action=pageSDB" class="header_SDB">Salle de bain</a>

                    <a href="index.php?action=pageMaison" class="header_Maison">Maison</a>

                    <a href="index.php?action=pageEnfants" class="header_Enfants">Bébés/enfants</a>

                    <a href="index.php?action=pageAnimaux" class="header_Animaux">Animaux</a>

                    <a href="index.php?action=pageDechetsParis" class="header_dechets">Gerer mes déchets à Paris </a>

                    <a href="index.php?action=pageMarchesParis" class="header_marche">Acheter local à Paris </a>
                </div>
                <div class="back">
                    <?php
        if ($_SESSION['co_utilisateur'] == 'ONLINE'){ ?>
                    <a href="index.php?action=pageMarquesFav&amp;email=<?=$_SESSION['email_utilisateur']?>" class="btn_marques_pref">Mes marques préférées</a>
                    <?php } ?>

                    <?php
        if ($_SESSION['co_admin'] == 'ADMIN' && ($_SESSION['email_utilisateur'] == 'email@email.com')){ ?>
                    <a href="index.php?action=pageAdmin" class="btn_page_admin">Page admin</a>
                    <?php } ?>

                    <?php
        if ($_SESSION['co_utilisateur'] == 'OFFLINE'){ ?>
                    <button class="btn_co">Connexion/Créer un compte </button>
                    <?php } else { ?>
                    <button class="changer_mdp">Changer de mot de passe</button>
                    <a class="btn_deco" href="index.php?action=SeDeco">Déconnexion</a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </header>
    <!--        <?php echo $_SESSION['co_utilisateur'] . '<br>' . $_SESSION['email_utilisateur'] . '<br>' . $_SESSION['co_admin'] ?>-->

    <div class="cadre_co">
        <div class="txt_cadre_co">
            <h4 class="h4_cadre_co">Connexion</h4>
            <form action="index.php?action=SeCo&amp;email_co=<?= $_POST['email_co']?>" method="post">
                <div class="champs_email_mdp">
                    <div class="champs_email_co">
                        <label for="email_co">Email :</label>
                        <input type="email" id="email_co" name="email_co" required>
                    </div>

                    <div class="champs_mdp_co">
                        <label for="mdp_co">Mot de passe : </label>
                        <br>
                        <input type=password id="mdp_co" name="mdp_co" required>
                    </div>
                </div>

                <input type="submit" class="submit_co" value="Connexion">
            </form>
            <div class="btn_cadre_co">
                <button class="creer_compte">Créer un compte</button>
                <button class="btn_mdp_oublie">Mot de passe oublié</button>
                <button class="fermer_co">Fermer</button>
            </div>
        </div>
    </div>

    <div class="cadre_mdp_oublie">
        <div class="txt_mdp_oublie">
            <h4 class="h4_mdp_oublie">Mot de passe oublié</h4>
            <form action="index.php?action=MDPoublie&amp;email_co=<?= $_POST['confirm_email']?>" method="post" class="form_mdp_oublie">
                <label for="confirm_email">Adresse email :</label>
                <input type="email" id="confirm_email" name="confirm_email" required>
                <br>
                <input type="submit" value="Valider" class="submit_pwd_forgotten">
            </form>
            <button class="fermer_mdp_oublie">Fermer</button>
        </div>
    </div>

    <div class="cadre_nvx_compte">
        <div class="txt_nvx_compte">
            <h4 class="h4_nvx_compte">Créer un compte</h4>
            <form action="index.php?action=CreationCompte" method="post">
                <div class="all_mail_nvx_compte">
                    <div class="mail_nvx_compte">
                        <label for="nvx_compte_mail">Email :</label>
                        <input type="email" id="nvx_compte_mail" name="nvx_compte_mail" required>
                    </div>
                    <div class="confirm_mail_nvx_compte">
                        <label for="confirm_nvx_compte_mail">Confirmation de l'adresse email :</label>
                        <input type="email" id="confirm_nvx_compte_mail" name="confirm_nvx_compte_mail" required>
                    </div>
                </div>
                <p class="email_nvx_compte_differents">Les adresses mails ne sont pas identiques.</p>

                <div class="all_mdp_nvx_compte">
                    <div class="mdp_nvx_compte">
                        <label for="nvx_compte_mdp">Mot de passe : </label>
                        <br>
                        <input type=password id="nvx_compte_mdp" name="nvx_compte_mdp" required>
                    </div>
                    <div class="confirm_mdp_nvx_compte">
                        <label for="confirm_nvx_compte_mdp">Confirmation du mot de passe : </label>
                        <br>
                        <input type=password id="confirm_nvx_compte_mdp" name="confirm_nvx_compte_mdp" required>
                    </div>
                </div>
                <p class="mdp_nvx_compte_differents">Les mots de passe ne sont pas identiques.</p>

                <input type="submit" class="nvx_compte" value="Créer mon compte">
            </form>
            <button class="fermer_nvx_compte">Annuler</button>
        </div>
    </div>

    <div class="cadre_changement_mdp">
        <div class="txt_changement_mdp">
            <h4 class="h4_chgmt_mdp">Changer de mot de passe</h4>
            <form action="index.php?action=changerMDP" method="post" class="form_changement_mdp">
                <div class="all_mdp_nvx_mdp">
                    <div class="chgmt_nvx_mdp">
                        <label for="nvx_mdp">Nouveau mot de passe :</label>
                        <input type=password id="nvx_mdp" name="nvx_mdp" required>
                    </div>
                    <div class="confirm_chgmt_nvx_mdp">
                        <label for="confirmer_nvx_mdp">Confirmer votre nouveau mot de passe :</label>
                        <input type=password id="confirmer_nvx_mdp" name="confirmer_nvx_mdp" required>
                    </div>
                </div>
                <input type="submit" value="Changer mon mot de passe" class="valider_changement_mdp">
            </form>
            <p class="mdp_differents">Les mots de passes ne sont pas identiques.</p>
            <button class="fermer_changer_mdp">Fermer</button>
        </div>
    </div>

    <?= $content ?>

    <footer>
        <a class="footer_men_leg" href="index.php?action=pageMentionsLeg"> Mentions légales </a>
        <?php
        if ($_SESSION['co_utilisateur'] == 'ONLINE'){ ?>
        <a class="footer_contact" href="index.php?action=pageAccueilCo#section_contact">Contact</a>
        <?php } else { ?>
        <a class="footer_contact" href="index.php#section_contact">Contact</a>
        <?php } ?>
        <a class="footer_toutes_marques" href="index.php?action=pageTouteLesMarques"> Toutes les marques </a>
        <a class="footer_toutes_MIF" href="index.php?action=pageTouslesMIF"> Toutes les Made In France </a>
        <a class="footer_toutes_zd" href="index.php?action=pageTousles0dechet"> Toutes les 0 déchets </a>
    </footer>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="global/global.js"></script>
    <!--Mise en forme du header et footer quand lien actif-->
    <?php $url = $_SERVER['REQUEST_URI']; ?>
    <script>
        if (("<?php echo ($url) ?>").includes('pageVetements')) {
            document.getElementsByClassName('header_vetement')[0].style.textDecoration = "underline";
            document.getElementsByClassName('header_vetement')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageSDB')) {
            document.getElementsByClassName('header_SDB')[0].style.textDecoration = "underline";
            document.getElementsByClassName('header_SDB')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageMaison')) {
            document.getElementsByClassName('header_Maison')[0].style.textDecoration = "underline";
            document.getElementsByClassName('header_Maison')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageEnfants')) {
            document.getElementsByClassName('header_Enfants')[0].style.textDecoration = "underline";
            document.getElementsByClassName('header_Enfants')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageAnimaux')) {
            document.getElementsByClassName('header_Animaux')[0].style.textDecoration = "underline";
            document.getElementsByClassName('header_Animaux')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageDechetsParis')) {
            document.getElementsByClassName('header_dechets')[0].style.textDecoration = "underline";
            document.getElementsByClassName('header_dechets')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageMarchesParis')) {
            document.getElementsByClassName('header_marche')[0].style.textDecoration = "underline";
            document.getElementsByClassName('header_marche')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageMentionsLeg')) {
            document.getElementsByClassName('footer_men_leg')[0].style.textDecoration = "underline";
            document.getElementsByClassName('footer_men_leg')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageTouteLesMarques')) {
            document.getElementsByClassName('footer_toutes_marques')[0].style.textDecoration = "underline";
            document.getElementsByClassName('footer_toutes_marques')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageTouslesMIF')) {
            document.getElementsByClassName('footer_toutes_MIF')[0].style.textDecoration = "underline";
            document.getElementsByClassName('footer_toutes_MIF')[0].style.color = "#6ba758";
        } else if (("<?php echo ($url) ?>").includes('pageTousles0dechet')) {
            document.getElementsByClassName('footer_toutes_zd')[0].style.textDecoration = "underline";
            document.getElementsByClassName('footer_toutes_zd')[0].style.color = "#6ba758";
        } else {
            document.getElementsByClassName('header_vetement')[0].style.textDecoration = "none";
            document.getElementsByClassName('header_vetement')[0].style.color = "black";
        }

    </script>

</body>




</html>
