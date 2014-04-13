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
      $filepath = '/etc/centreon/centreon.conf.php';
      include($filepath);

      $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
      mysql_select_db($conf_centreon['dbcstg']) or die('getIndexData : Impossible de trouver la base de donnees '.mysql_error());
      $service_groups_list = mysql_query('SELECT * FROM index_data ORDER BY service_description');

      $str = '<div class="select-parent"><select type="text" class="form-control" name="create_graph[data]" placeholder="Select a service">
          <option value="-">- Select a service/host</option>';

      while ($row = mysql_fetch_object($service_groups_list)) {
          $str .= '<option value="'.$row->id.'">'.$row->service_description.'    -    '.$row->host_name.'</options>';
      }
      $str .= '</select></div><br>';

      return $str;
  }

?>

<form class="form col-lg-6" role="form" id="form-create-graph" method="post" action="">
  <a href="#" class="close-create-graph" title="close form">x</a>
    <div class="input-group">
      <span class="input-group-addon">Name</span>
      <input type="text" class="form-control" name="create_graph[name]" placeholder="Name" value="<?php echo $data->name ?>">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Title</span>
      <input type="text" class="form-control" name="create_graph[title]" placeholder="Title" value="<?php echo $data->title ?>">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Description</span>
      <input type="text" class="form-control" name="create_graph[description]" placeholder="Description" value="<?php echo $data->description ?>">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">
        type1
        <input type="radio" name="create_graph[type]" checked value="type1">
      </span>
      <span class="input-group-addon">
        type2
        <input type="radio" name="create_graph[type]" value="type2">
      </span>
      <span class="input-group-addon">
        type3
        <input type="radio" name="create_graph[type]" value="type3">
      </span>
      <span class="input-group-addon">
        type4
        <input type="radio" name="create_graph[type]" value="type4">
      </span>
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">
        day
        <input type="radio" name="create_graph[period]" checked value="day">
      </span>
      <span class="input-group-addon">
        week
        <input type="radio" name="create_graph[period]" value="week">
      </span>
      <span class="input-group-addon">
        month
        <input type="radio" name="create_graph[period]" value="month">
      </span>
      <span class="input-group-addon">
        year
        <input type="radio" name="create_graph[period]" value="year">
      </span>
    </div>
    <br>

    <div class="input-group-btn">
        <span class="input-group-addon">Service/host</span>
        <div>
        <?php echo getIndexData(); ?>
        </div>
    </div>
    <div id="load-services"></div>

    <button class="btn btn-default" type="submit">Save</button>
  </form>
   <?php } ?>