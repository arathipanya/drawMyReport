 <?php

require_once './modules/drawMyReport/Framework/Modele.php';

class Report extends Modele {

    public function getReports() {
        $sql = 'SELECT * FROM drawmyreport_reports;';
        $reports = $this->executerRequete($sql);
        return $reports;
    }

    public function getGraphs($id) {
      $sql = 'SELECT * FROM drawmyreport_report_graphs INNER JOIN drawmyreport_graphs ON graph_id = drawmyreport_graphs.id WHERE report_id = "'.$id.'";';
      $graphs = $this->executerRequete($sql);
      return $graphs;
    }

    public function getReport($id) {
        $sql = 'SELECT * FROM drawmyreport_reports WHERE id = "'.$id.'";';
        $report = $this->executerRequete($sql);
        return $report;
    }

    public function create($name, $title, $subtitle, $graphs) {
      $sql = 'INSERT INTO drawmyreport_reports (`name`, `title`, `subtitle`) VALUES ("'
	.$name.'", "'.$title.'", "'.$subtitle.'"); SET @lastid = LAST_INSERT_ID();';

      foreach ($graphs as $key => $value) {
	if ($value != "" && $value != "-") {
	  $sql = $sql.' INSERT INTO drawmyreport_report_graphs (`report_id`, `graph_id`) VALUES (@lastid, "'.$value.'");';
	}
      }

      $result = $this->executerRequete($sql);

      return $result;
    }

    public function delete($id) {
      $sql = 'DELETE FROM drawmyreport_reports WHERE id = "'.$id.'";';
      $result = $this->executerRequete($sql);
      
      $sql = 'DELETE FROM drawmyreport_report_graphs WHERE report_id = "'.$id.'"';
      $result = $this->executerRequete($sql);

      return $result;
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