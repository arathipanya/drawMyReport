<?php

require_once './modules/drawMyReport/Framework/Modele.php';

class Graph extends Modele {

  public function getGraphs() {
    $sql = 'SELECT * FROM drawmyreport_graphs;';
    $graphs = $this->executerRequete($sql);
    return $graphs;
  }
}

?>