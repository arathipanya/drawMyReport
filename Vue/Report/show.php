<script>
google.load('visualization', '1', {packages: ['corechart', 'line', 'table']});
</script>
<script type="text/javascript" src="http://gabelerner.github.io/canvg/rgbcolor.js"></script> 
<script type="text/javascript" src="http://gabelerner.github.io/canvg/StackBlur.js"></script>
<script type="text/javascript" src="http://gabelerner.github.io/canvg/canvg.js"></script>

<div class="container" id="target">
    <div class="jumbotron">

   <?php foreach ($report as $r) : ?>
   <img class="logo" src="./modules/drawMyReport/Contenu/images/dmr-logo.png" height="100px">
        <h2><?php echo $r["title"] ?></h2>
        <h3><small><?php echo $r["subtitle"] ?></small></h3>
   <h5>From: <input id="dp-start" class="date-picker" name="start" placeholder="mm/dd/yyyy"> - To: <input id="dp-end" class="date-picker" name="end" placeholder="mm/dd/yyyy"><button class="date-picker-btn untarget">Confirm</button></h5>
<?php endforeach; ?>
    </div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
  
  <?php foreach ($graphs as $graph) : ?>
  <div class="page-header">
  <h5><?php echo $graph["title"]; ?></h5>
  <h6><small><?php echo $graph["period"]; ?> - <?php echo $graph["description"]; ?></small></h6>
  </div>

  <div class="row">
      <div class="chart untarget-after col-md-12 <?php echo $graph['type']; ?>" style="width: 100%; height: 300px;" data-index="<?php echo $graph['data']; ?>" data-sid="<?php echo session_id(); ?>"></div>
      <canvas class="canvases col-md-12" hidden width="100%" height="300px"></canvas>
      <div class="prevision col-md-12">
          <div class="row">
            <div class="col-md-12"><strong>Since beginning:</strong> Limit reached on <span class="beginning">No data available</span></div>
          </div>
          <div class="row">
            <div class="col-md-12"><strong>Last month:</strong> Limit reached on <span class="month">No data available</span></div>
          </div>
          <div class="row">
            <div class="col-md-12"><strong>Last 7 days:</strong> Limit reached on <span class="seven">No data available</span></div>
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