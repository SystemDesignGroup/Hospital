//本地调试时，最后一张表可能会报错errorno:150，这个是mysql本身的bug，不用在意。在部署环境中确定没有问题。
create database hospital;
use hospital;
create table users(
id int,
name varchar(50),
password varchar(50),
email varchar(50),
role int,
id_card char(18),
tel char(11),
status int,
create_time timestamp,
update_time timestamp
);
create table calendar(
id int primary key,
type int,
detail varchar(255),
off_start date,
off_end date,
create_time timestamp,
update_time timestamp
);
create table city(
id int primary key,
name varchar(50),
provinces varchar(50),
create_time timestamp,
update_time timestamp
);
create table major(
id int primary key,
name varchar(50),
intro text,
create_time timestamp,
update_time timestamp
);
create table grade(
id int primary key,
detail varchar(50),
create_time timestamp,
update_time timestamp
);
create table hospital(
id int primary key,
name varchar(50),
city int,
address text,
major_id int,
grade_id int,
tel char(11),
intro text,
create_time timestamp,
update_time timestamp,
foreign key (city) references city(id),
foreign key (grade_id) references grade(id)
);
create table department(
id int primary key,
name varchar(50),
hospital_id int,
intro text,
create_time timestamp,
update_time timestamp,
foreign key (hospital_id) references hospital(id)
);
create table doctor(
id int primary key,
name varchar(20),
department_id int,
major_id int,
grade_id int,
hospital_id int,
intro text,
calendar_id int,
create_time timestamp,
update_time timestamp,
foreign key (department_id) references department(id),
foreign key (major_id) references major(id),
foreign key (grade_id) references grade(id),
foreign key (hospital_id) references hospital(id),
foreign key (calendar_id) references calendar(id)
);
create table order_hospital(
id int primary key,
user_id int,
doctor_id int,
order_date Date,
order_time time,
order_status int,
create_time timestamp,
update_time timestamp,
foreign key (user_id) references users(id),
foreign key (doctor_id) references doctor(id)
);