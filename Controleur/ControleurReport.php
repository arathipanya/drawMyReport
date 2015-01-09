<?php

require_once './modules/drawMyReport/Framework/Controleur.php';
require_once './modules/drawMyReport/Modele/Report.php';
require_once './modules/drawMyReport/Modele/Graph.php';

class ControleurReport extends Controleur {
    private $report;
    private $graph;

    public function __construct() {
    	$this->report = new Report();
	$this->graph = new Graph();
    }

    public function index() {

    }

    // Affiche la liste de tous les rapports + precharge les graphs
    
    public function liste() {
        $reports = $this->report->getReports();
	$graphs = $this->graph->getGraphs();
	$this->genererVue(array('reports' => $reports, 'graphs' => $graphs));
    }

    public function create() {
      //      var_dump($_POST);
      foreach ($_POST as $key => $value) {
	$_POST[$key] = htmlentities($value);
      }
    }

}

