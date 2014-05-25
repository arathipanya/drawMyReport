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


<form class="bs-example bs-example-form" role="form" id="form-email" method="post" action="./include/php/treat_email.php">
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
    <div class="input-group">
      <span class="input-group-addon">
        type1
        <input type="radio" name="type" value="type1">
      </span>
      <span class="input-group-addon">
        type2
        <input type="radio" name="type" value="type2">
      </span>
      <span class="input-group-addon">
        type3
        <input type="radio" name="type" value="type3">
      </span>
      <span class="input-group-addon">
        type4
        <input type="radio" name="type" value="type4">
      </span>
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">
        day
        <input type="radio" name="period" value="day">
      </span>
      <span class="input-group-addon">
        week
        <input type="radio" name="period" value="week">
      </span>
      <span class="input-group-addon">
        month
        <input type="radio" name="period" value="month">
      </span>
      <span class="input-group-addon">
        year
        <input type="radio" name="period" value="year">
      </span>
    </div>
    <button class="btn btn-default" type="submit">Save</button>
  </form>