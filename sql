CREATE TABLEuser(
id int(11) NOT null PRIMARY KEY AUTO_INCREMENT,
first varchar(256) NOT null,
last varchar(256) NOT null,
 username varchar(256) NOT null,
password varchar(256) NOT null
);


CREATE TABLE profileimg(
id int(11) NOT null PRIMARY KEY AUTO_INCREMENT,
userid int(11) NOT null,
status int(11) not null
);