-- 19/12/2008 - Write here your uninstallation queries.

DELETE FROM `topology` WHERE `topology_page` = '9';
DELETE FROM `topology` WHERE `topology_page` = '901';
DELETE FROM `topology` WHERE `topology_page` = '90101';
DELETE FROM `topology` WHERE `topology_page` = '90102';
DELETE FROM `topology` WHERE `topology_page` = '90103';
DELETE FROM `topology` WHERE `topology_page` = '90104';
DELETE FROM `topology` WHERE `topology_page` = '90105';

DROP TABLE `drawmyreport_graphs`;
DROP TABLE `drawmyreport_emails`;
DROP TABLE `drawmyreport_users`;
DROP TABLE `drawmyreport_reports`;
DROP TABLE `drawmyreport_report_graphs`;
DROP TABLE `drawmyreport_emails_users`;
