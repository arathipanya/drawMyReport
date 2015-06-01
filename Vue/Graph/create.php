<?php $p = self::nettoyer($_GET['p']); ?>

<form class="form col-lg-6" role="form" id="form-create-graph" method="post" action="?p=<?php echo $p ?>&action=create&controleur=graph">
  <h3>New graph <!--a href="#form-create-graph" class="close-create-graph" title="close form">close</a--></h3>
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
      <span class="input-group-addon">Description</span>
      <input type="text" class="form-control" name="description" placeholder="Description">
    </div>
    <br>

    <div class="input-group" id="">
        <span class="input-group-addon">Type</span>
        <div class="form-control" id="">   
            <div class="select-parent">
                <select type="text" class="form-control" name="type" placeholder="Select a type">
                    <option value="line-chart">Line chart</option>
                    <option value="area-chart">Area chart</option>
                </select>
            </div>
        </div>
    </div>

    <div class="input-group" id="" style="display: none;">
        <span class="input-group-addon">Period</span>
        <div class="form-control" id="">   
            <div class="select-parent">
                <select type="text" class="form-control" name="period" placeholder="Select a period">
                    <option value="day">Day</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
                </select>
            </div>
        </div>
    </div>

    <div class="input-group">
        <!--span class="input-group-addon">Service groups</span>
        <div class="form-control col-md-3" id="">
            <div class="select-parent">
                <Select type="text" class="form-control relation-select" data-query="?p=<?php echo $p; ?>&action=getServicesByServiceGroup&controleur=graph&min=1" name="">
                    <option value="">-</option>
   <?php foreach ($servicegroups as $sg): ?>
                    <option value="<?php echo $sg['id']; ?>">
   <?php echo $sg["name"];
         if ($sg["comment"] != "" && $sg["comment"] != NULL) { echo " - ".$sg["comment"]; }
   ?>
                    </option>
   <?php endforeach; ?>
                </select>
            </div>
        </div>

        <span class="input-group-addon">Host groups</span>
        <div class="form-control col-md-3" id="">
            <div class="select-parent">
                <Select type="text" class="form-control relation-select" data-query="?p=<?php echo $p; ?>&action=getHostsByHostGroup&controleur=graph&min=1" name="">
                    <option value="">-</option>
   <?php foreach ($hostgroups as $hg): ?>
                    <option value="<?php echo $hg['id']; ?>">
   <?php echo $hg["name"];
         if ($hg["comment"] != "" && $hg["comment"] != NULL) { echo " - ".$hg["comment"]; }
   ?>
		    </option>
   <?php endforeach; ?>
                </select>
            </div>
        </div-->

        <span class="input-group-addon">Host/service</span>
        <div class="form-control col-md-3" id="">
            <div class="select-parent">
                <Select type="text" class="form-control" name="data">
                    <option value="">-</option>
   <?php foreach ($dataIndex as $data): ?>
                    <option value="<?php echo $data['id']; ?>">
   <?php echo $data["host_name"]." - ".$data["service_description"]; ?>
		    </option>
   <?php endforeach; ?>
                </select>
            </div>
        </div>

    </div>

    <div id="targetHTML"></div>

    <br>
    <button class="btn btn-default" type="submit">Save</button>
  </form>
