-- 19/12/2008 - Write here your uninstallation queries.

DELETE FROM `topology` WHERE `topology_page` = '7';
DELETE FROM `topology` WHERE `topology_page` = '710';
DELETE FROM `topology` WHERE `topology_page` = '720';
DELETE FROM `topology` WHERE `topology_page` = '730';
DELETE FROM `topology` WHERE `topology_page` = '740';
DELETE FROM `css_color_menu` WHERE `menu_nb` = '7';

DROP TABLE IF EXISTS `drawmyreport_graphs`;
DROP TABLE IF EXISTS `drawmyreport_emails`;
DROP TABLE IF EXISTS `drawmyreport_users`;
DROP TABLE IF EXISTS `drawmyreport_reports`;
DROP TABLE IF EXISTS `drawmyreport_report_graphs`;
DROP TABLE IF EXISTS `drawmyreport_emails_users`;
DROP TABLE IF EXISTS `drawmyreport_email_reports`;
