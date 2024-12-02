
create database duan1_n15;
use duan1_n15;
-- drop database duan1_n15;
SET FOREIGN_KEY_CHECKS=1;
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
 response_time float,
 in_stock int,
 gurantee int,
 size int,
 describe_monitor text character set utf8mb4 collate utf8mb4_unicode_ci,
 status boolean,
 brand int,
 color_space int,
 base_plate int,
 screen_solution int,
 scan_frequency int
);

create table connection_port_monitor(
	id_connection_port_monitor int primary key auto_increment,
    id_connection_port int,
    id_monitor int
);
select * from user;
select * from love;
create table images(
 id_image int primary key auto_increment,
 path varchar(255),
 name varchar(255),
 id_monitor int
);
select * from images where id_image = 1;
-- select * from bill where id_user = 1;

create table user(
 id_user int primary key auto_increment,
 name varchar(255) character set utf8mb4 collate utf8mb4_unicode_ci,
 phone varchar(255),
 image varchar(255),
 gender varchar(255),
 email varchar(255),
 password varchar(255),
 birthday date,
 address text,
 nick_name varchar(255),
 status boolean
);

-- insert into user values
-- (null, 'nguyen van a', '14541531435','cc.cc', null, 'vananguyen@gmail.com', 'dasdsadad415364153', null, null, 0);
select * from user;
select * from user where email = 'vananguyen0123@gmail.com' and password = 'vana123';

create table phone_number(
 id_phone_number int primary key auto_increment,
 phone_number varchar(11),
 status boolean,
 id_user int
);
select name from user where id_user = 2;
create table bill(
 id_bill int primary key auto_increment,
 date_time datetime,
 status boolean,
 id_user int
);
select email from user where email = 'cuong@gmail.com';
-- 0: buying
-- 1: paid
select * from bill where id_user = 1 and status = 0;
-- insert into bill values (null, current_timestamp(), 0, 2);
-- insert into bill values (null, current_timestamp(), 0, 1);
-- use duan1_n15;
select * from user;
-- update user set password = 'kiet123' where email = ''; select * from user;
-- select id_bill from bill where id_user = 1 and status = 0;
create table bill_detail(
 id_bill_detail int primary key auto_increment,
 quatity int,
 price int,
 id_monitor int,
 id_bill int,
 id_voucher int
);
select * from bill where id_user = 1 and status = 0;
select bill_detail.*, monitor.name, monitor.price as monitor_price from bill_detail
inner join monitor on bill_detail.id_monitor = monitor.id_monitor where id_bill = 1;
-- insert into bill_detail values (null, 2, 10000, 1, 1, null);
-- update bill_detail set quatity = 2 where id_bill = 1 and id_monitor = 4;
select quatity from bill_detail where id_bill = 1 and id_monitor = 4;
select * from bill_detail where id_bill = (select id_bill from bill where id_user = 1 and status = 0);
-- delete from bill_detail where id_monitor = 1 and id_bill = 1;
select bill_detail.*, monitor.name, monitor.price as monitor_price from bill_detail inner join monitor on bill_detail.id_monitor = monitor.id_monitor where id_bill = 1;
create table rating(
 id_rating int primary key auto_increment,
 number int,
 date_time datetime,
 id_user int,
 id_monitor int
);
select * from images where id_monitor = 2 limit 1;


create table comment(
 id_comment int primary key auto_increment,
 content_comment text character set utf8mb4 collate utf8mb4_unicode_ci,
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

select monitor.* from love inner join monitor on love.id_monitor = monitor.id_monitor where id_user = 2;
-- get more information in monitor table with inner join function
select id_monitor from love where id_user = 2;
select * from user;
-- delete from love where id_monitor = 1 and id_user = 1;
-- delete from love;

create table views(
 id_views int primary key auto_increment,
 date_time datetime,
 id_user int,
 id_monitor int
);

create table voucher(
 id_voucher int primary key auto_increment,
 name varchar(255),
 value int,
 -- unit -> 0: VND, 1: %
 unit boolean,
 limit_number int,
 date_start date,
 date_end date,
 id_monitor int
);
select * from voucher;
select id_bill from bill where id_user = 1 and status = 0;
select * from bill_detail;

select * from user;
select * from bill_detail where id_bill = (select id_bill from bill where id_user = 1 and status = 0);
-- update bill_detail set id_voucher = 1 where id_monitor = 1;
select monitor.name as monitor_name, bill_detail.price as monitor_price, voucher.*, quatity from bill_detail 
inner join voucher on bill_detail.id_voucher = voucher.id_voucher
inner join monitor on bill_detail.id_monitor = monitor.id_monitor where id_bill = 2;
select * from bill;
select * from bill_detail;
ALTER TABLE voucher
ADD CONSTRAINT FK_voucher
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);


ALTER TABLE monitor
ADD CONSTRAINT FK2_monitor
FOREIGN KEY (color_space) REFERENCES color_space(id_color_space);


ALTER TABLE monitor
ADD CONSTRAINT FK3_monitor
FOREIGN KEY (base_plate) REFERENCES base_plate(id_base_plate);

ALTER TABLE monitor
ADD CONSTRAINT FK4_monitor
FOREIGN KEY (screen_solution) REFERENCES screen_solution(id_screen_solution);

ALTER TABLE monitor
ADD CONSTRAINT FK5_monitor
FOREIGN KEY (scan_frequency) REFERENCES scan_frequency(id_scan_frequency);

ALTER TABLE monitor
ADD CONSTRAINT FK6_monitor
FOREIGN KEY (brand) REFERENCES brand(id_brand);

ALTER TABLE connection_port_monitor
ADD CONSTRAINT FK1_connection_port_monitor
FOREIGN KEY (id_connection_port) REFERENCES connection_port(id_connection_port);

ALTER TABLE connection_port_monitor
ADD CONSTRAINT FK2_connection_port_monitor
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);

ALTER TABLE images
ADD CONSTRAINT FK_images
FOREIGN KEY (id_monitor) REFERENCES monitor(id_monitor);


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

ALTER TABLE bill_detail
ADD CONSTRAINT FK3_bill_detail
FOREIGN KEY (id_voucher) REFERENCES voucher(id_voucher);

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

insert into brand values
(null, 'Dell'),
 (null, 'Samsung'),
 (null, 'Lenovo'),
 (null, 'Asus'),
 (null, 'LG'),
 (null, 'ACER');
 
insert into base_plate values 
(null, 'TN'),
(null, 'VA'),
(null, 'IPS');

insert into screen_solution values 
(null, 'HD (720p)', '1280 x 720 pixel'),
(null, 'Full HD (1080p)', '1920 x 1080 pixel'),
(null, 'QHD (1440p)', '2048 x 1080 pixel'),
(null, '4K (UHD)', '3840 x 2160 pixel'),
(null, '8K', '7680 x 4320 pixel');

insert into scan_frequency values 
(null, '60'),
(null, '75'),
(null, '120'),
(null, '144'),
(null, '165'),
(null, '240'),
(null, '360');

insert into color_space values 
(null, 'sRGB'),
(null, 'Adobe RGB'),
(null, 'DCI-P3'),
(null, 'NTSC');


insert into connection_port values 
(null, 'HDMI'),
(null, 'DisplayPort'),
(null, 'DVI'),
(null, 'USB-C'),
(null, 'VGA');


insert into monitor values
(null, 'Màn Hình Gaming ASUS TUF Gaming VG27AQ3A', 6200000, 0, 1, 20, 12, 24, 'Chân đế và dây nguồn được để trong hộp cùng với màn hình', 1, 4, 1, 3, 2, 4),
(null, 'Màn Hình Gaming ASUS TUF VG249Q3A', 6200000, 0, 1, 20, 12, 24, 'Chân đế và dây nguồn được để trong hộp cùng với màn hình', 1, 4, 1, 3, 2, 4),
(null, 'Màn hình ASUS VA27EHF', 6200000, 0, 1, 20, 12, 24, 'Chân đế và dây nguồn được để trong hộp cùng với màn hình', 1, 4, 1, 3, 2, 4),
(null, 'Màn Hình Game ASUS VG279QR', 6200000, 0, 1, 20, 12, 24, 'Chân đế và dây nguồn được để trong hộp cùng với màn hình', 1, 4, 1, 3, 2, 4);


insert into images values
(null, 'asus-tuf-vg27aq3a.jpg', 'asus-tuf-vg27aq3a', 1),
(null, 'asus-tuf-vg27aq3a-1.jpg', 'asus-tuf-vg27aq3a-1', 1),
(null, 'asus-tuf-vg27aq3a-2.jpg', 'asus-tuf-vg27aq3a-2', 1),
(null, 'asus-tuf-vg249q3a.jpg', 'asus-tuf-vg249q3a', 2),
(null, 'asus-tuf-vg249q3a-1.jpg', 'asus-tuf-vg249q3a-1', 2),
(null, 'asus-tuf-vg249q3a-2.jpg', 'asus-tuf-vg249q3a-2', 2),
(null, 'asus-va27ehf-27inch.jpg', 'asus-va27ehf-27inch', 3),
(null, 'asus-va27ehf-27inch-1.jpg', 'asus-va27ehf-27inch-1', 3),
(null, 'asus-vg279qr-27inch.jpg', 'asus-vg279qr-27inch', 4),
(null, 'asus-vg279qr-27inch-1.jpg', 'asus-vg279qr-27inch-1', 4);

select * from images where id_monitor = 1;

select * from images;

select id_monitor, monitor.name, price, type_screen, response_time, in_stock, gurantee, size, describe_monitor, status, brand.name as brand_name, color_space.name as color_space_name, base_plate.name as base_plate_name, screen_solution.name as screen_solution_name ,number_number, scan_frequency.number from monitor 
inner join brand on monitor.brand = brand.id_brand
inner join color_space on monitor.color_space = color_space.id_color_space
inner join base_plate on monitor.base_plate = base_plate.id_base_plate
inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution
inner join scan_frequency on monitor.scan_frequency = scan_frequency.id_scan_frequency
where id_monitor = 1;

select id_monitor from monitor where brand = (select brand from monitor where id_monitor = 1);
select * from images where id_monitor = 1 limit 1;
select brand from monitor where id_monitor = 1;

select * from brand;

select * from screen_solution;

-- image, name, price

select id_monitor, monitor.name, price, screen_solution.name as screen_solution_name, size from monitor
inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution;

select path, name, id_monitor from images;

select id_monitor, monitor.name, price, screen_solution.name as screen_solution_name, size from monitor
inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution where screen_solution = 2 and size = 24 and brand = 4 and price between 0 and 9000000;

insert into connection_port_monitor values
(null, 1, 1),
(null, 2, 1),
(null, 3, 1),
(null, 1, 2),
(null, 3, 2),
(null, 2, 3),
(null, 3, 3),
(null, 1, 4),
(null, 4, 4);



insert into voucher values 
(null, 'MUADONG1', 1, 1, 20, '2024-11-26', '2024-11-30', null),
(null, 'MUADONG2', 5000, 0, 20, '2024-11-26', '2024-11-30', null),
(null, 'MUADONG2', 7000, 0, 20, '2024-11-26', '2024-11-30', 1),
(null, 'MUADONG3', 1, 1, 20, '2024-11-26', '2024-11-30', 2);
select * from voucher;
-- update voucher set value = 1 where id_voucher = 4;
-- check id monitor of comment
select comment.*, user.name from comment inner join user on comment.id_user = user.id_user where id_monitor = 2;
-- SET FOREIGN_KEY_CHECKS=1; delete from comment;
-- insert into comment values
-- (null, 'dasdsadasdadasd', current_timestamp(), null, 1, 1),
-- (null, 'dasdsadasdadasd', current_timestamp(), 1, 1, 1),
-- (null, 'dasdsadasdadasd', current_timestamp(), 2, 1, 1),
-- (null, 'dasdsadasdadasd', current_timestamp(), 1, 1, 1),
-- (null, 'dasdsadasdadasd', current_timestamp(), 2, 1, 1),
-- (null, 'dasdsadasdadasd', current_timestamp(), null, 1, 2),
-- (null, 'dasdsadasdadasd', current_timestamp(), null, 1, 1);
select * from comment;
select comment.*, user.name from comment inner join user on comment.id_user = user.id_user where id_monitor = 3 order by date_time asc;
-- SET FOREIGN_KEY_CHECKS=1; delete from comment;