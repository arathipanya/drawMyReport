<script>
google.load('visualization', '1', {packages: ['corechart', 'line', 'table']});
</script>
<script type="text/javascript" src="http://gabelerner.github.io/canvg/rgbcolor.js"></script> 
<script type="text/javascript" src="http://gabelerner.github.io/canvg/StackBlur.js"></script>
<script type="text/javascript" src="http://gabelerner.github.io/canvg/canvg.js"></script>

<div class="container" id="target">
    <div class="jumbotron">

   <?php foreach ($report as $r) : ?>
        <h2><?php echo $r["title"] ?></h2>
        <h3><small><?php echo $r["subtitle"] ?></small></h3>
   <h4>From: <input id="dp-start" class="date-picker" name="start" placeholder="mm/dd/yyyy"> - To: <input id="dp-end" class="date-picker" name="end" placeholder="mm/dd/yyyy"><button class="date-picker-btn untarget">Confirm</button></h4>
<?php endforeach; ?>
    </div>


  <!--img class="graph" data-path="<?php echo $path; ?>include/php/generate_graph.php?service_id=<?php echo $graphs_array[$i]->data ?>&tp=<?php echo $tp ?>&session_id=<?php echo session_id();?>&time=<?php echo time();?>&width=600"/-->

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
  
  <?php foreach ($graphs as $graph) : ?>
  <div class="page-header">
  <h5><?php echo $graph["title"]; ?></h5>
  <h6><small><?php echo $graph["period"]; ?> - <?php echo $graph["description"]; ?></small></h6>
  </div>

  <div class="row">
      <div class="untarget-after col-md-6 <?php echo $graph['type']; ?>" style="width: 400px; height: 300px;" data-index="<?php echo $graph['data']; ?>" data-sid="<?php echo session_id(); ?>"></div>
      <canvas class="canvases col-md-6" hidden width="400px" height="300px"></canvas>
      <div class="col-md-6">
          <div class="row">
  <div class="col-md-12"><strong>Last 7 days :</strong> gained 2% per day. Limit reached in 135 days</div>
          </div>
          <div class="row">
  <div class="col-md-12"><strong>Last month :</strong> gained 4% per day. Limit reached in 68 days</div>
          </div>
      </div>
  </div>
  <?php endforeach; ?>


</div>
<div class="col-md-1"></div>
</div>

    <div class="row untarget">
<br>
<hr>
<br>
    <button id="cmd" type="button" class="btn btn-default">Export</button>
    </div>
</div>
</div>