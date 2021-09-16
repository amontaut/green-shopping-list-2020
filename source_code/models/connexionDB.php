<?php

class connexionDB {
    //etabli la connexion avec la DB
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=dbs572592;charset=utf8', 'root', 'root');
        return $db;
    }
}
