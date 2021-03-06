<?php

require_once './modules/drawMyReport/Framework/Configuration.php';

abstract class Modele {

    /** Objet PDO d'accès à la BD 
        Statique donc partagé par toutes les instances des classes dérivées */
    private static $bdd;

    /**
     * Exécute une requête SQL
     * 
     * @param string $sql Requête SQL
     * @param array $params Paramètres de la requête
     * @return PDOStatement Résultats de la requête
     */
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = self::getBdd()->prepare($sql);   // exécution directe
	    $resultat->execute();
        }
        else {
            $resultat = self::getBdd($params)->prepare($sql); // requête préparée
            $resultat->execute();
        }
	return $resultat;
    }

    protected function lastInsertId() {
      return self::getBdd()->lastInsertId();
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     * 
     * @return PDO Objet PDO de connexion à la BDD
     */
    private static function getBdd($otherBdd = null) {
        global $conf_centreon;

        //if (!$otherBdd || self::$bdd === null) {
	if ($otherBdd == null) {
            // Récupération des paramètres de configuration BD
	  $dsn = "mysql:host=".$conf_centreon["hostCentreon"].";dbname=".$conf_centreon["db"].";charset=utf8";
	  $login = $conf_centreon["user"];
	  $mdp = $conf_centreon["password"];
            // Création de la connexion
	  self::$bdd = new PDO($dsn, $login, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } else {
	  $dsn = "mysql:host=".$conf_centreon["hostCentstorage"].";dbname=".$conf_centreon["dbcstg"].";charset=utf8";
	  $login = $conf_centreon["user"];
	  $mdp = $conf_centreon["password"];
	  self::$bdd = new PDO($dsn, $login, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
        return self::$bdd;
    }

}
