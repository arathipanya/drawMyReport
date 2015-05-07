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
	$this->setAction("liste");
	$this->genererVue(true, array('reports' => $reports, 'graphs' => $graphs));
    }

    public function get_form() {
      $id = NULL;
	//TODO: edit from id
      $report = NULL;
      if ($id) {
	$report = $this->report->getReport();
      }
      $graphs = $this->graph->getGraphs();
      $this->setAction("create");
      $this->genererVue(true, array('report' => $report, 'graphs' => $graphs));
    }

    public function create() {
      $name = $this->requete->getParametre("name");
      $title = $this->requete->getParametre("title");
      $subtitle = $this->requete->getParametre("subtitle");
      $graphs = $this->requete->getParametre("graphs");

      $this->report->create($name, $title, $subtitle, $graphs);
      self::liste();
    }

    public function delete() {
      $id = $this->requete->getParametre("id");

      $this->report->delete($id);
      self::liste();
    }

    public function show() {
      $id = $this->requete->getParametre("id");

      $report = $this->report->getReport($id);
      $graphs = $this->report->getGraphs($id);

      $this->setAction("show");
      $this->genererVue(true, array('report' => $report, 'graphs' => $graphs));
    }
}

