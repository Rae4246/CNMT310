SET foreign_key_checks = 0;
drop table users cascade;
drop table userrole cascade;
drop table role cascade;
drop table musicentries cascade;
drop table songs cascade;
drop table album cascade;
drop table artist cascade;
drop table label cascade;
drop table stack cascade;
SET foreign_key_checks = 1;

CREATE TABLE users (
	user_id int not null primary key auto_increment,
    username varchar(255),
    pass varchar(255),
    stat varchar(255),
    last_login datetime,
    realname varchar(255)
);

CREATE TABLE userrole (
	user_role_id int not null primary key auto_increment,
    user_id int not null,
    role_id int,
    last_change datetime
);

CREATE TABLE role (
	role_id int not null primary key auto_increment,
    role_name varchar(255)
);

CREATE TABLE musicentries (
	musicEntryID int not null primary key auto_increment,
	song_id int,
    album_id int,
    label_id int,
    stack_id int,
    artist_id int,
    user_id int,
    timestamp datetime
);

CREATE TABLE songs (
	song_id int not null primary key auto_increment,
    song_name varchar(255),
    album_id int,
    label_id int,
    stack_id int,
    artist_id int
);

CREATE TABLE album (
	album_id int not null primary key auto_increment,
    album_name varchar(255),
    artist_id int,
    label_id int
);

CREATE TABLE artist (
	artist_id int not null primary key auto_increment,
    album_name varchar(255)
);

CREATE TABLE label (
	label_id int not null primary key auto_increment,
    label_name varchar(255)
);

CREATE TABLE stack (
	stack_id int not null primary key auto_increment,
    stack_name int
);



-- alter tables add foreign key table userrole
Alter table userrole
add foreign key(user_id) references users(user_id); 

Alter table userrole
add foreign key(role_id) references role(role_id);


-- alter tables add foreign key table role
Alter table role
add foreign key(role_id) references userrole(role_id);


-- alter tables add foreign key table musicentries


Alter table musicentries
add foreign key(song_id) references songs(song_id); 

Alter table musicentries
add foreign key(album_id) references album(album_id);

Alter table musicentries
add foreign key(label_id) references label(label_id);

Alter table musicentries
add foreign key(stack_id) references stack(stack_id);

Alter table musicentries
add foreign key(artist_id) references artist(artist_id);

Alter table musicentries
add foreign key(user_id) references users(user_id);

-- alter tables add foreign key table user

Alter table users
add foreign key(user_id) references musicentries(user_id);

Alter table users
add foreign key(user_id) references userrole(user_id);


-- alter tables add foreign key table songs

Alter table songs
add foreign key(album_id) references musicentries(album_id);

Alter table songs
add foreign key(album_id) references album(album_id);

Alter table songs
add foreign key(label_id) references musicentries(label_id);

Alter table songs
add foreign key(label_id) references label(label_id);

Alter table songs
add foreign key(stack_id) references musicentries(stack_id);

Alter table songs
add foreign key(label_id) references stack(stack_id);

Alter table songs
add foreign key(artist_id) references artist(artist_id);

Alter table songs
add foreign key(label_id) references stack(stack_id);

Alter table songs
add foreign key(artist_id) references artist(artist_id);

-- alter tables add foreign key table album

Alter table album
add foreign key(album_id) references songs(album_id);

Alter table album
add foreign key(artist_id) references songs(artist_id);

Alter table album
add foreign key(label_id) references songs(label_id);

Alter table album
add foreign key(artist_id) references artist(artist_id);

Alter table album
add foreign key(label_id) references label(label_id);

-- alter tables add foreign key table Artist

Alter table artist
add foreign key(artist_id) references album(artist_id);

-- alter tables add foreign key table label

Alter table label
add foreign key(label_id) references album(label_id);










