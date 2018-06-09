CREATE TABLE album (
 id int(11) NOT NULL auto_increment,
 artist varchar(100) NOT NULL,
 title varchar(100) NOT NULL,
 PRIMARY KEY (id)
);

INSERT INTO album (artist, title)
   VALUES  ('The  Military  Wives',  'In  My  Dreams');
INSERT INTO album (artist, title)
   VALUES  ('Adele',  '21');
INSERT INTO album (artist, title)
   VALUES  ('Bruce  Springsteen',  'Wrecking Ball (Deluxe)');
INSERT INTO album (artist, title)
   VALUES  ('Lana  Del  Rey',  'Born  To  Die');
INSERT INTO album (artist, title)
   VALUES  ('Gotye',  'Making  Mirrors');

CREATE TABLE user (
 id int(11) NOT NULL auto_increment,
 name varchar(100) NOT NULL,
 password varchar(100) NOT NULL,
 role int(11) NOT NULL,
 PRIMARY KEY (id)
);

INSERT INTO user (username, password, role)
   VALUES  ('admin','pass', 1 );

INSERT INTO user (username, password, role)
   VALUES  ('john','doe', 2 );