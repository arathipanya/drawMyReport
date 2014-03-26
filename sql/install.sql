-- 19/12/2008
-- Write here your installation queries
-- Topology insert for menu level 1, level 2 and level 3

INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'DrawMyReport', NULL, NULL, 9, 100, 1, './modules/drawMyReport/drawMyReport.php', NULL, '0', '1', '1');
-- INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'My Menu', NULL, 9, 901, 100, 1, './modules/drawMyReport/drawMyReport.php', NULL, '0', '1', '1');
INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'Reports', NULL, 901, 90101, 100, 1, './modules/drawMyReport/reports.php', NULL, '0', '1', '1');
INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'Emails', NULL, 901, 90101, 100, 1, './modules/drawMyReport/emails.php', NULL, '0', '1', '1');
