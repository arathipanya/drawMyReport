<?php $this->titre = "DrawMyReport"; ?>
<?php
$p = self::nettoyer($_GET['p']);
 ?>

<script type="text/javascript">
    window.history.pushState({}, "liste", "main.php?p=<?php echo $p; ?>&action=liste&controleur=report");
</script>


<div class="container">
<h4><a href="main.php?p=<?php echo $p; ?>&action=get_form&controleur=report" class="btn btn-xs btn-default">Create a report</a></h4>
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
    <td>
    <a href="main.php?p=<?php echo $p; ?>&action=show&controleur=report&id=<?php echo $report['id']; ?>">Show</a><br>
        <a href="main.php?p=<?php echo $p; ?>&action=delete&controleur=report&id=<?php echo $report['id']; ?>">Delete</a>
    </td>
</tr>

<?php endforeach; ?>
</table>
<?php if (!$has_one) { echo "<span class='info'>You have no report yet. Create one by clicking on the \"Create a report\" button.</span>"; } ?>

</div>
<h4><a href="main.php?p=<?php echo $p; ?>&action=get_form&controleur=report" class="btn btn-xs btn-default">Create a report</a></h4>
</div>


