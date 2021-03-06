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

if ($_POST["create_email"]) {
  global $conf_centreon;

  $db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);
  $error=0;

  /* Entre la ressource en base de donnéees */
  $result = mysql_query("INSERT INTO drawmyreport_emails (name, title, date_first_send, date_last_modification) VALUES('".$_POST["create_email"]["name"]."','".$_POST["create_email"]["title"]."','".$_POST["create_email"]["date_first_send"]."', '".$_POST["create_email"]["date_last_modification"]."');");
  $report_id = mysql_insert_id();

  /* Entre la dépendance email/user en base de données */
  if ($_POST["create_email"]["users"]) {
    $post_graphs_array = $_POST["create_email"]["users"];
    for ($i = 0; $i < count($post_graphs_array); $i++) {
      if ($post_graphs_array[$i] !== "-") {
        mysql_query("INSERT INTO drawmyreport_emails_users (email_id, user_id) VALUES('".$report_id."','".$post_graphs_array[$i]."');");
      }
    }
  }

  /* Entre la dépendance email/report en base de données */
  if ($_POST["create_email"]["reports"]) {
    $post_graphs_array = $_POST["create_email"]["reports"];
    for ($i = 0; $i < count($post_graphs_array); $i++) {
      if ($post_graphs_array[$i] !== "-") {
        mysql_query("INSERT INTO drawmyreport_email_reports (email_id, report_id) VALUES('".$report_id."','".$post_graphs_array[$i]."');");
      }
    }
  }

  $_POST=Array();
  dbClose($db);
}

if (isset($_POST["edit_report"])) {
  /* Editer un rapport, même procedure que la création */
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

function addSelectGraph($graphs_array) {
  $str = '<div class="select-parent"><select type="text" class="form-control" name="create_email[users][]" placeholder="Select an user">
          <option value="-">-</option>';
  for ($i = 0; $i < count($graphs_array); $i++) {
    $str .= '<option value="'.$graphs_array[$i]->id.'">'.$graphs_array[$i]->name.' - '.$graphs_array[$i]->email.'</options>';
  }

  $str .= '</select></div><br><button class="btn-xs btn btn-primary add-graph-report" target="#select-graph-report-model">Add an user</button>';
  return $str;
}

function addSelectReport($graphs_array) {
  $str = '<div class="select-parent"><select type="text" class="form-control" name="create_email[reports][]" placeholder="Select a report">
          <option value="-">-</option>';
  for ($i = 0; $i < count($graphs_array); $i++) {
    $str .= '<option value="'.$graphs_array[$i]->id.'">'.$graphs_array[$i]->name.' - '.$graphs_array[$i]->title.'</options>';
  }

  $str .= '</select></div><br><button class="btn btn-xs btn-primary add-graph-report" target="#select-report-model">Add a report</button>';
  return $str;
}
?>





<div class="container">
<h4><a href="#" class="btn btn-xs btn-default create-graph">Create an email</a></h4>
<div class="col-lg-12">
    <h4>List of emails</h4>
<?php 
  global $conf_centreon;

  $db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);

  $reports_list = mysql_query("SELECT * FROM drawmyreport_emails;");
  dbClose($db);
?>
<table class="table">
  <tr>
    <th>Name</th>
    <th>Title</th>
    <th>Date first sending</th>
    <th>Date last sending</th>
    <th>Date last modification</th>
    <th>Actions</th>
  </tr>
<?php
    while ($row = mysql_fetch_object($reports_list)) {
?>
  <tr data-topic-id="<?php echo $row->id ?>">
      <td><?php echo $row->name ?></td>
      <td><?php echo $row->title ?></td>
      <td><?php echo $row->date_first_send ?></td>
      <td><?php echo $row->date_last_send ?></td>
      <td><?php echo $row->date_last_modification ?></td>
      <td><a href="./modules/drawMyReport/include/php/delete-email.php?email_id=<?php echo $row->id ?>" title="Remove" class="remove-graph"><span class="glyphicon glyphicon-trash"></span></a></td>
  </tr>      
<?php
    }
?>
</table>
</div>
</div>



<div class="container col-lg-12">
<h4><a href="#" class="btn btn-xs btn-default create-graph">Create an email</a></h4>
<div class="col-lg-6 col-md-12">
<form class="form col-lg-12" hidden role="form" id="form-create-graph" method="post" action="">
  <h3>New email <a href="#form-create-graph" class="close-create-graph" title="close form">close</a></h3>
    <div class="input-group">
      <span class="input-group-addon">Name</span>
      <input type="text" class="form-control" name="create_email[name]" placeholder="Name">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Title</span>
      <input type="text" class="form-control" name="create_email[title]" placeholder="Title">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Date of<br>first sending</span>
      <input type="text" class="form-control" name="create_email[date_first_send]" placeholder="yyyy-mm-dd hh:mm:ss">
    </div>
<?php
$myGetDate = getdate();
$thisDate = $myGetDate[year].'-'.$myGetDate[mon].'-'.$myGetDate[mday].' '.$myGetDate[hours].':'.$myGetDate[minutes].':'.$myGetDate[seconds];
?>
    <input type="hidden" class="form-control" name="create_email[date_last_modification]" value="<?php echo $thisDate; ?>">
    <br>

<?php
global $conf_centreon;

$db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);
$graphs_list = mysql_query("SELECT * FROM drawmyreport_users ORDER BY name;");
$graphs_array = array();

while ($graph_row = mysql_fetch_object($graphs_list)) {
  array_push($graphs_array, $graph_row);
}

$reports_list = mysql_query("SELECT * FROM drawmyreport_reports ORDER BY name;");
$reports_array = array();

while ($graph_row = mysql_fetch_object($reports_list)) {
  array_push($reports_array, $graph_row);
}

dbClose($db);

?>
    <div class="input-group" id="select-graphs-list-report">
        <span class="input-group-addon">Users</span>

        <div id="select-graph-report-model" class="input-group form-control">
            <?php echo addSelectGraph($graphs_array); ?>
            <br><a href="#create-user-form" class="open-form">create / edit an user</a>
        </div>
        
    </div>
    <br>

    <div class="input-group" id="select-reports-list-email">
        <span class="input-group-addon">Reports</span>
        <div id="select-report-model" class="input-group form-control">
            <?php echo addSelectReport($reports_array); ?>
        </div>
    </div>
    <br>

    <button class="btn btn-default" type="submit">Save</button>
  </form>
</div>


<div hidden class="col-lg-6 col-md-12" style="">
        <form class="form" role="form" id="create-user-form" method="post" action="">
            <h3>Create an user <a href="#create-user-form" class="close-form" title="close form">close</a></h3>
            <div class="input-group">
            <span class="input-group-addon">Name</span>
                <input type="text" class="form-control" name="create_user[name]" placeholder="Name">
            </div>
            <br>
            <div class="input-group">
            <span class="input-group-addon">Email</span>
                <input type="text" class="form-control" name="create_user[email]" placeholder="Email">
            </div>
            <br>
            <button class="btn btn-default" type="submit">Create</button>
        </form>

<div class="">
<h4>List of users</h4>
<?php 
	global $conf_centreon;

$db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);

  $reports_list = mysql_query("SELECT * FROM drawmyreport_users ORDER BY name;");
  dbClose($db);
?>
<table class="table">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Actions</th>
  </tr>
<?php
    while ($row = mysql_fetch_object($reports_list)) {
?>
  <tr data-topic-id="<?php echo $row->id ?>">
      <td><?php echo $row->name ?></td>
      <td><?php echo $row->email ?></td>
      <td><a href="./modules/drawMyReport/include/php/create-user.php?delete=true&user_id=<?php echo $row->id ?>" title="Delete" class="remove-user"><span class="glyphicon glyphicon-trash"></span></a></td>
  </tr>      
<?php
    }
?>
</table>
</div>
</div>


</div>

