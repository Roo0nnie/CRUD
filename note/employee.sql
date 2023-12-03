create database block_c;
use bloc_c;
create table employee(
    emp_id			integer	auto_increment	not null,
    first_name		varchar(50)	not null default '',
  	last_name		varchar(50)	not null default '',
    middle_name		varchar(50) not null default '',
    middle_initial	varchar(5) not null default '',
    address			varchar(100) not null default '',
    email			varchar(100) not null default '',
    phone 			varchar(20) not null default '',
    primary key (emp_id)
    
);