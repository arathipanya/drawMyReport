-- 19/12/2008 - Write here your uninstallation queries.

DELETE FROM `topology` WHERE `topology_page` = '7';
DELETE FROM `topology` WHERE `topology_page` = '701';
DELETE FROM `topology` WHERE `topology_page` = '702';
DELETE FROM `topology` WHERE `topology_page` = '703';
DELETE FROM `topology` WHERE `topology_page` = '704';
DELETE FROM `topology` WHERE `topology_page` = '70103';
DELETE FROM `topology` WHERE `topology_page` = '70104';
DELETE FROM `topology` WHERE `topology_page` = '70105';
DELETE FROM `topology` WHERE `topology_page` = '70106';

DROP TABLE IF EXISTS `drawmyreport_graphs`;
DROP TABLE IF EXISTS `drawmyreport_emails`;
DROP TABLE IF EXISTS `drawmyreport_users`;
DROP TABLE IF EXISTS `drawmyreport_reports`;
DROP TABLE IF EXISTS `drawmyreport_report_graphs`;
DROP TABLE IF EXISTS `drawmyreport_emails_users`;
DROP TABLE IF EXISTS `drawmyreport_email_reports`;
