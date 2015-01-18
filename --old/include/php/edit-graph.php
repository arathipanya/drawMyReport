<?php
  //$filepath = '@CENTREON_ETC@/centreon.conf.php';
$filepath = '/etc/centreon/centreon.conf.php';

if (file_exists($filepath)) {
  include($filepath);

  $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
  mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
  $sql = mysql_query('SELECT * FROM drawmyreport_graphs WHERE id='.$_GET['graph_id'].';');
  $data = mysql_fetch_object($sql);



  function getIndexData(){
      global $data;
      $filepath = '/etc/centreon/centreon.conf.php';
      include($filepath);

      $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
      mysql_select_db($conf_centreon['dbcstg']) or die('getIndexData : Impossible de trouver la base de donnees '.mysql_error());
      $service_groups_list = mysql_query('SELECT * FROM index_data ORDER BY service_description');

      $str = '<div class="select-parent"><select disabled type="text" class="form-control" name="edit_graph[data]" placeholder="Select a service">
          <option value="-">- Select a service/host</option>';

      while ($row = mysql_fetch_object($service_groups_list)) {
          if ($data->data == $row->id) 
	  {
              $str .= '<option selected value="'.$row->id.'">'.$row->service_description.'    -    '.$row->host_name.'</options>';
          } else 
	  {
             $str .= '<option value="'.$row->id.'">'.$row->service_description.'    -    '.$row->host_name.'</options>';
	  }

      }
      $str .= '</select></div><br>';

      return $str;
  }

?>
<div>
<form class="form col-lg-6" role="form" id="form-edit-graph" method="post" action="">
    <h3>Edit <?php echo $data->name ?> <a href="#form-edit-graph" class="close-create-graph" title="close form">close</a></h3>
    <input type="hidden" class="form-control" name="edit_graph[id]" value="<?php echo $data->id ?>">
    <div class="input-group">
      <span class="input-group-addon">Name</span>
      <input type="text" class="form-control" name="edit_graph[name]" placeholder="Name" value="<?php echo $data->name ?>">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Title</span>
      <input type="text" class="form-control" name="edit_graph[title]" placeholder="Title" value="<?php echo $data->title ?>">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Description</span>
      <input type="text" class="form-control" name="edit_graph[description]" placeholder="Description" value="<?php echo $data->description ?>">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Type</span>
      <div class="input-group input-group-radio">
        <span class="input-group-addon-radio">
          <label for="edit-type1">type 1</label>
          <input id="edit-type1" type="radio" name="edit_graph[type]" <?php if ($data->type == "type1") echo "checked"; ?> value="type1">
        </span>
        <span class="input-group-addon-radio">
          <label for="edit-type2">type 2</label>
          <input id="edit-type2" type="radio" name="edit_graph[type]" <?php if ($data->type == "type2") echo "checked"; ?> value="type2">
        </span>
        <span class="input-group-addon-radio">
          <label for="edit-type3">type 3</label>
          <input id="edit-type3" type="radio" name="edit_graph[type]" <?php if ($data->type == "type3") echo "checked"; ?> value="type3">
        </span>
        <span class="input-group-addon-radio">
          <label for="edit-type4">type 4</label>
          <input id="edit-type4" type="radio" name="edit_graph[type]" <?php if ($data->type == "type4") echo "checked"; ?> value="type4">
        </span>
      </div>
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Period</span>
      <div class="input-group input-group-radio">
        <span class="input-group-addon-radio">
          <label for="edit-period1">day</label>
          <input id="edit-period1" type="radio" name="edit_graph[period]" <?php if ($data->period == "day") echo "checked"; ?> value="day">
        </span>
        <span class="input-group-addon-radio">
          <label for="edit-period2">week</label>
          <input id="edit-period2" type="radio" name="edit_graph[period]" <?php if ($data->period == "week") echo "checked"; ?> value="week">
        </span>
        <span class="input-group-addon-radio">
          <label for="edit-period3">month</label>
          <input id="edit-period3" type="radio" name="edit_graph[period]" <?php if ($data->period == "month") echo "checked"; ?> value="month">
        </span>
        <span class="input-group-addon-radio">
          <label for="edit-period4">year</label>
          <input id="edit-period4" type="radio" name="edit_graph[period]" <?php if ($data->period == "year") echo "checked"; ?> value="year">
        </span>
      </div>
    </div>
    <br>

    <div class="input-group">
        <span class="input-group-addon">Service - Host</span>
        <div class="form-control">
        <?php echo getIndexData(); ?>
        </div>
    </div>
    <div id="load-services"></div>

    <button class="btn btn-default" type="submit">Save</button>
  </form>
</div>
   <?php } ?>