create database company;

use company;

CREATE TABLE events (
`id` int(6) NOT NULL auto_increment,
`title` varchar(999) NOT NULL default '',
`startdate` datetime NOT NULL default '2018-01-01 00:00:00',
`enddate` datetime NOT NULL default '2018-01-01 23:00:00',
PRIMARY KEY  (`id`),
UNIQUE KEY `id` (`id`)
);
insert into events value(1,'Interview','2018-01-01 00:00:00','2018-01-01-23:00:00');
