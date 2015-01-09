<?php

require_once './modules/drawMyReport/Framework/Controleur.php';
require_once './modules/drawMyReport/Modele/Report.php';
//require_once './modules/drawMyReport/Modele/Graph.php';

class ControleurAccueil extends Controleur {

    private $report;
    //private $graph;

    public function __construct() {
    	$this->report = new Report();
	//$this->graph = new Graph();
    }

    // Affiche la liste de tous les rapports + precharge les graphs
    public function index() {
        $reports = $this->report->getReports();
	//	$graphs = $this->graph->getGraphs();
        //$this->genererVue(array('reports' => $reports, 'graphs' => $graphs));
	$this->genererVue(array('reports' => $reports));
    }

}

