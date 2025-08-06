CREATE DATABASE IF NOT EXISTS accounts;
USE accounts;

CREATE TABLE accounts(
    account_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL 
);
--password_hash() max output can be 255 characters