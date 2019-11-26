CREATE TABLE event ( 
    eventName VARCHAR(60), 
    sponsor VARCHAR(50), 
    location VARCHAR(100), 
    eventDate DATE, 
    eventTime TIME(0),
    description VARCHAR(50),
    PRIMARY KEY (eventDate)
    );
CREATE TABLE users (
    userId VARCHAR(20),
    password CHAR(60),
    fname VARCHAR(30),
    lname VARCHAR(30),
    email VARCHAR(255),
    expirence VARCHAR(13),
    gender VARCHAR(7),
    age INT,
    address VARCHAR(50),
    city VARCHAR(30),
    state CHAR(2),
    PRIMARY KEY (userId)
    );
       