create database WP;

use WP;

create table login (
  username  varchar(512) primary key,
  password  varchar(4096),
  firstname varchar(4096),
  lastname  varchar(4096),
  profile   varchar(4096)
);

insert into login values (
  "vishnu_narayan", 
  "8b62d8e29548f2e1c3f9966da773942406757ab7c55f3b844c248a2d292a30e98755aa5a42ff01b678409301cd180f563ba2916cfe49892ba44766ec253faaf7", 
  "Vishnu",
  "Narayan",
  "assets/img/apple.jpg"
);
