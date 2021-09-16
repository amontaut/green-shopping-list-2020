<?php $title = "Les bébés et enfants - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>
<div class="tout">
    <section class="titre_page_vetements">
        <h3>Retrouvez des marques éco-responsables pour bébés et enfants.</h3>
    </section>

    <section>
        <hr class="trait_marques top">
        <div class="texte_page_vetements">
            <p><img alt="Propose des produits Made In France" src="global/images/MIF.png"> Les marques portant le sigle "Made In France" produisent tous ou une partie de leur produits en France. </p>
            <p><img alt="Propose des produits pour vous aider dans votre démarche 0 déchet" src="global/images/0dechet.png"> Les marques portant le sigle "0 déchets" proposent des produits vous aidant à réduire vos déchets. </p>
            <p><img alt="avis clients" src="global/images/logo_avis.png">Regardez les avis de chaque marque. </p>
            <p><img alt="Laisser un avis" src="global/images/icone_avis.png">Laissez un avis si vous le souhaitez. </p>
        </div>
        <hr class="trait_marques bottom">
        <button class="btn_laisser_avis">Laisser un avis sur une marque</button>
    </section>

    <section>
        <?php
$valeur_marque = 'null';
$valeur_avis='null'; ?>
        <ul class="liste_marques">
            <?php while ($data = $avisparmarqueEnfants->fetch()) { ?>
            <!-- 
--- LA MARQUE et infos 
-->

            <?php
    if ($valeur_marque != $data["nom_marque"]) { /*si different -> rupture */ ?>
            <li class="marque_et_avis">
                <div class="une_colonne">
                    <div class="une_marque appear">
                        <!-- logo -->
                        <div class="img_logo_marque">
                            <img src="<?=  $data['logo'] ?>" alt="logo <?=  $data['nom_marque'] ?>">
                        </div>
                        <!-- nom -->
                        <h4> <?php echo $data["nom_marque"] ?> </h4>
                        <!-- site -->
                        <a class="site_internet_marque" href='<?= $data["site_internet"] ?> '><?php echo $data["site_internet"] ?> </a>
                        <!-- desc -->
                        <p class="petite_desc_marque"> <?php echo $data["petite_desc"] ?> </p>
                        <!-- sigles -->
                        <div class="sigles_marque">
                            <?php        
            if ($data["MIF"] == 1){ ?>
                            <div class="img_sigles_marque"> <img alt="Propose des produits Made In France" src="global/images/MIF.png"></div>
                            <?php
            }
            if ($data["0dechet"] == 1){ ?>
                            <div class="img_sigles_marque"><img alt="Propose des produits pour vous aider dans votre démarche 0 déchet" src="global/images/0dechet.png"></div>
                            <?php
            } ?>
                        </div>
                        <div class="actions_une_marque">
                            <?php
                    if ($data["note_avis"] != ""){ ?>
                            <button class="display_avis">Afficher les avis</button>
                            <button class="fermer_avis">Fermer les avis</button>
                            <?php } else { ?>
                            <button>Pas encore d'avis</button>
                            <?php   } ?>
                            <a href="index.php?action=AjoutDansFav&amp;marque_fav=<?= $data['nom_marque'] ?>" class="ajout_fav_marque">Ajouter cette marque à mes favoris <i class="fas fa-heart"></i></a>
                        </div>
                        <h4 class="h4_avis_laisses">Les avis laissés pour <?= $data['nom_marque'] ?> :</h4>
                    </div>
                </div>
            </li>

            <?php
    /* NE PAS CHANGER : on remet la bonne valeur pour la suite */
        $valeur_marque = $data["nom_marque"]; ?>
            <?php
    } ?>
            <?php    
}$avisparmarqueEnfants->closeCursor();
?>
        </ul>
    </section>

    <section>
        <!--
AVIS-->
        <div class="background_avis">
            <div class="avis_dela_marque">
                <div class="fermer_avis_marque_top"><a href="index.php?action=pageEnfants"><i class="fas fa-times"></i> Fermer</a></div>
                <h4 class="titre_avis_laisses">Avis laissés sur la marque <?= $marque_titre_avis['marque_assoc'] ?> :</h4>
                <div class="note_nombre">
                    <?php while ($NB = $nombreAvis1marque->fetch()) { ?>
                    <p>Nombre de notes : <span><?= $NB["nb_avis"] ?></span> </p>
                    <?php }
$nombreAvis1marque->closeCursor();
?>

                    <?php while ($MOY = $AVGnotes->fetch()) { 
                    $moyennebrut = $MOY["note_moyenne"];
                    $moyenneround = round($moyennebrut, 2);
                    ?>
                    <p>Note moyenne : <span><?php echo $moyenneround ?></span> </p>
                    <?php }
$AVGnotes->closeCursor();
?>
                </div>

                <?php while ($dataAvis = $avispour1marque->fetch()) { ?>
                <div class="contenu_un_avis">
                        <p class="date_publi_avis">le <?= $dataAvis["date_publi_avis"] ?></p>
                        <?php
                if ($dataAvis["note_avis"] != "") { ?>
                        <p><em>Note :</em> <?= $dataAvis["note_avis"] ?>/5 </p>
                        <?php }
                if ($dataAvis["msg_avis"] != "") { ?>
                        <p><em>Commentaire : </em><?= $dataAvis["msg_avis"] ?> </p>
                        <?php }
                if ($dataAvis["nomprenom_avis"] != "") { ?>
                        <p><em>Avis laissé par </em><?= $dataAvis["nomprenom_avis"] ?>.</p>
                        <?php } ?>
                    </div>
                    <?php
  
            }$avispour1marque->closeCursor();
?>

                    <div class="pages_buttons">
                        <?php 
        while ($displaycount = $countnbchap->fetch()){
            $nb_chapters = $displaycount['Compteur'];
            
        }
    
                              
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limite = 10;

        $nombreDePages = ceil($nb_chapters / $limite);
        /* Si on est sur la première page, on n'a pas besoin d'afficher de lien
         * vers la précédente. On va donc l'afficher que si on est sur une autre
         * page que la première */
        if ($page > 1):
        ?><a id='page=1' href="index.php?action=pageAvisEnfants&page=<?php echo $page - 1; ?>&amp;marqueM=<?php echo $marqueM ?>">Page précédente</a> — <?php
        endif;

        /* On va effectuer une boucle autant de fois que l'on a de pages */

            //http://localhost:8888/P4V19/index.php?action=acces_admin_page&page=3

        for ($i = 1; $i <= $nombreDePages; $i++):
        ?><a href="index.php?action=pageAvisEnfants&page=<?php echo $i; ?>&amp;marqueM=<?php echo $marqueM ?>"><?php echo $i; ?></a> <?php
        endfor;

        /* Avec le nombre total de pages, on peut aussi masquer le lien
         * vers la page suivante quand on est sur la dernière */
        if ($page < $nombreDePages):
        ?>— <a href="index.php?action=pageAvisEnfants&page=<?php echo $page + 1; ?>&amp;marqueM=<?php echo $marqueM ?>">Page suivante</a><?php
        endif;
        ?>

                        <div class="fermer_avis_marque_bottom"><a href="index.php?action=pageEnfants"><i class="fas fa-times"></i> Fermer</a></div>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('vues/template.php'); ?>
