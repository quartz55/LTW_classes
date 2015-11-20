CREATE TABLE IF NOT EXISTS users (
username VARCHAR PRIMARY KEY,
password VARCHAR
);

CREATE TABLE IF NOT EXISTS events (
id INTEGER PRIMARY KEY AUTOINCREMENT,
date DATE,
description VARCHAR,
type VARCHAR,
creator VARCHAR REFERENCES users(username)
);

CREATE TABLE IF NOT EXISTS event_comments (
id INTEGER PRIMARY KEY AUTOINCREMENT,
event_id INTEGER,
author VARCHAR,
text VARCAHR
);

CREATE TABLE IF NOT EXISTS event_registrations (
user VARCHAR,
event_id INTEGER,
PRIMARY KEY (user, event_id)
);
