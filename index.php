file : index.php
<?php

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante
       //require_once './modules/drawMyReport/Framework/Routeur.php';
require './modules/drawMyReport/Config/globals.php';
require './modules/drawMyReport/Framework/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();
echo "---OK---";

?>