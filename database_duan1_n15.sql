create database duan1_n15;
use duan1_n15;
-- drop database duan1_n15;

create table base_plate(
 id_base_plate int primary key auto_increment,
 name varchar(255)
);

create table screen_solution(
 id_screen_solution int primary key auto_increment,
 name varchar(255),
 number_number varchar(255)
);

create table scan_frequency(
 id_scan_frequency int primary key auto_increment,
 number int
);

create table connection_port(
 id_connection_port int primary key auto_increment,
 name varchar(255)
);

create table color_space(
 id_color_space int primary key auto_increment,
 name varchar(255)
);

create table brand(
 id_brand int primary key auto_increment,
 name varchar(255)
);

create table monitor(
 id_monitor int primary key auto_increment,
 name varchar(255),
 price int,
 type_screen boolean,
 brightness varchar(255),
 response_time float,
 in_stock int,
 gurantee int,
 size int,
 describe_monitor text,
 status boolean,
 brand int,
 color_space int,
 connection_port int,
 base_plate int,
 screen_solution int,
 scan_frequency int
);

create table images(
 id_image int primary key auto_increment,
 path varchar(255),
 name varchar(255),
 id_monitor int
);

create table address(
 id_address int primary key auto_increment,
 number varchar(255),
 street varchar(255),
 ward varchar(255),
 district varchar(255),
 city varchar(255),
 id_user int
);

create table user(
 id_user int primary key auto_increment,
 name varchar(255),
 image varchar(255),
 gender varchar(255),
 email varchar(255),
 password varchar(255),
 birthday date,
 nick_name varchar(255),
 status boolean
);

create table phone_number(
 id_phone_number int primary key auto_increment,
 phone_number varchar(11),
 status boolean,
 id_user int
);

create table bill(
 id_bill int primary key auto_increment,
 date_time datetime,
 id_user int
);

create table bill_detail(
 id_bill_detail int primary key auto_increment,
 quatity int,
 price int,
 id_monitor int,
 id_bill int
);


create table rating(
 id_rating int primary key auto_increment,
 number int,
 date_time datetime,
 id_user int,
 id_monitor int
);

create table comment(
 id_comment int primary key auto_increment,
 content_comment text,
 date_time datetime,
 id_comment_parent int,
 id_user int,
 id_monitor int
);

create table love(
 id_love int primary key auto_increment,
 id_user int,
 id_monitor int
);

create table views(
 id_views int primary key auto_increment,
 date_time datetime,
 id_user int,
 id_monitor int
);

create table voucher_status(
 id_voucher_status int primary key auto_increment,
 status varchar(255)
);

create table voucher(
 id_voucher int primary key auto_increment,
 number int,
 unit varchar(255),
 limit_number int,
 limit_date_time datetime,
 id_voucher_status int,
 id_bill_detail int
);

ALTER TABLE monitor
ADD CONSTRAINT FK2_monitor
FOREIGN KEY (color_space) REFERENCES color_space(id_color_space);

ALTER TABLE monitor
ADD CONSTRAINT FK3_monitor
FOREIGN KEY (connection_port) REFERENCES connection_port(id_connection_port);

ALTER TABLE monitor
ADD CONSTRAINT FK4_monitor
FOREIGN KEY (base_plate) REFERENCES base_plate(id_base_plate);

ALTER TABLE monitor
ADD CONSTRAINT FK5_monitor
FOREIGN KEY (screen_solution) REFERENCES screen_solution(id_screen_solution);

ALTER TABLE monitor
ADD CONSTRAINT FK6_monitor
FOREIGN KEY (scan_frequency) REFERENCES scan_frequency(id_scan_frequency);

ALTER TABLE monitor
ADD CONSTRAINT FK7_monitor
FOREIGN KEY (brand) REFERENCES brand(id_brand);

ALTER TABLE images
ADD CONSTRAINT FK_images
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);

ALTER TABLE address
ADD CONSTRAINT FK_address
FOREIGN KEY (id_user) REFERENCES user(id_user);

ALTER TABLE phone_number
ADD CONSTRAINT FK_phone_number
FOREIGN KEY (id_user) REFERENCES user(id_user);

ALTER TABLE bill
ADD CONSTRAINT FK_bill
FOREIGN KEY (id_user) REFERENCES user(id_user);

ALTER TABLE bill_detail
ADD CONSTRAINT FK1_bill_detail
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);

ALTER TABLE bill_detail
ADD CONSTRAINT FK2_bill_detail
FOREIGN KEY (id_bill) REFERENCES bill(id_bill);

ALTER TABLE rating
ADD CONSTRAINT FK1_rating
FOREIGN KEY (id_user) REFERENCES user(id_user);

ALTER TABLE rating
ADD CONSTRAINT FK2_rating
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);

ALTER TABLE comment
ADD CONSTRAINT FK1_comment
FOREIGN KEY (id_user) REFERENCES user(id_user);

ALTER TABLE comment
ADD CONSTRAINT FK2_comment
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);

ALTER TABLE love
ADD CONSTRAINT FK1_love
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);

ALTER TABLE love
ADD CONSTRAINT FK2_love
FOREIGN KEY (id_user) REFERENCES user(id_user);

ALTER TABLE views
ADD CONSTRAINT FK1_views
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);

ALTER TABLE views
ADD CONSTRAINT FK2_views
FOREIGN KEY (id_user) REFERENCES user(id_user);

ALTER TABLE voucher
ADD CONSTRAINT FK1_voucher
FOREIGN KEY (id_bill_detail) REFERENCES bill_detail(id_bill_detail);

ALTER TABLE voucher
ADD CONSTRAINT FK2_voucher
FOREIGN KEY (id_voucher_status) REFERENCES voucher_status(id_voucher_status);