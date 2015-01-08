<?php

$filepath = '/etc/centreon/centreon.conf.php';

if (file_exists($filepath)) {
  include($filepath);

  $connect = mysql_connect($conf_centreon['hostCentreon'], $conf_centreon['user'], $conf_centreon['password']) or die('Impossible de se connecter à la base de donnees'.mysql_error());
  mysql_select_db($conf_centreon['db']) or die('Impossible de trouver la base de donnees '.mysql_error());

  if (isset($_GET["delete"]) && isset($_GET["user_id"])) {
      if ($_GET["user_id"] !== "") 
      {
            $sql = mysql_query("DELETE FROM drawmyreport_users WHERE id='".$_GET["user_id"]."';");
      }
      return;
  }

  $sql = mysql_query("INSERT INTO drawmyreport_users (name, email) VALUES ('".$_POST["create_user"]["name"]."', '".$_POST["create_user"]["email"]."');");
  $insert_id = mysql_insert_id();

  $str = "";
  $str = '<div class="select-parent"><select type="text" class="form-control" name="create_email[users][]" placeholder="Select an user">
          <option value="-">-</option>';
  $str .= '<option selected value="'.$insert_id.'">'.$_POST["create_user"]["name"].' - '.$_POST["create_user"]["email"].'</options>';
  $str .= '</select></div><br>';

  echo $str;
?>


    <?php } ?>