DROP TABLE IF EXISTS dishes, meals, users;

CREATE TABLE users (
	username VARCHAR(25),
	password VARCHAR(128) UNIQUE NOT NULL,
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
