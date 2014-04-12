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


<?php 
include './modules/drawMyReport/DB-Func.php';

if ($_POST["create_graph"]) {
  global $conf_centreon;

  $db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);
  $error=0;

  mysql_query("INSERT INTO drawmyreport_graphs (name, title, description, type, period, data) VALUES('".$_POST["create_graph"]["name"]."','".$_POST["create_graph"]["title"]."','".$_POST["create_graph"]["description"]."','".$_POST["create_graph"]["type"]."','".$_POST["create_graph"]["period"]."','');");
  $_POST=Array();
  
  dbClose($db);
}
?>


<div class="container">

<a href="#" class="create-graph">Create a graph</a>

<form class="bs-example bs-example-form" hidden role="form" id="form-create-graph" method="post" action="">
  <a href="#" class="close-create-graph" title="close form">x</a>
    <div class="input-group">
      <span class="input-group-addon">Name</span>
      <input type="text" class="form-control" name="create_graph[name]" placeholder="Name">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Title</span>
      <input type="text" class="form-control" name="create_graph[title]" placeholder="Title">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Description</span>
      <input type="text" class="form-control" name="create_graph[description]" placeholder="Description">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">
        type1
        <input type="radio" name="create_graph[type]" value="type1">
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
        <input type="radio" name="create_graph[period]" value="day">
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
    <button class="btn btn-default" type="submit">Save</button>
  </form>



<hr>

<div>
    <h4>List of graphs</h4>
<?php 
  global $conf_centreon;

  $db = dbConnect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password'],$conf_centreon['db'], true);
  $error=0;

  $graphs_list = mysql_query("SELECT * FROM drawmyreport_graphs;");
  dbClose($db);
?>
<table class="table">
  <tr>
    <th>Name</th>
    <th>Title</th>
    <th>Description</th>
    <th>Type</th>
    <th>Period</th>
  </tr>
<?php
    while ($row = mysql_fetch_object($graphs_list)) {
?>
  <tr data-topic-id="<?php echo $row->id ?>">
      <td><?php echo $row->name ?></td>
      <td><?php echo $row->title ?></td>
      <td><?php echo $row->description ?></td>
      <td><?php echo $row->type ?></td>
      <td><?php echo $row->period ?></td>
  </tr>      
<?php
    }
?>
</table>
</div>

</div>
