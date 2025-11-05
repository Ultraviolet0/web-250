-- **************************************************************************
-- This script creates the admins table for the Chaingang website
-- Robert Uhren
-- WEB-250
-- November 2, 2025
-- **************************************************************************

-- select the database
USE chain_gang;

-- drop tables
DROP TABLE IF EXISTS `admins`;

-- create the tables
CREATE TABLE `admins` (
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`username` VARCHAR(255) NOT NULL,
	`hashed_password` VARCHAR(255) NOT NULL,
	INDEX index_username (`username`)
);

-- insert data
INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(1, 'Robert', 'Uhren', 'robertduhren@students.abtech.edu', 'ruhren', '$2y$10$ImITj9NY3.0iUdoB7OKSv.X25VCh2/lnoELjCF6C/sfY5pOba/evu');