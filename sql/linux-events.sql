--
-- Scheme for the Linux Events site.
--  David Moreno Garza <damog@damog.net>
--


-- table places

CREATE TABLE places (
  id int(8) NOT NULL auto_increment,
  name varchar(255) NOT NULL default 'Damog.net',
  address text default NULL,
  extra text default NULL,
  PRIMARY KEY(id)
) TYPE=MyISAM;

INSERT INTO places (name, address, extra) VALUES (
  'Universidad Iberoamericana - Departamento de Ing. Electrónica',
  'Paseo de la Reforma 880',
  'Hasta casa de la chingada de lejos'
);


-- table region

CREATE TABLE region (
  id int(1) NOT NULL auto_increment,
  name varchar(20) NOT NULL,
  PRIMARY KEY(id)
) TYPE=MyISAM;

INSERT INTO region (name) VALUES ('North America');
INSERT INTO region (name) VALUES ('South America');
INSERT INTO region (name) VALUES ('Europe');
INSERT INTO region (name) VALUES ('Asia');
INSERT INTO region (name) VALUES ('Africa');
INSERT INTO region (name) VALUES ('Oceania');


-- table country

CREATE TABLE country (
  id int(3) NOT NULL auto_increment,
  id_region int(1) NOT NULL,
  name varchar(100) NOT NULL,
  PRIMARY KEY(id)
) TYPE=MyISAM;

INSERT INTO country (id_region, name) VALUES (1, 'Mexico');
INSERT INTO country (id_region, name) VALUES (1, 'United States');
INSERT INTO country (id_region, name) VALUES (2, 'Brazil');
INSERT INTO country (id_region, name) VALUES (3, 'Germany');
INSERT INTO country (id_region, name) VALUES (4, 'Japan');
INSERT INTO country (id_region, name) VALUES (5, 'Egypt');
INSERT INTO country (id_region, name) VALUES (6, 'Australia');


-- table state

CREATE TABLE state (
  id int(5) NOT NULL auto_increment,
  id_country int(3) NOT NULL,
  name varchar(50) NOT NULL,
  PRIMARY KEY(id)
) TYPE=MyISAM;

INSERT INTO state (id_country, name) VALUES (1, 'DF');
INSERT INTO state (id_country, name) VALUES (1, 'Guanajuato');
INSERT INTO state (id_country, name) VALUES (2, 'California');


-- table city

CREATE TABLE city (
  id int(8) NOT NULL auto_increment,
  id_state int(5) NOT NULL,
  name varchar(50) NOT NULL,
  PRIMARY KEY(id)
) TYPE=MyISAM;

INSERT INTO city (id_state, name) VALUES (2, 'Celaya');
INSERT INTO city (id_state, name) VALUES (3, 'Sacramento');


-- table languages

CREATE TABLE languages (
  id int(2) NOT NULL auto_increment,
  name varchar(20) NOT NULL,
  PRIMARY KEY(id)
) TYPE=MyISAM;

INSERT INTO languages (name) VALUES ('af');
INSERT INTO languages (name) VALUES ('ar');
INSERT INTO languages (name) VALUES ('hy');
INSERT INTO languages (name) VALUES ('bn');
INSERT INTO languages (name) VALUES ('bg');
INSERT INTO languages (name) VALUES ('ca');
INSERT INTO languages (name) VALUES ('zh');
INSERT INTO languages (name) VALUES ('hr');
INSERT INTO languages (name) VALUES ('cs');
INSERT INTO languages (name) VALUES ('da');
INSERT INTO languages (name) VALUES ('nl');
INSERT INTO languages (name) VALUES ('eo');
INSERT INTO languages (name) VALUES ('et');
INSERT INTO languages (name) VALUES ('fi');
INSERT INTO languages (name) VALUES ('fr');
INSERT INTO languages (name) VALUES ('gl');
INSERT INTO languages (name) VALUES ('el');
INSERT INTO languages (name) VALUES ('he');
INSERT INTO languages (name) VALUES ('hi');
INSERT INTO languages (name) VALUES ('ga');
INSERT INTO languages (name) VALUES ('it');
INSERT INTO languages (name) VALUES ('ja');
INSERT INTO languages (name) VALUES ('ko');
INSERT INTO languages (name) VALUES ('la');
INSERT INTO languages (name) VALUES ('mn');
INSERT INTO languages (name) VALUES ('no');
INSERT INTO languages (name) VALUES ('pl');
INSERT INTO languages (name) VALUES ('pt');
INSERT INTO languages (name) VALUES ('ro');
INSERT INTO languages (name) VALUES ('ru');
INSERT INTO languages (name) VALUES ('sk');
INSERT INTO languages (name) VALUES ('sl');
INSERT INTO languages (name) VALUES ('sv');
INSERT INTO languages (name) VALUES ('tr');
INSERT INTO languages (name) VALUES ('uk');
INSERT INTO languages (name) VALUES ('cy');
INSERT INTO languages (name) VALUES ('es');
INSERT INTO languages (name) VALUES ('en');
INSERT INTO languages (name) VALUES ('de');
INSERT INTO languages (name) VALUES ('fr');
INSERT INTO languages (name) VALUES ('br');


-- table topics

CREATE TABLE topics (
  id int(3) NOT NULL auto_increment,
  topic varchar(100) NOT NULL default '',
  PRIMARY KEY(id)
) TYPE=MyISAM;

INSERT INTO topics (topic) VALUES ('Linux');


-- table events

CREATE TABLE events (
  id int(5) NOT NULL auto_increment,
  name varchar(255) NOT NULL,
  start_date datetime NOT NULL default '0000-00-00 00:00:00',
  end_date datetime NOT NULL default '0000-00-00 00:00:00',
  id_city int(8) NOT NULL default '0',
  id_place int(8) NOT NULL default '0',
  contact_name varchar(100) default NULL,
  contact_mail varchar(100) NULL default 'damog@damog.net',
  website varchar(100) default NULL,
  short_description varchar(255) NOT NULL default '',
  long_description blob default NULL,
  topic int(3) default NULL,
  first_lang int(2) default NULL,
  second_lang int(2) default NULL,
  third_lang int(2) default NULL,
  creation timestamp NOT NULL default 'now()',
  PRIMARY KEY(id)
) TYPE=MyISAM;

INSERT INTO events (name, start_date, end_date, id_city, id_place, contact_name, contact_mail, website, short_description, long_description, first_lang, second_lang) VALUES (
  'CONSOL 2005',
  '20040407',
  '20040410',
  1,
  1,
  'David Moreno Garza',
  'damog@damog.net',
  'http://www.consol.org.mx',
  'Congreso Nacional de Software Libre',
  'Este es el único y fenomenal CONSOL!!!!! ;D',
  1,
  2
);