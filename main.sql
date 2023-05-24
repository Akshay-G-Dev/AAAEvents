create database eventia;
use eventia;
create table users(id int auto_increment primary key,email varchar(100),username varchar(100) unique, password varchar(100),category varchar(100));
create table events(id int auto_increment primary key,name varchar(100),description varchar(255));
create table category(id int auto_increment primary key,name varchar(50) );
insert into users(email,username,password,category) values("admin@admin.com","admin","admin","admin");
