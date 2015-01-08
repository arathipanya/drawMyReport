 <?php

require_once 'Framework/Modele.php';

class Report extends Modele {

    public function getReports() {
        $sql = 'SELECT * FROM drawmyreport_reports;';
        $reports = $this->executerRequete($sql);
        return $reports;
    }

	/*
    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }
    */
}