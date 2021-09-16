<?php $title = "Toutes les marques - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="titre_page_toute_marques">
    <h3>Retrouvez ici toutes les marques présentes sur le site</h3>
</section>

<section class="tt_marques">
    <ul class="liste_tt_marques">
        <?php while ($datatoutesmarques = $allmarques->fetch()) { ?>

        <li><a href="<?= $datatoutesmarques["site_internet"] ?>" target="_blank"><?= $datatoutesmarques["nom_marque"] ?></a></li>

        <?php 
}$allmarques->closeCursor();
?>
    </ul>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
