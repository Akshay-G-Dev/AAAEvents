-- create database eventia;
-- use eventia;
-- create table users(id int auto_increment primary key,email varchar(100) unique,name varchar(100),mobile char(15), password varchar(100),category varchar(100));
-- create table events(id int auto_increment primary key,name varchar(100),description varchar(255));
-- create table category(id int auto_increment primary key,name varchar(50) );
-- insert into users(email,username,password,category) values("admin@admin.com","admin","admin","admin");


-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET AUTOCOMMIT = 0;
-- START TRANSACTION;


DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) 



DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) 
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `mobile` char(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) 

INSERT INTO `users` (`id`, `email`, `mobile`, `name`, `password`, `category`) VALUES
(1, 'admin@admin.com', '121', 'admin', 'admin', 'admin');
-- COMMIT;