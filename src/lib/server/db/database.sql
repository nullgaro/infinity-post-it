CREATE DATABASE IF NOT EXISTS infinity_postits;

USE infinity_postits;

SET FOREIGN_KEY_CHECKS=0;

-- DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
    user_id int auto_increment PRIMARY KEY,
    username varchar(24) not null,
    password varchar(32) not null,
    creation_date date not null,
    email varchar(256) not null unique,
    verified boolean not null,
    vip boolean not null
);

-- DROP TABLE IF EXISTS postits;
CREATE TABLE IF NOT EXISTS postits(
    postit_id int auto_increment PRIMARY KEY,
    user_id int,
    content varchar(256) not null,
    color varchar(24),
    publish_date date not null,
    CONSTRAINT fk_postit_author
    FOREIGN KEY (user_id) REFERENCES users (user_id)
    ON DELETE SET NULL
);

SET FOREIGN_KEY_CHECKS=1;

INSERT INTO users(username, password, creation_date, email, verified, vip) VALUES ('Anonymous', 'Anonymous', '2000-01-01', 'anonymous@example.com', TRUE, FALSE);