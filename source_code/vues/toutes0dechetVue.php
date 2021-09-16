<?php $title = "Toutes les marques zéro déchet - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="titre_page_toute_0D">
    <h3>Retrouvez ici toutes les marques proposant des produits zéro déchet</h3>
    <p class="introtxt_page_OD"><img alt="Propose des produits pour vous aider dans votre démarche 0 déchet" src="global/images/0dechet.png"> Ces marques proposent des produits vous aidant à réduire vos déchets. </p>
</section>

<section class="tt_marques">
    <ul class="liste_tt_marques">
        <?php while ($dataallOD = $all0dechets->fetch()) { ?>

        <li><a href="<?= $dataallOD["site_internet"] ?>" target="_blank"><?= $dataallOD["nom_marque"] ?></a></li>

        <?php 
}$all0dechets->closeCursor();
?>
    </ul>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
