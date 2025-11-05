-- **************************************************************************
-- This script creates the members table for the WNC Birds website
-- Robert Uhren
-- WEB-250
-- November 4, 2025
-- **************************************************************************

-- select the database
USE bird;

-- drop tables
DROP TABLE IF EXISTS `members`;

-- create the tables
CREATE TABLE `members` (
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`username` VARCHAR(255) NOT NULL,
	`hashed_password` VARCHAR(255) NOT NULL,
	`member_type` CHAR(1) NOT NULL DEFAULT 'm',
	INDEX index_username (`username`)
);

-- insert data
INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`, `member_type`) VALUES
(1, 'Robert', 'Uhren', 'robertduhren@students.abtech.edu', 'ruhren', '$2y$10$ImITj9NY3.0iUdoB7OKSv.X25VCh2/lnoELjCF6C/sfY5pOba/evu', 'a');