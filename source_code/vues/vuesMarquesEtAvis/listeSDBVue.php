<?php $title = "La salle de bain - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="titre_page_vetements">
    <h3>Retrouvez des marques de cosmétique et pour votre salle de bain éco-responsables.</h3>
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
    <!-- 
--- FORM POUR LAISSER AVIS 
-->
    <div class="laisser_avis">
        <!--    <hr class="trait_form_laisser_avis">-->
        <h4 class="h4_laisser_avis">Laisser un avis sur une marque</h4>
        <p class="indication_form_laisser_avis">Les champs marqués d'une étoile * sont oligatoires</p>
        <form action="index.php?action=publiAvisSDB&amp;marqueM=<?= $data2['nom_marque'] ?> " class="form_laisser_avis" method="post">
            <div class='nom_prenom_laisser_avis'>
                <label for="nomprenom_avis">Nom et/ou prénom :</label>
                <input type=text id="nomprenom_avis" name="nomprenom_avis">
            </div>
            <div class="marque_concerned_form">
                <label for="marque_concerned_avis">Marque* :</label>
                <select name="marque_concerned_avis" id="marque_concerned_avis" >
                    <optgroup label="Marque :">
                        <?php while ($data2 = $SDB->fetch()) { ?>
                        <option value="<?= $data2['nom_marque'] ?>"><?= $data2['nom_marque'] ?></option>
                        <?php
        }$SDB->closeCursor();
?>
                    </optgroup>
                </select>
            </div>
            <div class="note_laisser_avis">
                <label for="note_avis">Note de 0 à 5* : </label>
                <input type="number" id="note_avis" name="note_avis" min=0 max=5 step=0.5 required>
            </div>

            <label for="msg_avis">Votre commentaire : </label>
            <textarea id="msg_avis" name="msg_avis" rows="5" cols="33"></textarea>

            <input type="submit" class="submit_avis" value="Envoyer">
        </form>
        <button class="fermer_form_laisser_avis">Fermer</button>
    </div>
</section>

<section>
    <?php
$valeur_marque = 'null';
$valeur_avis='null'; ?>
    <ul class="liste_marques">
        <?php while ($data = $avisparmarqueSDB->fetch()) { ?>
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
                    <a class="site_internet_marque" href='<?= $data["site_internet"] ?>' target="_blank"><?php echo $data["site_internet"] ?> </a>
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
                    <!-- desc -->
                    <p class="petite_desc_marque"> <?php echo $data["petite_desc"] ?> </p>

                    <div class="actions_une_marque">
                        <?php
                    if ($data["note_avis"] != ""){ ?>
                        <a href="index.php?action=pageAvisSDB&amp;marqueM=<?= $data['nom_marque'] ?>" class="display_avis">Afficher les avis</a>
                        <?php } else { ?>
                        <button>Pas encore d'avis</button>
                        <?php   } ?>
                        <a href="index.php?action=AjoutDansFav&amp;marque_fav=<?= $data['nom_marque'] ?>" class="ajout_fav_marque">Ajouter cette marque à mes favoris <i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </li>

        <?php
    /* NE PAS CHANGER : on remet la bonne valeur pour la suite */
        $valeur_marque = $data["nom_marque"]; ?>
        <?php
    } ?>

        <?php    
}$avisparmarqueSDB->closeCursor();
?>
    </ul>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('vues/template.php'); ?>
