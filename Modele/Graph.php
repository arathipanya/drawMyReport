<?php

require_once './modules/drawMyReport/Framework/Modele.php';

class Graph extends Modele {

  public function getGraphs() {
    $sql = 'SELECT * FROM drawmyreport_graphs;';
    $graphs = $this->executerRequete($sql);
    return $graphs;
  }

    public function getGraph($id) {
        $sql = 'SELECT * FROM drawmyreport_graphs WHERE id = "'.$id.'";';
        $graph = $this->executerRequete($sql);
        return $graph;
    }

    public function getServices() {
      $sql = "SELECT service_id AS id, display_name AS name, service_alias AS alias, service_description AS description FROM service";
      $services = $this->executerRequete($sql);
      return $services;
    }

    public function getServiceGroups() {
      $sql = "SELECT sg_id AS id, sg_name AS name, sg_comment AS comment FROM servicegroup;";
      $sg = $this->executerRequete($sql);
      return $sg;
    }

    public function getHostGroups() {
      $sql = "SELECT hg_id AS id, hg_name AS name, hg_comment AS comment FROM hostgroup;";
      $hostgroups = $this->executerRequete($sql);
      return $hostgroups;
    }

    public function getServicesByServiceGroup($id) {
      $sql = "SELECT service.service_id AS id, service.display_name AS name, service.service_alias AS alias, service.service_description AS description FROM servicegroup_relation INNER JOIN service ON service_service_id = service_id WHERE servicegroup_sg_id = ".$id.";";
      $services = $this->executerRequete($sql);
      return $services;
    }

    public function getHostsByService($id) {
      $sql = "SELECT host_id AS id, host_name AS name, host_alias AS description FROM host INNER JOIN host_service_relation ON host_id = host_host_id WHERE service_service_id = ".$id.";";
      $hosts = $this->executerRequete($sql);
      return $hosts;
    }
}

?>