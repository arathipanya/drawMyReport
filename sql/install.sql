INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'DrawMyReport', NULL, 9, 901, 100, 1, './modules/drawMyReport/drawMyReport.php', NULL, '0', '1', '1');
INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'Home', NULL, 9, 901, 100, 1, './modules/drawMyReport/drawMyReport.php', NULL, '0', '1', '1');
INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'Graphs', NULL, 901, 90104, 100, 1, './modules/drawMyReport/list_graphs.php', NULL, '0', '1', '1');
INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'Reports', NULL, 901, 90105, 100, 1, './modules/drawMyReport/list_reports.php', NULL, '0', '1', '1');
INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'Emails', NULL, 901, 90106, 100, 1, './modules/drawMyReport/list_reports.php', NULL, '0', '1', '1');
INSERT INTO `topology` (`topology_id`, `topology_name`, `topology_icone`, `topology_parent`, `topology_page`, `topology_order`, `topology_group`, `topology_url`, `topology_url_opt`, `topology_popup`, `topology_modules`, `topology_show`) VALUES ('', 'Previews', NULL, 901, 90103, 100, 1, './modules/drawMyReport/drawMyReport.php', NULL, '0', '1', '1');


CREATE TABLE IF NOT EXISTS `drawmyreport_graphs` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) default NULL,
  `title` varchar(254) default NULL,
  `description` varchar(254) default NULL,
  `type` varchar(254) default NULL,
  `period` varchar(254) default NULL,
  `data` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `drawmyreport_emails` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) default NULL,
  `title` varchar(254) default NULL,
  `date_first_send` DATETIME default NULL,
  `date_last_send` DATETIME default NULL,
  `date_last_modification` DATETIME default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `drawmyreport_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) default NULL,
  `email` varchar(254) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `drawmyreport_reports` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) default NULL,
  `title` varchar(254) default NULL,
  `subtitle` varchar(254) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `drawmyreport_report_graphs` (
  `id` int(11) NOT NULL auto_increment,
  `report_id` int(11) DEFAULT '0' NOT NULL,
  `graph_id` int(11) DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `drawmyreport_emails_users` (
  `id` int(11) NOT NULL auto_increment,
  `email_id` int(11) DEFAULT '0' NOT NULL,
  `user_id` int(11) DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
