<?php $title = "Toutes les marques Made In France- L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="titre_page_toute_MIF">
    <h3>Retrouvez ici toutes les marques proposant des produits Made in France</h3>
    <p class="introtxt_page_MIF"><img alt="Propose des produits Made In France" src="global/images/MIF.png"> Ces marques produisent tous ou une partie de leur produits en France.</p>
</section>

<section class="tt_marques">
    <ul class="liste_tt_marques">
        <?php while ($dataallMIF = $allMIF->fetch()) { ?>

        <li><a href="<?= $dataallMIF["site_internet"] ?>" target="_blank"><?= $dataallMIF["nom_marque"] ?></a></li>

        <?php 
}$allMIF->closeCursor();
?>
    </ul>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
