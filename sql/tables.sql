DROP TABLE IF EXISTS dishes, meals, memberships, groups, users;

CREATE TABLE users (
	username VARCHAR(25),
	password VARCHAR(128) UNIQUE NOT NULL,
	salt VARCHAR(16) UNIQUE NOT NULL,
	email VARCHAR(255) UNIQUE NOT NULL,
	fname VARCHAR(35) NOT NULL,
	sname VARCHAR(35) NOT NULL,
	PRIMARY KEY(username)
);

CREATE TABLE dishes (
	dishdate DATE,
	username VARCHAR(25),
	PRIMARY KEY(dishdate),
	FOREIGN KEY(username) REFERENCES users(username) ON DELETE CASCADE
);

CREATE TABLE meals (
	mealdate DATE,
	username VARCHAR(25),
	PRIMARY KEY(mealdate),
	FOREIGN KEY(username) REFERENCES users(username) ON DELETE CASCADE
);

CREATE TABLE groups (
	name VARCHAR(25),
	PRIMARY KEY(name)
);

CREATE TABLE memberships (
	username VARCHAR(25),
	groupname VARCHAR(25),
	leader BOOLEAN,
	PRIMARY KEY(username, groupname),
	FOREIGN KEY(username) REFERENCES users(username) ON DELETE CASCADE,
	FOREIGN KEY(groupname) REFERENCES groups(name) ON DELETE CASCADE
);

INSERT INTO users VALUES("initium", "56cb5f3eb09df62e1ce0ecd4a4fa1814cdb707bd02b983835570a7e41f4224a03ef0072515ccf02618773d0d423a31f9caadac71951f5105e5eaaa9166206c0b", "ex1/Dmg7NAjiCLoR", "emil.a.hammarstrom@gmail.com", "Emil", "Hammarstrom");
INSERT INTO groups VALUES("cleaning");
INSERT INTO memberships VALUES("initium", "cleaning", true);
