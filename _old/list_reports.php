<!-- Bootstrap -->
    <link href="./modules/drawMyReport/include/css/bootstrap.min.css" rel="stylesheet">
    <link href="./modules/drawMyReport/include/css/drawmyreport.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

    <script src="./modules/drawMyReport/include/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="./modules/drawMyReport/include/js/jsapi.js"></script>

    <script type="text/javascript" src="./modules/drawMyReport/include/js/base.js"></script>
    <script type="text/javascript" src="./modules/drawMyReport/include/js/html2canvas.js"></script>


<?php 
include './modules/drawMyReport/DB-Func.php';
include './modules/drawMyReport/include/php/reports-func.php';

if ($_POST["create_report"]) {
  global $conf_centreon;

  $db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);
  $error=0;

  $result = mysql_query("INSERT INTO drawmyreport_reports (name, title, subtitle) VALUES('".$_POST["create_report"]["name"]."','".$_POST["create_report"]["title"]."','".$_POST["create_report"]["subtitle"]."');");
  $report_id = mysql_insert_id();

  if ($_POST["create_report"]["graphs"]) {
    $post_graphs_array = $_POST["create_report"]["graphs"];
    for ($i = 0; $i < count($post_graphs_array); $i++) {
      if ($post_graphs_array[$i] !== "-") {
        mysql_query("INSERT INTO drawmyreport_report_graphs (report_id, graph_id) VALUES('".$report_id."','".$post_graphs_array[$i]."');");
      }
    }
  }

  $_POST=Array();
  dbClose($db);
}

if (isset($_POST["edit_report"])) {
  global $conf_centreon;

  $db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);
  $error=0;

  $result = mysql_query("UPDATE drawmyreport_reports SET name = '".$_POST["edit_report"]["name"]."', title = '".$_POST["edit_report"]["title"]."', subtitle = '".$_POST["edit_report"]["subtitle"]."' WHERE id = '".$_POST["edit_report"]["id"]."';");
  $report_id = $_POST["edit_report"]["id"];

  if (isset($_POST["edit_report"]["graphs"])) {
    $post_graphs_array = $_POST["edit_report"]["graphs"];
    for ($i = 0; $i < count($post_graphs_array); $i++) {
      if ($post_graphs_array[$i] !== "-") {
        mysql_query("INSERT INTO drawmyreport_report_graphs (report_id, graph_id) VALUES('".$report_id."','".$post_graphs_array[$i]."');");
      }
    }
  }
  
  if (isset($_POST["edit_report"]["graphs_delete"])) {
    $post_graphs_array = $_POST["edit_report"]["graphs_delete"];
    for ($i = 0; $i < count($post_graphs_array); $i++) {
      if ($post_graphs_array[$i] !== "-") {
        mysql_query("DELETE FROM drawmyreport_report_graphs WHERE graph_id='".$post_graphs_array[$i]."' AND report_id='".$report_id."';");
      }
    }
  }

  $_POST=Array();
  dbClose($db);
}
?>




<div class="container">
<h4><a href="#" class="btn btn-xs btn-default create-graph">Create a report</a></h4>
<div class="col-lg-12">
    <h4>List of reports</h4>
<?php 
  global $conf_centreon;

  $db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);

  $reports_list = mysql_query("SELECT * FROM drawmyreport_reports;");
  dbClose($db);
?>
<table class="table">
  <tr>
    <th>Name</th>
    <th>Title</th>
    <th>Subtitle</th>
    <th>Action</th>
  </tr>
<?php
    while ($row = mysql_fetch_object($reports_list)) {
?>
  <tr data-topic-id="<?php echo $row->id ?>">
      <td><?php echo $row->name ?></td>
      <td><?php echo $row->title ?></td>
      <td><?php echo $row->subtitle ?></td>
      <td><a href="main.php?p=90103&report=<?php echo $row->id ?>" title="See preview" class="see-report-preview"><span class="glyphicon glyphicon-play"></span></a> 
<a href="./modules/drawMyReport/include/php/edit-report.php?report_id=<?php echo $row->id ?>" title="Edit" class="edit-report"><span class="glyphicon glyphicon-pencil"></span></a> 
<a href="./modules/drawMyReport/include/php/delete-report.php?report_id=<?php echo $row->id ?>" title="Remove" class="remove-graph"><span class="glyphicon glyphicon-trash"></span></a></td>
  </tr>      
<?php
    }
?>
</table>
</div>

</div>

<div class="container">

<h4><a href="#" class="btn btn-xs btn-default create-graph">Create a report</a></h4>

<form class="form col-lg-6" hidden role="form" id="form-create-graph" method="post" action="">
  <h3>New report <a href="#form-create-graph" class="close-create-graph" title="close form">close</a></h3>
    <div class="input-group">
      <span class="input-group-addon">Name</span>
      <input type="text" class="form-control" name="create_report[name]" placeholder="Name">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Title</span>
      <input type="text" class="form-control" name="create_report[title]" placeholder="Title">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Subtitle</span>
      <input type="text" class="form-control" name="create_report[subtitle]" placeholder="Description">
    </div>
    <br>

<?php
global $conf_centreon;

$db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);
$graphs_list = mysql_query("SELECT * FROM drawmyreport_graphs;");
$graphs_array = array();

while ($graph_row = mysql_fetch_object($graphs_list)) {
  array_push($graphs_array, $graph_row);
}

dbClose($db);

?>
    <div class="input-group" id="select-graphs-list-report">
        <span class="input-group-addon">Graphs</span>
        <div class="form-control" id="select-graph-report-model">
            <?php echo addSelectGraph($graphs_array); ?>
        </div>
    </div>
    <br>

    <button class="btn btn-default" type="submit">Save</button>
  </form>
</div>
