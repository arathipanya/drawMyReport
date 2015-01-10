<?php

require_once './modules/drawMyReport/Framework/Controleur.php';
require_once './modules/drawMyReport/Modele/Graph.php';

class ControleurGraph extends Controleur {
    private $report;
    private $graph;

    public function __construct() {
	$this->graph = new Graph();
    }

    public function index() {

    }

    public function liste() {
	$graphs = $this->graph->getGraphs();
	$this->setAction("liste");
	$this->genererVue(true, array('graphs' => $graphs));
    }

    public function get_form() {
      $id = NULL;
	//TODO: edit from id
      $graph = NULL;
      if ($id) {
	$graph = $this->graph->getGraph();
      }
      $hg = $this->graph->getHostGroups();
      $sg = $this->graph->getServiceGroups();
      $this->setAction("create");
      $this->genererVue(true, array('graph' => $graph, 'servicegroups' => $sg, 'hostgroups' => $hg));
    }

    public function create() {
      $name = $this->requete->getParametre("name");
      $title = $this->requete->getParametre("title");
      $subtitle = $this->requete->getParametre("subtitle");
      $graphs = $this->requete->getParametre("graphs");

      $this->graph->create($name, $title, $subtitle, $graphs);
      self::liste();
    }

    public function delete() {
      $id = $this->requete->getParametre("id");

      $this->graph->delete($id);
      self::liste();
    }

    public function getServicesByServiceGroup() {
      $id = $this->requete->getParametre("id");
      $services = $this->graph->getServicesByServiceGroup($id);
      $this->setAction("partial-selector");
      $this->genererVue(false, array('topics' => $services, 'nextAction' => "getHostsByService", 'title' => "Services"));
    }

    public function getHostsByService() {
      $id = $this->requete->getParametre("id");
      $hosts = $this->graph->getHostsByService($id);
      $this->setAction("partial-selector");
      $this->genererVue(false, array('topics' => $hosts, 'nextAction' => "create", 'title' => "Hosts"));
    }
}

