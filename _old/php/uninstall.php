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

	$sc_rpath = "./modules/dummy";

/* 
 * $DBRESULT =& $pearDB->query("");
 * if (PEAR::isError($DBRESULT)) {
 * 	print "DB Error : ".$DBRESULT->getDebugInfo()."<br />";
 * }
*/
	# Directory to delete
	# SRC
	$dirRM = array();
//	$dirRM[0] = $sc_rpath."/test";

	# Files to delete
	# SRC
	$filRM = array();
//	$filRM[0] = $sc_rpath."/files/sql/uninstall.sql";

	foreach ($dirRM as $key=>$value)
		rmdirr($value, false);
			
	foreach ($filRM as $key=>$value)
		unlink($value);
?>