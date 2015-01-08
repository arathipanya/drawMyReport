-- 19/12/2008 - Write here your uninstallation queries.

DELETE FROM `topology` WHERE `topology_page` = '9';
DELETE FROM `topology` WHERE `topology_page` = '901';
DELETE FROM `topology` WHERE `topology_page` = '90103';
DELETE FROM `topology` WHERE `topology_page` = '90104';
DELETE FROM `topology` WHERE `topology_page` = '90105';
DELETE FROM `topology` WHERE `topology_page` = '90106';
DELETE FROM `topology` WHERE `topology_page` = '90107';

DROP TABLE IF EXISTS `drawmyreport_graphs`;
DROP TABLE IF EXISTS `drawmyreport_emails`;
DROP TABLE IF EXISTS `drawmyreport_users`;
DROP TABLE IF EXISTS `drawmyreport_reports`;
DROP TABLE IF EXISTS `drawmyreport_report_graphs`;
DROP TABLE IF EXISTS `drawmyreport_emails_users`;
DROP TABLE IF EXISTS `drawmyreport_email_reports`;
