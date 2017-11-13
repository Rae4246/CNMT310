CREATE TABLE User (
	user_id int not null primary key auto_increment,
	username varchar(255),
	password varchar(255),
	status varchar(255),
	last_login datetime,
	name varchar(255)
);

CREATE TABLE UserRole (
	user_role_id int not null primary key auto_increment,
   	user_id int,
	role_id int,
	last_change datetime
);

CREATE TABLE Role (
	role_id int not null primary key auto_increment,
	role_name varchar(255)
);

CREATE TABLE MusicEntries (
	musicEntryID int not null primary key auto_increment,
	song_id int,
	album_id int,
	label_id int,
	stack_id int,
	artist_id int,
	timestamp datetime
);

CREATE TABLE Songs (
	song_id int not null primary key auto_increment,
	song_name varchar(255),
	album_id int,
	label_id int,
	stack_id int,
	artist_id int
);

CREATE TABLE Album (
	album_id int not null primary key auto_increment,
	album_name varchar(255),
	artist_id int,
	label_id int
);

CREATE TABLE Artist (
	artist_id int not null primary key auto_increment,
	album_name varchar(255)
);

CREATE TABLE Label (
	label_id int not null primary key auto_increment,
	label_name varchar(255)
);

CREATE TABLE Stack (
	stack_id int not null primary key auto_increment,
	stack_name int
);
