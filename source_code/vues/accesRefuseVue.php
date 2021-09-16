<?php $title = "Accès refusé - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="page_acces_refuse">
    <p><span class="affiche_inscription">Inscrivez-vous</span> ou <span class="affiche_connexion">connectez-vous</span> pour pouvoir acceder à cette page</p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
