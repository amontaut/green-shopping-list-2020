class Global {
    constructor() {}

    general() {

        //smooth scrool
        document.querySelectorAll('.fa-angle-double-down').forEach(e => e.addEventListener('click', event => {
            $('html,body').animate({
                scrollTop: $(".section_vetements").offset().top
            }, 'slow');
        }));


        //afficher cadre connexion
        document.querySelectorAll('.btn_co').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_co')[0].style.display = "flex";
        }));

        //fermer cadre connexion
        document.querySelectorAll('.fermer_co').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_co')[0].style.display = "none";
            document.getElementsByTagName('body')[0].style.background = "none";
        }));

        //pour afficher le cadre de connexion quand sur page acces refusé 
        document.querySelectorAll('.affiche_connexion').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_co')[0].style.display = "flex";
        }));

        //afficher cadre créer un compte
        document.querySelectorAll('.creer_compte').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_nvx_compte')[0].style.display = "block";
        }));

        //concordance des email quand creation d'un compte 
        document.querySelectorAll('#confirm_nvx_compte_mail').forEach(e => e.addEventListener('keyup', event => {
            if (document.getElementById('nvx_compte_mail').value == document.getElementById('confirm_nvx_compte_mail').value) {
                document.getElementsByClassName('nvx_compte')[0].style.display = "none";
                document.getElementsByClassName('email_nvx_compte_differents')[0].style.display = "none";
            } else {
                document.getElementsByClassName('nvx_compte')[0].style.display = "none";
                document.getElementsByClassName('email_nvx_compte_differents')[0].style.display = "block";
            }
        }));

        //concordance des mdp quand creation d'un compte 
        document.querySelectorAll('#confirm_nvx_compte_mdp').forEach(e => e.addEventListener('keyup', event => {
            if (document.getElementById('nvx_compte_mdp').value == document.getElementById('confirm_nvx_compte_mdp').value) {
                document.getElementsByClassName('nvx_compte')[0].style.display = "none";
                document.getElementsByClassName('mdp_nvx_compte_differents')[0].style.display = "none";
            } else {
                document.getElementsByClassName('nvx_compte')[0].style.display = "none";
                document.getElementsByClassName('mdp_nvx_compte_differents')[0].style.display = "block";
            }
        }));

        document.querySelectorAll('#confirm_nvx_compte_mdp').forEach(e => e.addEventListener('keyup', event => {
            if ((document.getElementById('nvx_compte_mdp').value == document.getElementById('confirm_nvx_compte_mdp').value) && (document.getElementById('nvx_compte_mail').value == document.getElementById('confirm_nvx_compte_mail').value)) {
                document.getElementsByClassName('nvx_compte')[0].style.display = "flex";
            } else {
                document.getElementsByClassName('nvx_compte')[0].style.display = "none";
            }
        }))

        //fermer cadre créer un compte
        document.querySelectorAll('.fermer_nvx_compte').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_nvx_compte')[0].style.display = "none";
            document.getElementsByClassName('cadre_co')[0].style.display = "none";
            document.getElementsByTagName('body')[0].style.background = "none";
        }));

        //pour afficher le cadre créer un compte quand sur page acces refusé 
        document.querySelectorAll('.affiche_inscription').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_nvx_compte')[0].style.display = "block";
        }));



        //afficher cadre mdp oublié
        document.querySelectorAll('.btn_mdp_oublie').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_mdp_oublie')[0].style.display = "flex";
            document.getElementsByClassName('cadre_co')[0].style.display = "none";
        }));

        //ferme cadre mdp oublié
        document.querySelectorAll('.fermer_mdp_oublie').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_mdp_oublie')[0].style.display = "none";
            document.getElementsByClassName('cadre_co')[0].style.display = "flex";
        }));




        //afficher cadre changer de mot de passe
        document.querySelectorAll('.changer_mdp').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_changement_mdp')[0].style.display = "flex";
        }));

        //concordance des mdp pour changement de mdp
        document.querySelectorAll('#confirmer_nvx_mdp').forEach(e => e.addEventListener('keyup', event => {
            if (document.getElementById('nvx_mdp').value == document.getElementById('confirmer_nvx_mdp').value) {
                document.getElementsByClassName('valider_changement_mdp')[0].style.display = "block";
                document.getElementsByClassName('mdp_differents')[0].style.display = "none";
            } else {
                document.getElementsByClassName('valider_changement_mdp')[0].style.display = "none";
                document.getElementsByClassName('mdp_differents')[0].style.display = "block";
            }
        }));

        //ferme cadre changer de mot de passe
        document.querySelectorAll('.fermer_changer_mdp').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_changement_mdp')[0].style.display = "none";
        }));





        //Ferme cadre info des marker
        document.querySelectorAll('.fermer_detail_lerelai').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('detail_marker_lerelai')[0].style.display = "none";
            $('html, body').animate({
                scrollTop: $('.expl_memo_tri').offset().top - 500
            }, 'slow');

        }));

        document.querySelectorAll('.fermer_detail_composteur').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('detail_marker_composteur')[0].style.display = "none";
            $('html, body').animate({
                scrollTop: $('.expl_memo_tri').offset().top - 500
            }, 'slow');

        }));

        document.querySelectorAll('.fermer_detail_trimobile').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('detail_marker_trimobile')[0].style.display = "none";
            $('html, body').animate({
                scrollTop: $('.expl_memo_tri').offset().top - 500
            }, 'slow');
        }));

        document.querySelectorAll('.fermer_detail_marker').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('detail_marker_marche')[0].style.display = "none";
            $('html, body').animate({
                scrollTop: $('.calendrier_fl').offset().top - 500
            }, 'slow');
        }));

        /*apparition des marques au scroll*/
        $(window).scroll(function () {
            var scrolledFromTop = $(window).scrollTop() + $(window).height();
            $(".appear").each(function () {
                var distanceFromTop = $(this).offset().top;
                if (scrolledFromTop >= distanceFromTop + 50) {
                    var delaiAnim = $(this).data("delai");
                    $(this).delay(delaiAnim).animate({
                        top: 0,
                        opacity: 1
                    });
                }
            });
        });

        //apparition du form pour laisser un avis
        document.querySelectorAll('.btn_laisser_avis').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('laisser_avis')[0].style.display = "block";
        }))

        //disparition du form pour laisser un avis
        document.querySelectorAll('.fermer_form_laisser_avis').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('laisser_avis')[0].style.display = "none";
        }))

        //pas d'ombre sur le bouton laisser form s'il apparait
        document.querySelectorAll('.btn_laisser_avis').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('btn_laisser_avis')[0].style.boxShadow = "none";

        }))

        document.querySelectorAll('.fermer_form_laisser_avis').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('btn_laisser_avis')[0].style.boxShadow = "black 3px 3px";

        }))
        document.querySelectorAll('.submit_avis').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('btn_laisser_avis')[0].style.boxShadow = "black 3px 3px";

        }))

        //affichage cadre ajouter une marque espace admin + smooth scrool 
        document.querySelectorAll('.btn_ajout_marque').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_ajouter_une_marque')[0].style.display = "block";
            $('html, body').animate({
                scrollTop: $('.cadre_ajouter_une_marque').offset().top - 150
            }, 'slow');

        }))

        //pour fermer le cadre
        document.querySelectorAll('.fermer_cadre_ajout_marque').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_ajouter_une_marque')[0].style.display = "none";

        }))
        
        //affichage cadre modif une marque espace admin + smooth scrool 
        document.querySelectorAll('.btn_modif_marque').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_modif_une_marque')[0].style.display = "block";
            $('html, body').animate({
                scrollTop: $('.cadre_modif_une_marque').offset().top - 150
            }, 'slow');

        }))

        //pour fermer le cadre
        document.querySelectorAll('.fermer_cadre_modif_marque').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_modif_une_marque')[0].style.display = "none";

        }))


        //affichage cadre sup une marque espace admin + smooth scrool 
        document.querySelectorAll('.btn_supp_marque').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_sup_marque')[0].style.display = "block";
            $('html, body').animate({
                scrollTop: $('.cadre_sup_marque').offset().top - 150
            }, 'slow');

        }))

        //pour fermer le cadre
        document.querySelectorAll('.fermer_cadre_sup_marque').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_sup_marque')[0].style.display = "none";

        }))

        //affichage cadre sup un user espace admin + smooth scrool 
        document.querySelectorAll('.btn_supp_user').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_gerer_users')[0].style.display = "block";
            $('html, body').animate({
                scrollTop: $('.cadre_gerer_users').offset().top - 150
            }, 'slow');

        }))

        //pour fermer le cadre
        document.querySelectorAll('.fermer_cadre_sup_user').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_gerer_users')[0].style.display = "none";

        }))
        
        //affichage cadre gerer les com espace admin + smooth scrool 
        document.querySelectorAll('.btn_gerer_avis').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_gerer_avis')[0].style.display = "block";
            $('html, body').animate({
                scrollTop: $('.cadre_gerer_avis').offset().top - 150
            }, 'slow');

        }))

        //pour fermer le cadre
        document.querySelectorAll('.fermer_cadre_gerer_com').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('cadre_gerer_avis')[0].style.display = "none";

        }))
        
        //afficher avis NOK page admin
        document.querySelectorAll('.titre_NOK').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('avisOK')[0].style.display = "none";
            document.getElementsByClassName('avisNOK')[0].style.display = "block";
            document.getElementsByClassName('titre_OK')[0].style.background = "#808d96";
            document.getElementsByClassName('titre_NOK')[0].style.background = "#BFD2DF";
            document.getElementsByClassName('titre_OK')[0].style.borderBottom = "1px solid black";
            document.getElementsByClassName('titre_NOK')[0].style.borderBottom = "none";

        }))
        
        //afficher avis OK page admin
        document.querySelectorAll('.titre_OK').forEach(e => e.addEventListener('click', event => {
            document.getElementsByClassName('avisOK')[0].style.display = "block";
            document.getElementsByClassName('avisNOK')[0].style.display = "none";
            document.getElementsByClassName('titre_OK')[0].style.background = "#BFD2DF";
            document.getElementsByClassName('titre_NOK')[0].style.background = "#808d96";
            document.getElementsByClassName('titre_OK')[0].style.borderBottom = "none";
            document.getElementsByClassName('titre_NOK')[0].style.borderBottom = "1px solid black";

        }))


        //smooth scrool page dechet
        document.querySelectorAll('.ancre_textile').forEach(e => e.addEventListener('click', event => {
            $('html, body').animate({
                scrollTop: $('.h4_sstitre_textile').offset().top - 300
            }, 'slow');

        }));


        //smooth scrool page dechet
        document.querySelectorAll('.ancre_composte').forEach(e => e.addEventListener('click', event => {
            $('html,body').animate({
                scrollTop: $(".h4_sstitre_composte").offset().top - 300
            }, 'slow');
        }));

        //smooth scrool page dechet
        document.querySelectorAll('.ancre_trimobile').forEach(e => e.addEventListener('click', event => {
            $('html,body').animate({
                scrollTop: $(".h4_sstitre_trimobile").offset().top - 300
            }, 'slow');
        }));

        //smooth scrool page dechet
        document.querySelectorAll('.ancre_memo_tri').forEach(e => e.addEventListener('click', event => {
            $('html,body').animate({
                scrollTop: $(".h4_sstitre_memo_tri").offset().top - 300
            }, 'slow');
        }));

        //smooth scrool page marchés
        document.querySelectorAll('.ancre_calendrier_fl').forEach(e => e.addEventListener('click', event => {
            $('html,body').animate({
                scrollTop: $(".calendrier_fl").offset().top - 100
            }, 'slow');
        }));

        //menu burger
        $(".open-close-btn").on('click touchstart', function (e) {
            // prevent default anchor click 
            e.preventDefault();
            $(".overlay").toggleClass("overlay-open");
            $("#hamburger-icon").toggleClass("hamburger-open");
        });
    }

    //Changement du css du header au scroll
    auscroll() {
        if (window.pageYOffset > 0) {
            document.getElementsByTagName('header')[0].style.position = "fixed";
            document.getElementsByTagName('header')[0].style.boxShadow = "black 0px 2px 13px";
        } else {
            document.getElementsByTagName('header')[0].style.position = "initial";
            document.getElementsByTagName('header')[0].style.boxShadow = "none";
        }
    }

}

let global = new Global();
global.general();
window.onscroll = global.auscroll;
