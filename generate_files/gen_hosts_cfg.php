<?php

	$handle = create_file("/usr/local/nagios/etc/Dummy_host.cfg", $oreon->user->get_name());
	
	$str .= "define host{\n";
	$str .= print_line("host_name", "_Module_Dummy"); // make sure to name it with the _Module_ prefix
	$str .= print_line("alias", "Dummy Module For Centreon");
	$str .= print_line("address", "127.0.0.1");
	$str .= print_line("check_command", "check_host_alive");
	$str .= print_line("max_check_attempts", "3");
	$str .= print_line("checks_enabled", "1");
	$str .= print_line("notification_interval", "60");
	$str .= print_line("notification_period", "24x7");
	$str .= print_line("notification_options", "d");
	$str .= print_line("notifications_enabled", "0");
	$str .= print_line("register", "1");
	$str .= "\t}\n\n";
	
	write_in_file($handle, $str, "/usr/local/nagios/etc/Dummy_host.cfg");
	fclose($handle);
	unset($str);
?>