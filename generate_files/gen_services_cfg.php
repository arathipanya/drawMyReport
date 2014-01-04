<?php
	$handle = create_file("/usr/local/nagios/etc/Dummy_service.cfg", $oreon->user->get_name());
	$str .= print_line("service_description", "myservice");
	$str .= print_line("host_name", "_Module_Dummy");
	$str .= print_line("check_command", "check_centreon_dummy!0!OK");
	$str .= print_line("max_check_attempts", "1");
	$str .= print_line("normal_check_interval", "1");
	$str .= print_line("retry_check_interval", "1");
	$str .= print_line("active_checks_enabled", "1");
	$str .= print_line("passive_checks_enabled", "0");
	$str .= print_line("register", "1");
	$str .= "\t}\n\n";
	write_in_file($handle, $str, "/usr/local/nagios/etc/Dummy_service.cfg");
	fclose($handle);
	unset($str);
?>