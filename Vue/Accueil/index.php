<?php $this->titre = "DrawMyReport"; ?>


<div class="container">
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
<?php if (!$has_one) { echo "<span class='info'>You will find here your created reports. Start to create one in the \"Reports\" section in the menu.</span>"; } ?>
</div>
</div>


