<form class="form col-lg-6" role="form" id="form-create-graph" method="post" action="?p=<?php echo self::nettoyer($_GET['p']); ?>&action=create&controleur=report">
  <h3>New report <!--a href="#form-create-graph" class="close-create-graph" title="close form">close</a--></h3>
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

    <!--div class="input-group" id="select-graphs-list-report"-->
    <div class="input-group">
        <span class="input-group-addon">Graphs</span>
        <!--div class="form-control" id="select-graph-report-model"-->
        <div class="form-control" id="select-graph-report-model">

      <span class="input-group-addon">
      <?php foreach($graphs as $graph): ?>
        <input type="checkbox" name="graphs[]" value="<?php echo self::nettoyer($graph['id']); ?>">
        <?php echo self::nettoyer($graph['name']); ?>
      <?php endforeach; ?>
      </span>
      
<!--div class="select-parent">
    <select type="text" class="form-control" name="graphs[]" placeholder="Select a graph">
          <option value="-">-</option>

<?php foreach($graphs as $graph): ?>
          <option value="<?php echo self::nettoyer($graph['id']); ?>"><?php echo self::nettoyer($graph['name']); ?></options>
<?php endforeach; ?>
    </select>
</div>
<br>
<button class="btn btn-xs btn-primary add-graph-report" target="#select-graph-report-model">Add a graph</button-->

        </div>
    </div>
    <br>

    <button class="btn btn-default" type="submit">Save</button>
  </form>
