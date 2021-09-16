<?php $title = "Accueil et contact - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="section_bienvenue background_accueil">
    <div class="txt_section_bienvenue">
        <h1>Votre annuaire de marques éco-responsables.
            <br><br>De quoi avez-vous besoin aujourd'hui ?</h1>
    </div>
    <i class="fas fa-angle-double-down"></i>
</section>

<section class="section_vetements background_accueil">
    <a href="index.php?action=pageVetements">Vêtements</a>
</section>

<section class="section_cosmetique background_accueil">
    <a href="index.php?action=pageSDB">La salle de bain et les cosmétiques</a>
</section>

<section class="section_maison background_accueil">
    <a href="index.php?action=pageMaison">La maison</a>
</section>

<section class="section_enfants background_accueil">
    <a href="index.php?action=pageEnfants">Les bébés/enfants</a>
</section>

<section class="section_animaux background_accueil">
    <a href="index.php?action=pageAnimaux">Les animaux de compagnie</a>
</section>

<section class="section_dechets background_accueil">
    <a href="index.php?action=pageDechetsParis">Mieux gérer mes déchets à Paris : <br> vêtements, accessoires,<br> déchets organiques, petits emcombrants...</a>
</section>

<section class="section_marches background_accueil">
    <a href="index.php?action=pageMarchesParis">Achetez local : les marchés à Paris</a>
</section>

<section class="section_contact" id="section_contact">
    <div class="titre_section_contact">
        <h2>CONTACTEZ-MOI </h2>
    </div>
    <div class="text_section_contact">
        <p>Proposez des nouvelles idées, des nouvelles marques, faites une remarque, donnez votre avis ... Bref, contactez-moi pour me raconter ce que vous voulez !
            <br>
            Ce formulaire peut être anonyme, cependant n'oubliez pas de renseigner votre email si vous souhaitez que je vous réponde. </p>
        <form method="post" action="index.php?action=envoyerContact">
            <div class="champs_nomprenom_email">
                <div class="champs_nomprenom">
                    <label for="nomprénom">Nom et/ou prénom :</label>
                    <input type=text id="nomprénom" name="nomprénom">
                </div>

                <div class="champs_email">
                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email">
                </div>
            </div>

            <div class="champs_msg">
                <label for="msg">Votre message* : </label>
                <br>
                <textarea id="msg" name="msg" rows="5" cols="33"></textarea>
            </div>

            <input type="submit" class="submit_form_contact" value="Envoyer">
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
