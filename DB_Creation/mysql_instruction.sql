create database randomgenerator;

use randomgenerator;

create table user(
id integer unsigned auto_increment primary key,
username varchar(30) not null,
fullname varchar(50) not null,
`password` varchar(30) not null)
 engine InnoDB
 charset utf8 collate utf8_bin;
 
create table student(
id integer unsigned auto_increment primary key,
`name` varchar(30) not null,
level integer unsigned not null
)
engine INNODB
charset utf8 collate utf8_bin;
 


INSERT INTO `student` (`name`, `level`) VALUES ('Sandrine', '1'), ('Sedat', 2);
