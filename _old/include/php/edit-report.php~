<?php
$filepath = '/etc/centreon/centreon.conf.php';

if (file_exists($filepath)) {
  include($filepath);

  $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
  mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
  $sql = mysql_query('SELECT * FROM drawmyreport_reports WHERE id='.$_GET['report_id'].';');
  $data = mysql_fetch_object($sql);

function addSelectGraph($graphs_array) {
  $str = '<div class="select-parent"><select type="text" class="form-control" name="edit_report[graphs][]" placeholder="Select a graph">
          <option value="-">-</option>';
  for ($i = 0; $i < count($graphs_array); $i++) {
    $str .= '<option value="'.$graphs_array[$i]->id.'">'.$graphs_array[$i]->name.'</options>';
  }

  $str .= '</select></div><br><button class="xs-btn btn-default add-graph-report" target="#select-graph-report-model-edit">Add a graph</button>';
  return $str;
}

function showSelectedGraphs() {
  global $data;
  global $conf_centreon;
 
  $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
  mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
  $sql = mysql_query('SELECT * FROM drawmyreport_report_graphs INNER JOIN drawmyreport_graphs ON drawmyreport_graphs.id = drawmyreport_report_graphs.graph_id WHERE drawmyreport_report_graphs.report_id='.$data->id.';');
 
  $str = "";
  while ($row =  mysql_fetch_object($sql)) {
     $str .= '<label for="#delete-'.$row->id.'" class="form-control label-report-graph-edit">'.$row->name.' - '.$row->description.'</label>
              <input id="delete-'.$row->id.'" type="hidden" name="edit_report[graphs_delete][]" value="'.$row->id.'">
              <br>';
  }

  return $str;
}

?>

<div>
<form class="form col-lg-6 to-be-checked report-edit-form" role="form" id="form-edit-graph" method="post" action="">
  <h3>Edit <?php echo $data->name ?> <a href="#form-edit-graph" class="close-create-graph" title="close form">close</a></h3>
   <input type="hidden" name="edit_report[id]" value="<?php echo $data->id ?>">
    <div class="input-group">
      <span class="input-group-addon">Name</span>
      <input type="text" class="form-control" name="edit_report[name]" placeholder="Name" value="<?php echo $data->name ?>">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Title</span>
      <input type="text" class="form-control" name="edit_report[title]" placeholder="Title" value="<?php echo $data->title ?>">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Subtitle</span>
      <input type="text" class="form-control" name="edit_report[subtitle]" placeholder="Description" value="<?php echo $data->subtitle ?>">
    </div>
    <br>

<?php
   $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
 mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
 $graphs_list = mysql_query("SELECT * FROM drawmyreport_graphs;");
 $graphs_array = array();

  while ($graph_row = mysql_fetch_object($graphs_list)) {
    array_push($graphs_array, $graph_row);
  }

?>
    <div class="input-group-btn" id="select-graphs-list-report">
        <span class="input-group-addon">Graphs</span>
        <div id="select-graph-report-model-edit">
       <?php echo showSelectedGraphs(); ?>
       <?php echo addSelectGraph($graphs_array); ?>
        </div>
    </div>
    <br>

    <button class="btn btn-primary" type="submit">Save</button>
  </form>
</div>
<?php } ?>