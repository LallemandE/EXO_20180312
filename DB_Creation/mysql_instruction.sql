create database randomgenerator;

use randomgenerator;

create table user(
id integer unsigned auto_increment primary key,
username varchar(30) not null,
fullname varchar(50) not null,
`password` varchar(30) not null)
 engine InnoDB
 charset utf8 collate utf8_bin;
 
 
 