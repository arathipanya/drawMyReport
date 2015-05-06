<div class="container">
    <div class="jumbotron">

<?php foreach ($report as $r) : ?>
        <h2><?php echo $r["title"] ?></h2>
        <h3><small><?php echo $r["subtitle"] ?></small></h3>
<?php endforeach; ?>
    </div>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
   <script>
   google.load('visualization', '1', {packages: ['corechart', 'line']});
google.setOnLoadCallback(drawChart);

function drawChart() {

  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Memory');
  data.addColumn('number', 'Percentage of use');
  data.addRows([
		["Free", 32],
		["Used", 68]
		]);

  var options = {
  title: '',
  sliceVisibilityThreshold: .2
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);


  //linechart
  var data = new google.visualization.DataTable();
  data.addColumn('number', 'X');
  data.addColumn('number', 'load1');
  data.addColumn('number', 'load15');
  //  data.addColumn('number', 'load5');

  data.addRows([
		[0,0.01,0.050000],    [1, 10, 5],   [2, 23, 15],  [3, 17, 9],   [4, 18, 10],  [5, 9, 5],
		[6, 11, 3],   [7, 27, 19],  [8, 33, 25],  [9, 40, 32],  [10, 32, 24], [11, 35, 27],
		[12, 30, 22], [13, 40, 32], [14, 42, 34], [15, 47, 39], [16, 44, 36], [17, 48, 40],
		[18, 52, 44], [19, 54, 46], [20, 42, 34], [21, 55, 47], [22, 56, 48], [23, 57, 49],
		[24, 60, 52], [25, 50, 42], [26, 52, 44], [27, 51, 43], [28, 49, 41], [29, 53, 45],
		[30, 55, 47], [31, 60, 52], [32, 61, 53], [33, 59, 51], [34, 62, 54], [35, 65, 57],
		[36, 62, 54], [37, 58, 50], [38, 55, 47], [39, 61, 53], [40, 64, 56], [41, 65, 57],
		[42, 63, 55], [43, 66, 58], [44, 67, 59], [45, 69, 61], [46, 69, 61], [47, 70, 62],
		[48, 72, 64], [49, 68, 60], [50, 66, 58], [51, 65, 57], [52, 67, 59], [53, 70, 62],
		[54, 71, 63], [55, 72, 64], [56, 73, 65], [57, 75, 67], [58, 70, 62], [59, 68, 60],
		[60, 64, 56], [61, 60, 52], [62, 65, 57], [63, 67, 59], [64, 68, 60], [65, 69, 61],
		[66, 70, 62], [67, 72, 64], [68, 75, 67], [69, 80, 72]
		]);

  var options = {
  hAxis: {
    title: 'Date',
    logScale: true
  },
  vAxis: {
    title: 'Load',
    logScale: false
  },
  colors: ['#a52714', '#097138']
  };

  var chart = new google.visualization.LineChart(document.getElementById('linechart'));
  chart.draw(data, options);
}

   </script>

  <!--img class="graph" data-path="<?php echo $path; ?>include/php/generate_graph.php?service_id=<?php echo $graphs_array[$i]->data ?>&tp=<?php echo $tp ?>&session_id=<?php echo session_id();?>&time=<?php echo time();?>&width=600"/-->

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

  <div class="page-header">
      <h5>Central Memory</h5>
      <h6><small>day - Mémoire de Centreon Central</small></h6>
  </div>

  <div class="row">
      <div class="col-md-6" id="piechart" style="width: 400px; height: 300px;"></div>
      <div class="col-md-6">
          <div class="row">
              <div class="col-md-12"><strong>Last 7 days :</strong> gained 3% per day. Limit reached in 26 days</div>
          </div>
          <div class="row">
              <div class="col-md-12"><strong>Last month :</strong> gained 1% per day. Limit reached in 77 days</div>
          </div>
      </div>
  </div>
  <br>
  <br>
  <div class="page-header">
      <h5>Central Load</h5>
      <h6><small>day - Load de Centreon Central</small></h6>
  </div>

  <div class="row">
      <div class="col-md-6" id="linechart" style="width: 400px; height: 300px;"></div>
      <div class="col-md-6">
          <div class="row">
  <div class="col-md-12"><strong>Last 7 days :</strong> gained 2% per day. Limit reached in 135 days</div>
          </div>
          <div class="row">
  <div class="col-md-12"><strong>Last month :</strong> gained 4% per day. Limit reached in 68 days</div>
          </div>
      </div>
  </div>


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