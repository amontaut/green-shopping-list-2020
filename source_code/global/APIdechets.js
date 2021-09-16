class Map {
    constructor(macarte, iconeLeRelai, iconeCompost, iconetrimobile) {
        this.macarte = macarte;
        this.iconeLeRelai = iconeLeRelai;
        this.iconeCompost = iconeCompost;
        this.iconetrimobile = iconetrimobile;
    }

    initMap() {
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        this.macarte = L.map('carte').setView([48.860436, 2.338596], 14); //Le dernier chiffre correspond au zoom par default sur la carte

        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(this.macarte);
    }
    

    //////
    //////
    //////                           LE RELAI ETC
    //////
    //////

    affichageLERELAIetc(infoLeRelai) { //Affichage des données de chaque station
        //TOUTES LES DONNÉES
        //console.log(infoLeRelai);
        //console.log(infoLeRelai.adresse);
        //console.log(infoLeRelai.code_postal);
        //console.log(infoLeRelai.geo_point_2d[0]); // = 48... donc LAT
        //console.log(infoLeRelai.geo_point_2d[1]);  // = 2... donc LON
        //console.log(infoLeRelai.operateur);
        //console.log(infoLeRelai.type); //2espace tri, sinon tjrs espace public

        //OU AVEC UNE VAR
        //var LAT = (infoLeRelai.geo_point_2d[0]);
        //console.log(LAT);
        this.iconeLeRelai = L.icon({
            iconUrl: "global/images/pinlerelai.png",
            iconSize: [31, 50], //[lxL]
        });

        var markers = L.layerGroup();
        var marker = L.marker([(infoLeRelai.geo_point_2d[0]), (infoLeRelai.geo_point_2d[1])], {
                icon: this.iconeLeRelai
            })
            .addTo(this.macarte);
        markers.addLayer(marker);

        document.querySelectorAll('.visible').forEach(e => e.addEventListener('click', event => {
            if (document.getElementById('affichage_vetement').checked == true) {
                var markers = L.layerGroup();
                markers.addTo(this.macarte);
                markers.addLayer(marker);
            } else {
                this.macarte.removeLayer(marker);
            }
        }))



        //Txt et affichage du popup a chaque marker
        //Creation de la div qui engloble le txt du popup
        var container_vetement = $('<div class="markerlerelai"/>');

        //au click sur le bouton dans le marker
        container_vetement.on('click', '.plusdetaillerelai', function () {
            document.getElementsByClassName('detail_marker_lerelai')[0].style.display = "block";
            document.getElementsByClassName('adresse_vetement')[0].innerHTML = ("Adresse : " + infoLeRelai.adresse + ", " + infoLeRelai.code_postal + " Paris");
            document.getElementsByClassName('operateur_vetement')[0].innerHTML = ("Ce point de collecte est mis à disposition grâce à l'organisme suivant : " + infoLeRelai.operateur + ".");
            $('html,body').animate({
                scrollTop: $(".detail_marker_lerelai").offset().top - 100
            }, 'slow');
        });

        //A ecrire dans le popup
        container_vetement.html("Donner ses vêtements et accessoires - " + infoLeRelai.adresse + " - <button class='plusdetaillerelai'>En savoir plus</button>");
        //OU
        //container_vetement.append($('<span class="bold">').text(" :)"))

        // On met notre txt dans la popup
        marker.bindPopup(container_vetement[0]);


    }

    ajaxGetLERELAIETC(affichageLERELAIetc) {
        var requestURL = 'https://opendata.paris.fr/api/records/1.0/search/?dataset=dechets-menagers-points-dapport-volontaire-conteneur-textile&q=&rows=3000&facet=operateur&facet=code_postal&facet=type';
        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';
        var _this = this;
        request.onload = function () {
            var stations = request['response']['records'];
            for (var i = 0; i < stations.length; i++) {
                _this.affichageLERELAIetc(stations[i]['fields']);
            }
            //console.log(stations);

            var longueur = 0;
            for (var key in stations) {
                if (stations.hasOwnProperty(key)) {
                    longueur += 1;
                }
            }
            document.getElementsByClassName('nb_conteneur')[0].innerHTML = longueur;

        }

        request.send();


    }

    //////
    //////
    ////// FIN LE RELAI ETC
    //////
    //////

    //________________________________________________________

    //////
    //////
    //////                                  COMPOSTEURS
    //////
    ////// 

    affichageCOMPOSTEURS(infoCompost) { //Affichage des données de chaque station
        //TOUTES LES DONNÉES
        //console.log(infoCompost);
        //console.log(infoCompost.adresse);
        //console.log(infoCompost.code_postal);
        //console.log(infoCompost.geo_point_2d[0]); // = 48... donc LAT
        //console.log(infoCompost.geo_point_2d[1]);  // = 2... donc LON
        //console.log(infoCompost.operateur);
        //console.log(infoCompost.type); //Que espace public mais des fois que ca change ...

        //OU AVEC UNE VAR
        //var LAT = (infoCompost.geo_point_2d[0]);
        //console.log(LAT);
        //var marker = L.marker([(infoCompost.geo_point_2d[0]), (infoCompost.geo_point_2d[1])]).addTo(this.macarte);
        this.iconeCompost = L.icon({
            iconUrl: "global/images/pincompost.png",
            iconSize: [31, 50], //[lxL]
        });

        var markers = L.layerGroup();
        var marker = L.marker([(infoCompost.geo_point_2d[0]), (infoCompost.geo_point_2d[1])], {
                icon: this.iconeCompost
            })
            .addTo(this.macarte);
        markers.addLayer(marker);

        document.querySelectorAll('.visible').forEach(e => e.addEventListener('click', event => {
            if (document.getElementById('affichage_composteurs').checked == true) {
                var markers = L.layerGroup();
                markers.addTo(this.macarte);
                markers.addLayer(marker);
            } else {
                this.macarte.removeLayer(marker);
            }
        }))


        //Txt et affichage du popup a chaque marker
        //Creation de la div qui engloble le txt du popup
        var container_composteur = $('<div class="markercomposteur"/>');

        //au click sur le bouton dans le marker
        container_composteur.on('click', '.plusdetailcomposteur', function () {
            document.getElementsByClassName('detail_marker_composteur')[0].style.display = "block";
            document.getElementsByClassName('adresse_composteur')[0].innerHTML = ("Adresse : " + infoCompost.adresse + ", " + infoCompost.code_postal + " Paris");
            document.getElementsByClassName('operateur_composteur')[0].innerHTML = ("Ce composteur est mis à disposition grâce à l'organisme suivant : " + infoCompost.operateur + ".");
            $('html,body').animate({
                scrollTop: $(".detail_marker_composteur").offset().top - 100
            }, 'slow');

        });

        //A ecrire dans le popup
        container_composteur.html("Composteur - " + infoCompost.adresse + " - <button class='plusdetailcomposteur'>En savoir plus</button>");
        //OU
        //container_composteur.append($('<span class="bold">').text(" :)"))

        // On met notre txt dans la popup
        marker.bindPopup(container_composteur[0]);


    }

    ajaxGetCOMPOSTEUR(affichageCOMPOSTEURS) {
        var requestURL = 'https://opendata.paris.fr/api/records/1.0/search/?dataset=dechets-menagers-points-dapport-volontaire-composteurs&q=&rows=3000&facet=operateur&facet=code_postal&facet=type';
        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';
        var _this = this;
        request.onload = function () {
            var stations = request['response']['records'];
            for (var i = 0; i < stations.length; i++) {
                _this.affichageCOMPOSTEURS(stations[i]['fields']);
            }
            //console.log(stations);
            var longueur = 0;
            for (var key in stations) {
                if (stations.hasOwnProperty(key)) {
                    longueur += 1;
                }
            }
            document.getElementsByClassName('nb_composteur')[0].innerHTML = longueur;
        }

        request.send();
    }

    //////
    //////
    ////// FIN COMPOSTEURS
    //////
    ////// 

    //________________________________________________________

    //////
    //////
    //////                                      TRIMOBILE
    //////
    //////

    affichageTRIMOBILE(infoTriMobile) { //Affichage des données de chaque station

        //TOUTES LES DONNEES
        //console.log(infoTriMobile);
        // OUI //console.log(infoTriMobile.adresse);
        // OUI //console.log(infoTriMobile.code_postal);
        // OUI  //console.log(infoTriMobile.horaires); //Que de 9-13h, peut changer so a laisser 
        // OUI  //console.log(infoTriMobile.jours_de_tenue); 
        //console.log(infoTriMobile.pays); //Que FR donc inutile
        //console.log(infoTriMobile.type); //Que triMobile mais peut etre utile
        // OUI //console.log(infoTriMobile.ville); //Que paris mais peut changer so a laisser
        //console.log(infoTriMobile.xy[0]); // = 48... donc LAT
        //console.log(infoTriMobile.xy[1]); // = 2... donc LON

        //OU AVEC UNE VAR
        //var CP = infoTriMobile.code_postal;
        //console.log(CP);

        
        this.iconetrimobile = L.icon({
            iconUrl: "global/images/pintrimobile.png",
            iconSize: [31, 50], //[lxL]
        });

        var markers = L.layerGroup();
        var marker = L.marker([(infoTriMobile.xy[0]), (infoTriMobile.xy[1])], {
                icon: this.iconetrimobile
            })
            .addTo(this.macarte);
        markers.addLayer(marker);

        document.querySelectorAll('.visible').forEach(e => e.addEventListener('click', event => {
            if (document.getElementById('affichage_trimobile').checked == true) {
                var markers = L.layerGroup();
                markers.addTo(this.macarte);
                markers.addLayer(marker);
            } else {
                this.macarte.removeLayer(marker);
            }
        }))


        //Txt et affichage du popup a chaque marker
        //Creation de la div qui engloble le txt du popup
        var container_trimobile = $('<div class="markertrimobile"/>');

        //au click sur le bouton dans le marker
        container_trimobile.on('click', '.plusdetailtrimobile', function () {
            document.getElementsByClassName('detail_marker_trimobile')[0].style.display = "block";
            document.getElementsByClassName('adresse_trimobile')[0].innerHTML = ("Adresse : " + infoTriMobile.adresse + "<br>" + infoTriMobile.code_postal + ', ' + infoTriMobile.ville);
            document.getElementsByClassName('jours_horaires_trimobile')[0].innerHTML = ("Le tri mobile vous accueil  : " + infoTriMobile.jours_de_tenue + ", " + infoTriMobile.horaires + ".");
            //smooth scrool page dechet - popup vers en savoir +
            $('html,body').animate({
                scrollTop: $(".detail_marker_trimobile").offset().top - 100
            }, 'slow');
        });

        
        //A ecrire dans le popup
        container_trimobile.html("Le tri mobile - " + infoTriMobile.adresse + " - <button class='plusdetailtrimobile'>En savoir plus</button>");
       
        //OU
        //container_composteur.append($('<span class="bold">').text(" :)"))

        // On met notre txt dans la popup
        marker.bindPopup(container_trimobile[0]);

    } //Ferme fct

    ajaxGetTRIMOBILE(affichageTRIMOBILE) {
        var requestURL = 'https://opendata.paris.fr/api/records/1.0/search/?dataset=tri-mobile0&q=&rows=3000&facet=code_postal&facet=jours_de_tenue';
        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';
        var _this = this;
        request.onload = function () {

            var stations = request['response']['records'];
            for (var i = 0; i < stations.length; i++) {
                _this.affichageTRIMOBILE(stations[i]['fields']);
            }
            //console.log(stations);
            
            var longueur = 0;
            for (var key in stations) {
                if (stations.hasOwnProperty(key)) {
                    longueur += 1;
                }
            }
            
        }

        request.send();
    }

    //////
    //////
    ////// FIN TRIMOBILE
    //////
    ////// 


}

let map = new Map();
map.initMap();
map.ajaxGetTRIMOBILE();
map.ajaxGetLERELAIETC();
map.ajaxGetCOMPOSTEUR();
