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
 
// Be Carefull with internal_name, it's case sensitive (with directory module name)
$module_conf['drawMyReport']["name"] = "drawMyReport";
$module_conf['drawMyReport']["rname"] = "drawMyReport Module";
$module_conf['drawMyReport']["share_dir"] = "/share/"; 
$module_conf['drawMyReport']["mod_release"] = "2.0";
$module_conf['drawMyReport']["infos"] = "First of all";
$module_conf['drawMyReport']["is_removeable"] = "1";
$module_conf['drawMyReport']["author"] = "drawMyReport Team";
$module_conf['drawMyReport']["lang_files"] = "1";
$module_conf['drawMyReport']["sql_files"] = "1";
$module_conf['drawMyReport']["php_files"] = "0";
$module_conf['drawMyReport']["svc_tools"] = "0";  
$module_conf['drawMyReport']["host_tools"] = "0";
?>
