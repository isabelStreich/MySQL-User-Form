-- SET SQL_MODE
-- ="NO_AUTO_VALUE_ON_ZERO";


-- CREATE DATABASE `programmation-web-3` DEFAULT CHARACTER
-- SET latin1
-- COLLATE latin1_swedish_ci;
-- USE `programmation-web-3`;


-- DROP TABLE IF EXISTS tp_user;

-- CREATE TABLE tp_user
-- (
--     id INT(6)
--     UNSIGNED AUTO_INCREMENT PRIMARY KEY,
--     firstName VARCHAR
--     (30) NOT NULL,
--     lastName VARCHAR
--     (30) NOT NULL,
--     email VARCHAR
--     (50),
--     userName VARCHAR
--     (30) NOT NULL,
--     userPassword VARCHAR
--     (250) NOT NULL,
--     creationDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
--     modificationDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON
--     UPDATE CURRENT_TIMESTAMP
--     );