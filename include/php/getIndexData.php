<?php
$filepath = '/etc/centreon/centreon.conf.php';

if (file_exists($filepath)) {
  include($filepath);

  function getServiceGroups($sg_id = NULL) {
    global $conf_centreon;

    $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
    mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
    $sql = mysql_query('SELECT * FROM servicegroup');
    
    $str = '<div class="select-parent"><select type="text" class="form-control" name="sg" placeholder="Select a service group">';
    if (!$sg_id) {
        $str .= '<option value="-">- service group</option>';
    }

    while ($row = mysql_fetch_object($sql)) {
          if ($row->sg_id == $sg_id) {
              $str .= '<option selected value="'.$row->sg_id.'">'.$row->sg_name.'    -    '.$row->sg_alias.'</options>';
          } else {
              $str .= '<option value="'.$row->sg_id.'">'.$row->sg_name.'    -    '.$row->sg_alias.'</options>';
          }
    }
    $str .= '</select></div><br>';

    return $str;
  }

  function getServices($service_id = NULL)  
  {
    global $conf_centreon;

    $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
    mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
    $sql = mysql_query('SELECT service_id, service_description, service_alias FROM service');
    
    $str = '<div class="select-parent"><select type="text" class="form-control" name="service" placeholder="Select a service">';
    if (!$service_id) $str .= '<option value="-">- service</option>';
    while ($row = mysql_fetch_object($sql)) {
          if ($service_id == $row->service_id) 
	  {
              $str .= '<option selected value="'.$row->service_id.'">'.$row->service_description.'    -    '.$row->service_alias.'</options>';
          } else 
	  {
              $str .= '<option value="'.$row->service_id.'">'.$row->service_description.'    -    '.$row->service_alias.'</options>';
	  }
    }
    $str .= '</select></div><br>';

    return $str;
  }

  function getServicesByServiceGroup($sg_id)  
  {
    global $conf_centreon;

    $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
    mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
    $sql = mysql_query("SELECT * FROM servicegroup_relation INNER JOIN service ON service.service_id = servicegroup_relation.service_service_id WHERE servicegroup_sg_id='".$sg_id."'");
    
    $str = '<div class="select-parent"><select type="text" class="form-control" name="service" placeholder="Select a service">
          <option value="-">- service</option>';
    while ($row = mysql_fetch_object($sql)) {
          $str .= '<option value="'.$row->service_service_id.'">'.$row->service_description.'    -    '.$row->service_alias.'</options>';
    }
    $str .= '</select></div><br>';

    return $str;
  }

  function getHostsByServiceGroup($sg_id)  
  {
    global $conf_centreon;

    $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
    mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
    $sql = mysql_query("SELECT * FROM servicegroup_relation INNER JOIN host ON host.host_id = servicegroup_relation.host_host_id WHERE servicegroup_sg_id='".$sg_id."'");
    
    $str = '<div class="select-parent"><select type="text" class="form-control" name="host" placeholder="Select a host">
          <option value="-">- host</option>';
    while ($row = mysql_fetch_object($sql)) {
          $str .= '<option value="'.$row->host_host_id.'">'.$row->host_name.'    -    '.$row->host_address.'</options>';
    }
    $str .= '</select></div><br>';

    return $str;
  }


  function getHosts($host_id = NULL)  
  {
    global $conf_centreon;

    $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
    mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
    $sql = mysql_query('SELECT host_id, host_name, host_address FROM host');
    
    $str = '<div class="select-parent"><select type="text" class="form-control" name="host" placeholder="Select a host">';
    if (!$host_id) $str .= '<option value="-">- host</option>';
    while ($row = mysql_fetch_object($sql)) {
          if ($host_id == $row->host_id) 
          {	  
              $str .= '<option selected value="'.$row->host_id.'">'.$row->host_name.'    -    '.$row->host_address.'</options>';
          } else 
          {
              $str .= '<option value="'.$row->host_id.'">'.$row->host_name.'    -    '.$row->host_address.'</options>';
	  }
    }
    $str .= '</select></div><br>';

    return $str;
  }

?>

<?php 
    function getIndexData() {
        echo getServiceGroups();
        echo getServices();
        echo getHosts();
	echo '<div class="btn-group" data-toggle="buttons"></div>';
    }


    function getServiceHost($service_id, $host_id) 
    {
        global $conf_centreon;

    $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
    mysql_select_db($conf_centreon['dbcstg']) or die('Impossible de trouver la base de donnees '.mysql_error());
    $sql = mysql_query("SELECT * FROM index_data WHERE service_id='".$service_id."' AND host_id='".$host_id."';");


    $str = '<div class="btn-group" data-toggle="buttons">';
    
    while ($row = mysql_fetch_object($sql)) {
          $str .= '<label class="btn btn-primary">
                   <input type="radio" name="create_graph[data]" value="'.$row->id.'" id="edit-graph-data-'.$row->id.'"> '.$row->host_name.' - '.$row->service_description.'
                   </label>';
    }
    $str .= '</div><br>';

    return $str;
    }

    function getHostsByService($service_id) 
    {
        global $conf_centreon;

    $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
    mysql_select_db($conf_centreon['dbcstg']) or die('Impossible de trouver la base de donnees '.mysql_error());
    $sql = mysql_query("SELECT * FROM index_data WHERE service_id='".$service_id."';");


    $str = '<div class="btn-group" data-toggle="buttons">';
    
    while ($row = mysql_fetch_object($sql)) {
          $str .= '<label class="btn btn-primary">
                   <input type="radio" name="create_graph[data]" value="'.$row->id.'" id="edit-graph-data-'.$row->id.'"> '.$row->host_name.' - '.$row->service_description.'
                   </label>';
    }
    $str .= '</div><br>';

    return $str;
    }

    function getServicesByHost($host_id) 
    {
        global $conf_centreon;

    $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
    mysql_select_db($conf_centreon['dbcstg']) or die('Impossible de trouver la base de donnees '.mysql_error());
    $sql = mysql_query("SELECT * FROM index_data WHERE host_id='".$host_id."';");


    $str = '<div class="btn-group" data-toggle="buttons">';
    
    while ($row = mysql_fetch_object($sql)) {
          $str .= '<label class="btn btn-primary">
                   <input type="radio" name="create_graph[data]" value="'.$row->id.'" id="edit-graph-data-'.$row->id.'"> '.$row->host_name.' - '.$row->service_description.'
                   </label>';
    }
    $str .= '</div><br>';

    return $str;
    }

    function getIndexDataSearch($sg_id, $service_id, $host_id) 
    {
        if ($service_id && $host_id) 
	{
            echo getServiceGroups();
            echo getServices($service_id);
	    echo getHosts($host_id);
            echo getServiceHost($service_id, $host_id);
        } else
        if ($service_id && !$host_id) 
        {
            echo getServiceGroups($sg_id);
            echo getServices($service_id);
	    echo getHosts();
            echo getHostsByService($service_id);
        } else
        if (!$service_id && $host_id) 
        {
            echo getServiceGroups();
            echo getServices();
	    echo getHosts($host_id);
            echo getServicesByHost($host_id);
        } else
        if ($sg_id && !$service_id)
        {
            echo getServiceGroups($sg_id);
            echo getServicesByServiceGroup($sg_id);
	    echo getHostsByServiceGroup($sg_id);
            echo '<div class="btn-group" data-toggle="buttons"></div>';
        }
    }

    if (isset($_GET['sg_id']) || isset($_GET['service_id']) || isset($_GET['host_id'])) 
    {
        $sg_id = isset($_GET['sg_id']) ? $_GET['sg_id'] : NULL;
        $service_id = isset($_GET['service_id']) ? $_GET['service_id'] : NULL;
	$host_id = isset($_GET['host_id']) ? $_GET['host_id'] : NULL;
        getIndexDataSearch($sg_id, $service_id, $host_id);
    }

?>

    <?php } ?>