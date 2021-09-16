class Map {
    constructor(macarte, iconeMarches) {
        this.macarte = macarte;
        this.iconeMarches = iconeMarches;
    }

    initMap() {
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        this.macarte = L.map('carte').setView([48.860436, 2.338596], 14); //Le dernier chiffre correspond au zoom par default sur la carte

        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(this.macarte);
    }

    affichageMARCHES(infoMarches) { //Affichage des données de chaque station
        //TOUTES LES DONNÉES
        //console.log(infoMarches);
        //console.log(infoMarches.id_marche); //peut etre pas necessaire
        //console.log(infoMarches.nom_court);

        //ATTENTION : a partir de là tous les champs ne sont pas obligatoires donc certains marchés n'ont pas certaines données donc undefined normalement et d'autres oui

        //console.log(infoMarches.nom_long);
        //console.log(infoMarches.produit); //can be : alimentaire, alimentaire bio, fleurs, oiseaux, timbres, puces, brocantes, création artistique
        //console.log(infoMarches.ardt); //arrondissement
        //console.log(infoMarches.localisation); //petit text sur où c'est un peu en détail
        //console.log(infoMarches.jours_tenue);
        //Jours de la semaine : 1 pour le marché a lieu et 0 pour non
        //console.log(infoMarches.lundi);
        //console.log(infoMarches.mardi);
        //console.log(infoMarches.mercredi);
        //console.log(infoMarches.jeudi);
        //console.log(infoMarches.vendredi);
        //console.log(infoMarches.samedi);
        //console.log(infoMarches.dimanche);
        //console.log(infoMarches.h_deb_sem_1);
        //console.log(infoMarches.h_fin_sem_1);
        //console.log(infoMarches.h_deb_sam);
        //console.log(infoMarches.h_fin_sam);
        //console.log(infoMarches.h_deb_dim);
        //console.log(infoMarches.h_fin_dim);
        //console.log(infoMarches.gestionnaire);
        //console.log(infoMarches.lineaire); //m de lineraire
        //console.log(infoMarches.geo_point_2d[0]); // = 48... donc LAT
        //console.log(infoMarches.geo_point_2d[1]);  // = 2... donc LON
        //il existe aussi des coordonnées avec 4 points 

        //OU AVEC UNE VAR
        //var LAT = (infoMarches.geo_point_2d[0]);
        //console.log(LAT);
    
        //icone des pin
        this.iconeMarches = L.icon({
            iconUrl: "global/images/pinmarches.png",
            iconSize: [31, 50], //[lxL]
        });
        
        var markers = L.layerGroup();
        
        var marker = L.marker([(infoMarches.geo_point_2d[0]), (infoMarches.geo_point_2d[1])], { icon: this.iconeMarches }).addTo(this.macarte);

       
        //Txt et affichage du popup a chaque marker
        //Creation de la div qui engloble le txt du popup
        var container_marche = $('<div class="markermarche"/>');

        //au click sur le bouton dans le marker
        container_marche.on('click', '.plusdetailmarche', function () {
            document.getElementsByClassName('detail_marker_marche')[0].style.display = "block";
            document.getElementsByClassName('jours_tenue')[0].innerHTML = ("Jour(s) de tenue : " + infoMarches.jours_tenue);
            document.getElementsByClassName('localisation_marche')[0].innerHTML = ("Indications sur le lieux où se tient le marché : " + infoMarches.nom_long + ", Paris " + infoMarches.ardt + " (" + (infoMarches.localisation) + ")");

            document.getElementsByClassName('type_produits')[0].innerHTML = ("Type de produits vendus à ce marché : " + infoMarches.produit);
            
            $('html,body').animate({
                scrollTop: $(".detail_marker_marche").offset().top - 100
            }, 'slow');

            if (infoMarches.lundi == 1 || infoMarches.mardi == 1 || infoMarches.mercredi == 1 || infoMarches.jeudi == 1 || infoMarches.vendredi == 1) {
                document.getElementsByClassName('marche_open_sem')[0].innerHTML = ("Heure d'ouverture du lundi au vendredi : " + infoMarches.h_deb_sem_1);
                document.getElementsByClassName('marche_close_sem')[0].innerHTML = ("Heure de fermeture du lundi au vendredi : " + infoMarches.h_fin_sem_1);
            } else if (infoMarches.samedi == 1) {
                document.getElementsByClassName('marche_open_sam')[0].innerHTML = ("Heure d'ouverture le samedi : " + infoMarches.h_deb_sam);
                document.getElementsByClassName('marche_close_sam')[0].innerHTML = ("Heure de fermeture le samedi : " + infoMarches.h_fin_sam);
            } else if (infoMarches.samedi == 1) {
                document.getElementsByClassName('marche_open_dim')[0].innerHTML = ("Heure d'ouverture le dimanche : " + infoMarches.h_deb_dim);
                document.getElementsByClassName('marche_close_dim')[0].innerHTML = ("Heure de fermeture le dimanche : " + infoMarches.h_fin_dim);
            }
        });

        //A ecrire dans le popup
        container_marche.html("Marché " + infoMarches.nom_court + ", ouvert le/les jour(s) suivant(s) : " + infoMarches.jours_tenue + "<br> - <button class='plusdetailmarche'>En savoir plus</button>");
        
        marker.bindPopup(container_marche[0]);
    }

    ajaxGetMARCHE(affichageMARCHES) {
        var requestURL = 'https://opendata.paris.fr/api/records/1.0/search/?dataset=marches-decouverts&q=&rows=3000&facet=produit&facet=ardt&facet=jours_tenue&facet=lundi&facet=mardi&facet=mercredi&facet=jeudi&facet=vendredi&facet=samedi&facet=dimanche&facet=secteur&facet=gestionnaire';
        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';
        var _this = this;
        request.onload = function () {
            var stations = request['response']['records'];
            for (var i = 0; i < stations.length; i++) {
                _this.affichageMARCHES(stations[i]['fields']);
            }
            //console.log(stations);
        }

        request.send();
    }
}

let map = new Map();
map.initMap();
map.ajaxGetMARCHE();
