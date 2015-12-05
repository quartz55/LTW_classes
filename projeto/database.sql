DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
username VARCHAR PRIMARY KEY,
password VARCHAR
);

DROP TABLE IF EXISTS events;
CREATE TABLE IF NOT EXISTS events (
id INTEGER PRIMARY KEY AUTOINCREMENT,
date DATETIME,
description VARCHAR,
type VARCHAR,
creator VARCHAR REFERENCES users(username),
image VARCHAR
);

DROP TABLE IF EXISTS event_comments;
CREATE TABLE IF NOT EXISTS event_comments (
id INTEGER PRIMARY KEY AUTOINCREMENT,
event_id INTEGER,
author VARCHAR,
text VARCAHR
);

DROP TABLE IF EXISTS event_registrations;
CREATE TABLE IF NOT EXISTS event_registrations (
user VARCHAR,
event_id INTEGER,
PRIMARY KEY (user, event_id)
);

-- Default admin user
INSERT INTO users VALUES('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
