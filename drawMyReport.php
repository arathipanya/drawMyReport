<?php
/*
 * Centreon is developped with GPL Licence 2.0 :
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 * Developped by : Julien Mathis - Romain Le Merlus - Christophe Coraboeuf
 * 
 * The Software is provided to you AS IS and WITH ALL FAULTS.
 * Centreon makes no representation and gives no warranty whatsoever,
 * whether express or implied, and without limitation, with regard to the quality,
 * any particular or intended purpose of the Software found on the Centreon web site.
 * In no event will Centreon be liable for any direct, indirect, punitive, special,
 * incidental or consequential damages however they may arise and even if Centreon has
 * been previously advised of the possibility of such damages.
 * 
 * For information : contact@centreon.com
 */
 
	if (!isset ($oreon)) {
		exit ();
	}

	#Path to the configuration dir
	global $path;
	$path = "./modules/drawMyReport/";

	#PHP functions
	require_once "DB-Func.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body bgcolor="#ffffff">
<div id="target" style="background-color:#ffffff;">

    <!-- Bootstrap -->
    <link href="./modules/drawMyReport/include/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

    <script src="./modules/drawMyReport/include/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="./modules/drawMyReport/include/js/jsapi.js"></script>

    <script type="text/javascript" src="./modules/drawMyReport/include/js/base.js"></script>
    <script type="text/javascript" src="./modules/drawMyReport/include/js/html2canvas.js"></script>


<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/rgbcolor.js"></script> 
<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/StackBlur.js"></script>
<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/canvg.js"></script> 


<?php
if (isset($_GET["report"])) {
  $report_id = $_GET["report"];
} else {
  $report_id = 1;
}
  global $conf_centreon;
  
  $db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);
  
  $reports_list = mysql_query("SELECT * FROM drawmyreport_reports WHERE id = ".$report_id.";");

  $thisReport = mysql_fetch_object($reports_list);

  $report_graphs_list = mysql_query("SELECT * FROM drawmyreport_report_graphs INNER JOIN drawmyreport_graphs ON drawmyreport_graphs.id = drawmyreport_report_graphs.graph_id WHERE drawmyreport_report_graphs.report_id = ".$report_id.";");

  $graphs_array = array();
  while ($row = mysql_fetch_object($report_graphs_list)) {
    array_push($graphs_array, $row);
  }

  dbClose($db);
?>
<div class="container">
    <div class="jumbotron">
        <h1><?php echo $thisReport->title ?></h1>
        <h2><small><?php echo $thisReport->subtitle ?></small></h2>
    </div>

<?php
for ($i = 0; $i < count($graphs_array); $i++) {
  $tp = 60 * 60 * 24; //one day
  if ($graphs_array[$i]->period == "week") $tp = 60*60*24*7;
  if ($graphs_array[$i]->period == "month") $tp = 60*60*24*31;
  if ($graphs_array[$i]->period == "year") $tp = 60*60*24*365;
  ?>
  <div class="page-header">
      <h1><?php echo $graphs_array[$i]->title ?></h1>
      <h3><small><?php echo $graphs_array[$i]->period ?> - <?php echo $graphs_array[$i]->description ?></small></h3>
  </div>
  <img class="graph" data-path="<?php echo $path; ?>include/php/generate_graph.php?service_id=<?php echo $graphs_array[$i]->data ?>&tp=<?php echo $tp ?>&session_id=<?php echo session_id();?>&time=<?php echo time();?>&width=600"/>
  <br>
<br>
  <?
 }
?>


    <div class="untarget">
<br>
<hr>
<br>
    <button id="cmd" type="button" class="btn btn-default">generate PDF</button>
    </div>
</div>
</div>
  </body>
</html>