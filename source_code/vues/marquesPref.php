<?php $title = "Mes marques préférées - L'annuaire éco-responsable"; ?>

<?php ob_start(); ?>

<section class="titre_page_vetements">
    <h3>Retrouvez ici les marques que vous avez mis dans vos favoris.</h3>
    <p class="introtxt_page_fav">Toutes les marques que vous avez mis dans vos favoris se trouvent ici et sont classées par catégories. Certaines marques vendent des produits dans plusieurs de ces catégories, et seront donc par conséquent listées dans chacunes d'elles.</p>
</section>

<section class="toutes_vetement_pref">
    <h4 class="titre_marques_fav"><i class="fas fa-tshirt"></i> Mes marques de vêtements préférées : </h4>
    <ul class="liste_marques_fav">
        <?php while ($datavetements = $vetementfav->fetch()) { ?>
        <li>
            <div class="une_colonne">
                <div class="un_vetementsfav">
                    <p class="id_marque_fav">
                        <img src="<?= $datavetements["logo"] ?>" alt="Logo <?= $datavetements["marque_fav"] ?>">
                        <?= $datavetements["marque_fav"] ?>
                    </p>
                    <div class="btn_marques_fav">
                        <a href="<?= $datavetements["site_internet"] ?>">Site de la marque</a>
                        <a class="btn_supp_fav" href="index.php?action=SuppDansFav&amp;marque_fav=<?= $datavetements['marque_fav'] ?>">Supprimer la marque de mes favoris <i class="fas fa-times"></i></a>
                    </div>
                    <div class="aPropos_fav">
                        <p><?= $datavetements["petite_desc"] ?></p>
                    </div>
                </div>
            </div>
        </li>
        <?php 
}$vetementfav->closeCursor();
?>
    </ul>
</section>


<section class="toutes_SDB_pref">
    <h4 class="titre_marques_fav"><i class="fas fa-pump-soap"></i> Mes marques de cosmétiques et salle de bain préférées : </h4>
    <ul class="liste_marques_fav">
        <?php while ($dataSDB = $SDBfav->fetch()) { ?>
        <li>
            <div class="une_colonne">
                <div class="un_vetementsfav">
                    <p class="id_marque_fav">
                        <img src="<?= $dataSDB["logo"] ?>" alt="Logo <?= $dataSDB["marque_fav"] ?>">
                        <?= $dataSDB["marque_fav"] ?>
                    </p>
                    <div class="btn_marques_fav">
                        <a href="<?= $dataSDB["site_internet"] ?>">Site de la marque</a>
                        <a class="btn_supp_fav" href="index.php?action=SuppDansFav&amp;marque_fav=<?= $dataSDB['marque_fav'] ?>">Supprimer la marque de mes favoris <i class="fas fa-times"></i></a>
                    </div>
                    <div class="aPropos_fav">
                        <p><?= $dataSDB["petite_desc"] ?></p>
                    </div>
                </div>
            </div>
        </li>
        <?php 
}$SDBfav->closeCursor();
?>
    </ul>
</section>


<section class="toutes_Maison_pref">
    <h4 class="titre_marques_fav"><i class="fas fa-coffee"></i> Mes marques préférées pour la maison et la cuisine : </h4>
    <ul class="liste_marques_fav">
        <?php while ($dataMaison = $maisonfav->fetch()) { ?>
        <li>
            <div class="une_colonne">
                <div class="un_vetementsfav">
                    <p class="id_marque_fav">
                        <img src="<?= $dataMaison["logo"] ?>" alt="Logo <?= $dataMaison["marque_fav"] ?>">
                        <?= $dataMaison["marque_fav"] ?>
                    </p>
                    <div class="btn_marques_fav">
                        <a href="<?= $dataMaison["site_internet"] ?>">Site de la marque</a>
                        <a class="btn_supp_fav" href="index.php?action=SuppDansFav&amp;marque_fav=<?= $dataMaison['marque_fav'] ?>">Supprimer la marque de mes favoris <i class="fas fa-times"></i></a>
                    </div>
                    <div class="aPropos_fav">
                        <p><?= $dataMaison["petite_desc"] ?></p>
                    </div>
                </div>
            </div>
        </li>
        <?php 
}$maisonfav->closeCursor();
?>
    </ul>
</section>

<section class="toutes_Enfants_pref">
    <h4 class="titre_marques_fav"><i class="fas fa-child"></i> Mes marques pour enfants préférées : </h4>
    <ul class="liste_marques_fav">
        <?php while ($dataEnfants = $enfantsfav->fetch()) { ?>
        <li>
            <div class="une_colonne">
                <div class="un_vetementsfav">
                    <p class="id_marque_fav">
                        <img src="<?= $dataEnfants["logo"] ?>" alt="Logo <?= $dataEnfants["marque_fav"] ?>">
                        <?= $dataEnfants["marque_fav"] ?>
                    </p>
                    <div class="btn_marques_fav">
                        <a href="<?= $dataEnfants["site_internet"] ?>">Site de la marque</a>
                        <a class="btn_supp_fav" href="index.php?action=SuppDansFav&amp;marque_fav=<?= $dataEnfants['marque_fav'] ?>">Supprimer la marque de mes favoris <i class="fas fa-times"></i></a>
                    </div>
                    <div class="aPropos_fav">
                        <p><?= $dataEnfants["petite_desc"] ?></p>
                    </div>
                </div>
            </div>
        </li>
        <?php 
}$enfantsfav->closeCursor();
?>
    </ul>
</section>


<section class="toutes_Animaux_pref">
    <h4 class="titre_marques_fav"><i class="fas fa-paw"></i> Mes marques pour animaux de compagnie préférées : </h4>
    <ul class="liste_marques_fav">
        <?php while ($dataAnimaux = $animauxfav->fetch()) { ?>
        <li>
            <div class="une_colonne">
                <div class="un_vetementsfav">
                    <p class="id_marque_fav">
                        <img src="<?= $dataAnimaux["logo"] ?>" alt="Logo <?= $dataAnimaux["marque_fav"] ?>">
                        <?= $dataAnimaux["marque_fav"] ?>
                    </p>
                    <div class="btn_marques_fav">
                        <a href="<?= $dataAnimaux["site_internet"] ?>">Site de la marque</a>
                        <a class="btn_supp_fav" href="index.php?action=SuppDansFav&amp;marque_fav=<?= $dataAnimaux['marque_fav'] ?>">Supprimer la marque de mes favoris <i class="fas fa-times"></i></a>
                    </div>
                    <div class="aPropos_fav">
                        <p><?= $dataAnimaux["petite_desc"] ?></p>
                    </div>
                </div>
            </div>
        </li>
        <?php 
}$animauxfav->closeCursor();
?>
    </ul>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
