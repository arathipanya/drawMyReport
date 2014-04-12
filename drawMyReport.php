<?php
/*
 * Centreon is developped with GPL Licence 2.0 :
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 * Developped by : Julien Mathis - Romain Le Merlus - Christophe Coraboeuf
 * 
 * The Software is provided to you AS IS and WITH ALL FAULTS.
 * Centreon makes no representation and gives no warranty whatsoever,
 * whether express or implied, and without limitation, with regard to the quality,
 * any particular or intended purpose of the Software found on the Centreon web site.
 * In no event will Centreon be liable for any direct, indirect, punitive, special,
 * incidental or consequential damages however they may arise and even if Centreon has
 * been previously advised of the possibility of such damages.
 * 
 * For information : contact@centreon.com
 */
 
	if (!isset ($oreon)) {
		exit ();
	}

	#Path to the configuration dir
	global $path;
	$path = "./modules/drawMyReport/";

	#PHP functions
	require_once "DB-Func.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
<div id="target">

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


<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/rgbcolor.js"></script> 
<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/StackBlur.js"></script>
<script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/canvg.js"></script> 


    Hello world we are <?php $contactInfo = getContactInfo(); $contact_name = $contactInfo[contact_name]; echo $contact_name; ?><br />
<br />

    <img id="graph" data-path="<?php echo $path; ?>include/php/generate_graph.php?service=15-30&tp=<?php echo 60 * 60 * 24 ?>&session_id=<?php echo session_id();?>&time=<?php echo time();?>&width=900"

    <div class="untarget">
        <p>This is a bootstrap button :</p>
        <button id="cmd" type="button" class="btn btn-primary">generate PDF</button>
    </div>
</div>
  </body>
</html>