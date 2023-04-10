create database eventia;
create table users(id int auto_increment primary key,username varchar(100) unique, password varchar(100),category varchar(100));
create table events(id int auto_increment primary key,name varchar(100),description varchar(255));
create table category(id int auto_increment primary key,name varchar(50) );
