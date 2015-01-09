<?php $this->titre = "DrawMyReport"; ?>


<div class="container">
<h4><a href="#" class="btn btn-xs btn-default create-graph">Create a report</a></h4>
<div class="col-lg-12">
    <h4>List of reports</h4>


<table class="table">
  <tr>
    <th>Name</th>
    <th>Title</th>
    <th>Subtitle</th>
    <th>Action</th>
  </tr>

<?php $has_one = false; ?>
<?php foreach ($reports as $report): ?>
<?php $has_one = true; ?>
<tr data-topic-id="<?php echo $report["id"] ?>">
    <td><?php echo $report["name"]; ?></td>
    <td><?php echo $report["title"]; ?></td>
    <td><?php echo $report["subtitle"]; ?></td> 
    <td><a href="main.php?p=<?php echo self::nettoyer($_GET["p"]); ?>"><?php echo self::nettoyer($_GET["p"]); ?></a></td>
</tr>

<?php endforeach; ?>
</table>
<?php if (!$has_one) { echo "<span class='info'>You have no report yet. Create one by clicking on the \"Create a report\" button.</span>"; } ?>

</div>
</div>




<div class="container">

<h4><a href="#" class="btn btn-xs btn-default create-graph">Create a report</a></h4>

<form class="form col-lg-6" hidden role="form" id="form-create-graph" method="post" action="?p=<?php echo self::nettoyer($_GET['p']); ?>&action=create&controleur=report">
  <h3>New report <a href="#form-create-graph" class="close-create-graph" title="close form">close</a></h3>
    <div class="input-group">
      <span class="input-group-addon">Name</span>
      <input type="text" class="form-control" name="name" placeholder="Name">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Title</span>
      <input type="text" class="form-control" name="title" placeholder="Title">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Subtitle</span>
      <input type="text" class="form-control" name="subtitle" placeholder="Description">
    </div>
    <br>

    <div class="input-group" id="select-graphs-list-report">
        <span class="input-group-addon">Graphs</span>
        <div class="form-control" id="select-graph-report-model">

<div class="select-parent">
    <select type="text" class="form-control" name="graphs[]" placeholder="Select a graph">
          <option value="-">-</option>

<?php foreach($graphs as $graph): ?>
          <option value="<?php echo self::nettoyer($graph["id"]); ?>"><?php echo self::nettoyer($graph['name']); ?></options>
<?php endforeach; ?>
    </select>
</div>
<br>
<button class="btn btn-xs btn-primary add-graph-report" target="#select-graph-report-model">Add a graph</button>

        </div>
    </div>
    <br>

    <button class="btn btn-default" type="submit">Save</button>
  </form>
</div>
