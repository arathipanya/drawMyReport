<?php
$filepath = '/etc/centreon/centreon.conf.php';

if (file_exists($filepath) && isset($_GET['report_id'])) {
  include($filepath);

  $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
  mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());
  $sql = mysql_query("DELETE FROM drawmyreport_reports WHERE id='".$_GET['report_id']."';");

  $sql = mysql_query("DELETE FROM drawmyreport_report_graphs WHERE report_id='".$_GET['report_id']."';");
}
?>