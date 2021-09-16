<?php $title = "Espace administrateur - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="btn_page-admin">
    <button class="btn_ajout_marque">Ajouter une marque à l'annuaire</button>
  	<button class="btn_modif_marque">Modifier une marque</button>
    <button class="btn_supp_marque">Supprimer une marque</button>
    <button class="btn_supp_user">Supprimer un utilisateur</button>
    <button class="btn_gerer_avis">Modérer les avis</button>
</section>

<section class="cadre_ajouter_une_marque">
    <h4 class="h4_ajouter_marque">Ajouter une marque au site :</h4>
    <p class="indication_form_ajouter_marque">Les champs marqués d'une étoile * sont oligatoires</p>
    <form action="index.php?action=nouvelleMarque" class="form_ajout_marque" method="post">
        <div class="nom_marque_ajout_form">
            <label for="marqueM">Nom de la marque* :</label>
            <input type=text id="marqueM" name="marqueM" required>
        </div>

        <div class="secteur_ajout_form">
            <label for="secteur_ajout">Secteur(s) : *</label>
            <input type=text id="secteur_ajout" name="secteur_ajout" required placeholder="Vêtements,Animaux">
            <p class="indication_ajout_marque">Plusieurs réponses possibles à choisir entre : Vêtements, SDB, Maison, Enfants, Animaux. Aucun espace.</p>
        </div>

        <div class="site_ajout_form">
            <label for="site_ajout">Site internet de la marque* :</label>
            <input type=text id="site_ajout" name="site_ajout" required>
        </div>

        <div class="logo_ajout_form">
            <label for="logo_ajout">Logo de la marque* :</label>
            <input type=text id="logo_ajout" name="logo_ajout" required value="global/images/logos_marques/">
            <p class="indication_ajout_marque">Entrez le nom du fichier à la suite.</p>
        </div>

        <div class="desc_ajout_form">
            <label for="desc_ajout">Petite description* :</label>
            <input type=text id="desc_ajout" name="desc_ajout" required>
        </div>

        <div class="MIF_ajout_form">
            <label for="MIF_ajout">Made in France ?*</label>
            <select type=text id="MIF_ajout" name="MIF_ajout" required>
                <option value="1">1</option>
                <option value="0">0</option>
            </select>
            <p class="indication_ajout_marque">1 si oui, 0 si non</p>
        </div>

        <div class="zd_ajout_form">
            <label for="zd_ajout">Propose des produits zéro déchet ?*</label>
            <select type=text id="zd_ajout" name="zd_ajout" required>
                <option value="1">1</option>
                <option value="0">0</option>
            </select>
            <p class="indication_ajout_marque">1 si oui, 0 si non</p>
        </div>

        <input type="submit" class="submit_ajout_marque" value="Envoyer">
    </form>
    <button class="fermer_cadre_ajout_marque">Fermer</button>
</section>

<section class="cadre_modif_une_marque">
    <h4 class="h4_modif_marque">Modifier une marque :</h4>
    <p class="indication_form_modif_marque">Les champs marqués d'une étoile * sont oligatoires</p>
    <form action="index.php?action=MarqueModifiee" class="form_modif_marque" method="post">
        <div class="nom_marque_modif_form">
            <label for="marque_aModif">Selectionnez une marque à modifier* :</label>
            <select name="marqueM" id="marqueM" required>
                <?php while ($databis = $allmarquesbis->fetch()) {

        echo $databis['nom_marque']; ?>
                <option value="<?= $databis['nom_marque'] ?>"><?= $databis['nom_marque'] ?></option>
                <?php 
}$allmarquesbis->closeCursor();
?>
            </select>
        </div>

        <div class="secteur_modif_form">
            <label for="secteur_modif">Secteur(s) : *</label>
            <input type=text id="secteur_modif" name="secteur_modif" required placeholder="Vêtements,Animaux">
            <p class="indication_modif_marque">Plusieurs réponses possibles à choisir entre : Vêtements, SDB, Maison, Enfants, Animaux. Aucun espace.</p>
        </div>

        <div class="site_modif_form">
            <label for="site_modif">Site internet de la marque* :</label>
            <input type=text id="site_modif" name="site_modif" required>
        </div>

        <div class="logo_modif_form">
            <label for="logo_modif">Logo de la marque* :</label>
            <input type=text id="logo_modif" name="logo_modif" required value="global/images/logos_marques/">
            <p class="indication_modif_marque">Entrez le nom du fichier à la suite.</p>
        </div>

        <div class="desc_modif_form">
            <label for="desc_modif">Petite description* :</label>
            <input type=text id="desc_modif" name="desc_modif" required>
        </div>

        <div class="MIF_modif_form">
            <label for="MIF_modif">Made in France ?*</label>
            <select type=text id="MIF_modif" name="MIF_modif" required>
                <option value="1">1</option>
                <option value="0">0</option>
            </select>
            <p class="indication_modif_marque">1 si oui, 0 si non</p>
        </div>

        <div class="zd_modif_form">
            <label for="zd_modif">Propose des produits zéro déchet ?*</label>
            <select type=text id="zd_modif" name="zd_modif" required>
                <option value="1">1</option>
                <option value="0">0</option>
            </select>
            <p class="indication_modif_marque">1 si oui, 0 si non</p>
        </div>

        <input type="submit" class="submit_modif_marque" value="Envoyer">
    </form>
    <button class="fermer_cadre_modif_marque">Fermer</button>
</section>

<section class="cadre_sup_marque">
    <h4 class="h4_sup_marque">Supprimer une marque du site :</h4>
    <p class="indication_form_ajouter_marque">Les champs marqués d'une étoile * sont oligatoires</p>
    <form action="index.php?action=suppMarque" method="post" class="form_sup_marque">
        <div class="champs_sup">
            <label for="marque_aSup">Selectionnez une marque à supprimer* :</label>
            <select name="marqueM" id="marqueM" required>
                <?php while ($data2 = $allmarques->fetch()) {

        echo $data2['nom_marque']; ?>
                <option value="<?= $data2['nom_marque'] ?>"><?= $data2['nom_marque'] ?></option>
                <?php 
}$allmarques->closeCursor();
?>
            </select>
        </div>
        <input type="submit" class="submit_sup_marque" value="Envoyer">
    </form>
    <button class="fermer_cadre_sup_marque">Fermer</button>
</section>



<section class="cadre_gerer_users">
    <h4 class="h4_sup_marque">Supprimer un utilisateur :</h4>
    <p class="indication_form_ajouter_marque">Les champs marqués d'une étoile * sont oligatoires</p>
    <form action="index.php?action=suppUtilisateur" method="post" class="form_sup_user">
        <div class="champs_sup">
            <label for="email_sup">Selectionnez un utilisateur a supprimer via son mail* :</label>
            <select name="email_sup" id="email_sup" required>


                <?php while ($data2 = $Allinfosconnex->fetch()) {
?>
                <option value="<?= $data2['email'] ?>"><?= $data2['email'] ?></option>
                <?php 
}$Allinfosconnex->closeCursor();
?>
            </select>
        </div>
        <input type="submit" class="submit_sup_utilisateur" value="Envoyer">
    </form>
    <button class="fermer_cadre_sup_user">Fermer</button>
</section>

<section class="cadre_gerer_avis">
    <h4 class="h4_sup_marque">Gérer les avis:</h4>
    <div class="titre_avis_OK_NOK">
        <h5 class="titre_OK">Les avis OK :</h5>
        <h5 class="titre_NOK">Les avis not OK:</h5>
    </div>
    <div class="tous_avis_OK_NOK">
        <ul class="avisOK">
            <?php while ($dataAvis = $avisOK->fetch()) { ?>
            <li class="un_avis_a_gerer">
                <p><em>Avis pour la marque : </em><?= $dataAvis["marque_assoc"] ?>
                    <br>
                    <em>Note : </em><?= $dataAvis["note_avis"] ?>
                    <br>
                    <em>Laissé par :
                    </em><?php if ($dataAvis["nomprenom_avis"] != "") { ?>
                    <?= $dataAvis["nomprenom_avis"] ?>
                    <?php } else { ?>
                    La personne n'a pas laissé de nom
                    <?php } ?>
                    <br>
                    <em>Message :
                    </em><?php if ($dataAvis["msg_avis"] != "") { ?>
                    <?= $dataAvis["msg_avis"] ?>
                    <?php } else { ?>
                    La personne n'a pas laissé de message
                    <?php } ?>
                    <br>
                    <em>Laissé le : </em><?= $dataAvis["date_publi_avis"] ?>
                    <br>
                </p>
                <div class="btn_invalid_avis">
                    <a href="index.php?action=deOKaNOK&amp;marqueM=<?= $dataAvis['marque_assoc'] ?>&amp;id=<?= $dataAvis['id'] ?>">
                        Invalider l'avis</a>
                </div>
            </li>
            <?php
            }$avisOK->closeCursor();
?>

        </ul>

        <ul class="avisNOK">
            <?php while ($dataAvis = $avisNOK->fetch()) { ?>
            <li class="un_avis_a_gerer">
                <p><em>Avis pour la marque : </em><?= $dataAvis["marque_assoc"] ?>
                    <br>
                    <em>Note : </em><?= $dataAvis["note_avis"] ?>
                    <br>
                    <em>Laissé par :
                    </em><?php if ($dataAvis["nomprenom_avis"] != "") { ?>
                    <?= $dataAvis["nomprenom_avis"] ?>
                    <?php } else { ?>
                    La personne n'a pas laissé de nom
                    <?php } ?>
                    <br>
                    <em>Message :
                    </em><?php if ($dataAvis["msg_avis"] != "") { ?>
                    <?= $dataAvis["msg_avis"] ?>
                    <?php } else { ?>
                    La personne n'a pas laissé de message
                    <?php } ?>
                    <br>
                    <em>Laissé le : </em><?= $dataAvis["date_publi_avis"] ?>
                    <br>
                </p>
                <div class="btn_revalid_avis">
                    <a href="index.php?action=deNOKaOK&amp;marqueM=<?= $dataAvis['marque_assoc'] ?>&amp;id=<?= $dataAvis['id'] ?>">Revalider l'avis</a>
                </div>
            </li>

            <?php
            }$avisNOK->closeCursor();
?>
        </ul>
        <button class="fermer_cadre_gerer_com">Fermer</button>
    </div>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
