<?php
  /**
   * Include config file
   */
  //include "../../require.php";

require_once '/etc/centreon/centreon.conf.php';
require_once $centreon_path.'/www/class/centreonGraph.class.php';
require_once $centreon_path.'/www/class/centreonDB.class.php';

session_start();

if (!isset($_GET['service_id']) || !isset($_GET['session_id'])) {
  exit;
 }

//list($hostId, $serviceId) = explode('-', $_GET['service_id']);
$db = new CentreonDB("centstorage");
$res = $db->query("SELECT `id`
   FROM index_data
       WHERE id = ".$_GET['service_id']."
       LIMIT 1");
if ($res->numRows()) {
  $row = $res->fetchRow();
  $index = $row["id"];
 } else {
  $index = 0;
 }


/**
 * Create XML Request Objects
 */
$obj = new CentreonGraph($_GET["session_id"], $index, 0, 1);

if (trim(session_id()) != trim($_GET['session_id'])) {
  $obj->displayError();
 }

require_once $centreon_path."www/include/common/common-Func.php";

/**
 * Set arguments from GET
 */
$graphPeriod = isset($_GET['tp']) ? $_GET['tp'] : (60*60*48);
$obj->setRRDOption("start", (time() - $graphPeriod));
$obj->setRRDOption("end", time());

$obj->GMT->getMyGMTFromSession($obj->session_id, $db);

/**
 * Template Management
 */
$obj->setTemplate();
$obj->init();

/*
 * Set colors 
 */
$obj->setColor("CANVAS","#FFFFFF");
$obj->setColor("BACK","#FFFFFF");
$obj->setColor("SHADEA","#FFFFFF");
$obj->setColor("SHADEB","#FFFFFF");

if (isset($_GET['width']) && $_GET['width']) {
  $obj->setRRDOption("width", ($_GET['width'] - 110));
  //$obj->setRRDOption("width", 400);
 }

/**
 * Init Curve list
 */
$obj->initCurveList();

/**
 * Comment time
 */
$obj->setOption("comment_time");

/**
 * Create Legende
 */
$obj->createLegend();

/**
 * Display Images Binary Data
 */
$obj->displayImageFlow();
?>