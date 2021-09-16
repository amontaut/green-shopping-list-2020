# green-shopping-list-2020

In this repo you will find a website that makes it easier for you to find ways to act for our planet. You can find more than 70 brands that act everyday to protect our planet, but also where to throw/recycle different type of wastes. I completed this project on July 13, 2020.

The main features are : 

- Front end : 
  - Each brand and theirs infos are displayed on a specific page
  - Anyone can write a review about a brand and everyone can see it
  - Anyone can create an account (with email and password) and add/delete any brands to its favorite, change his/her password
  - "Forgotten password" feature to reset the password thanks to PhpMailer
- Back end : 
  - the admin can add a brand to the catalog, modify or delete it
  - the admin can delete a user account
- 3 sets of datas from the Paris Data's API :
  - https://opendata.paris.fr/explore/dataset/dechets-menagers-points-dapport-volontaire-conteneur-textile/information/?disjunctive.operateur&disjunctive.code_postal&disjunctive.type
  - https://opendata.paris.fr/explore/dataset/tri-mobile0/information/
  - https://opendata.paris.fr/explore/dataset/dechets-menagers-points-dapport-volontaire-composteurs/information/?disjunctive.operateur&disjunctive.code_postal&disjunctive.type
- Leaflet map https://leafletjs.com where you can filter the pins you want to display
- Object-oriented programming
- Responsive of course
- MVC (model, view, controller) pattern
- Basic security stuff (password hashed, XSS flaw, SQL injections)
- Contact form (PhpMailer)

In this repo, you will find : 
- export.sql : the database
- source_code : where all the source code is
- Prez-fr.pdf : presentation of the website in french 🥖

The website was once hosted but isn't anymore 🤡

![GitHub repo size](https://img.shields.io/github/repo-size/amontaut/green-shopping-list-2020)
