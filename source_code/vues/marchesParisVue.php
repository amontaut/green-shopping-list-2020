<?php $title = "Les marchés à Paris - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="titre_page_marche_paris">
    <h3>Acheter local et privilégier le circuit court
        <br>à Paris</h3>
    <p class="introtxt_page_marche">Retrouvez ici tous les marchés de Paris où vous trouverez des producteurs et leurs produits frais et locaux. Les marchés sont principalement alimentaires, mais peuvent aussi être des brocantes, puces, des marchés de fleurs, oiseaux, timbres ou de créations artistiques. Cliquez sur l'un des repère sur la carte pour en savoir plus.
    <br>
        Vous trouverez également à la <span class="ancre_calendrier_fl">fin de cette page</span> un calendrier des fruits et légumes de saison.
    </p>
</section>

<div class="cadre_carte">
    <div id="carte"></div>
</div>

<div class="detail_marker_marche">
    <p class="jours_tenue"></p>
    <p class="marche_open_sem"></p>
    <p class="marche_close_sem"></p>
    <p class="marche_open_sam"></p>
    <p class="marche_close_sam"></p>
    <p class="marche_open_dim"></p>
    <p class="marche_close_dim"></p>
    <p class="localisation_marche"></p>
    <p class="type_produits"></p>
    <br>
    <button class="fermer_detail_marker">Fermer</button>
</div>

<section class="calendrier_fl">
<p>Voici ci-dessous un calendrier des fruits et légumes de saison mis à dispotion par la <a href="http://www.fondation-nature-homme.org" target="_blank">Fondation Nicolas Hulot Pour la Nature et l'Homme</a>. Téléchargez le fichier en PDF en cliquant sur <a href='global/images/poster_fruits_legumes_saison.pdf' target="_blank">ce lien</a>, imprimez-le et accrochez-le sur votre frigo pour avoir en tête quels fruits et légumes consommer en ce moment et ainsi soutenir les agriculteurs de nos régions tout en ayany une empreinte carbonne moins importante.
    </p>
    <div class="img_calendrier_fl">
        <img src="global/images/poster_fruits_legumes_saison.jpg" alt="calendrier des fruits et légumes de saison">
    </div>
</section>
<script src="global/APImarches.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

