<?php $this->titre = "DrawMyReport"; ?>
<?php
$p = self::nettoyer($_GET['p']);
 ?>

<script type="text/javascript">
    window.history.pushState({}, "liste", "main.php?p=<?php echo $p; ?>&action=liste&controleur=graph");
</script>


<div class="container">
<h4><a href="main.php?p=<?php echo $p; ?>&action=get_form&controleur=graph" class="btn btn-xs btn-default">Create a graph</a></h4>
<div class="col-lg-12">
    <h4>List of graphs</h4>


<table class="table">
  <tr>
    <th>Name</th>
    <th>Title</th>
    <th>Description</th>
    <th>Type</th>
    <th>Period</th>
    <th>Action</th>
  </tr>

<?php $has_one = false; ?>
<?php foreach ($graphs as $graph): ?>
<?php $has_one = true; ?>
<tr data-topic-id="<?php echo $graph["id"] ?>">
    <td><?php echo $graph["name"]; ?></td>
    <td><?php echo $graph["title"]; ?></td>
    <td><?php echo $graph["description"]; ?></td>
    <td><?php echo $graph["type"]; ?></td>
    <td><?php echo $graph["period"]; ?></td>
    <td>
        <a href="main.php?p=<?php echo $p; ?>&action=delete&controleur=graph&id=<?php echo $graph['id']; ?>">Delete</a>
    </td>
</tr>

<?php endforeach; ?>
</table>
<?php if (!$has_one) { echo "<span class='info'>You have no graph yet. Create one by clicking on the \"Create a graph\" button.</span>"; } ?>

</div>
<h4><a href="main.php?p=<?php echo $p; ?>&action=get_form&controleur=graph" class="btn btn-xs btn-default">Create a graph</a></h4>
</div>


