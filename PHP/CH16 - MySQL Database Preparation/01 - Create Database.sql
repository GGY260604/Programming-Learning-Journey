-- FILE: 01 - Create Database.sql
-- TOPIC: CH16 - MySQL Database Preparation

-- GOAL:
-- Create a database that will be used by the PHP database chapters.

-- IMPORTANT:
-- A database is like a container.
-- Inside the database, we can create tables.
-- Tables store actual records such as students, products, orders, and users.

-- CREATE DATABASE creates a new database.
-- IF NOT EXISTS prevents an error if the database already exists.
CREATE DATABASE IF NOT EXISTS php_note_db;

-- USE selects the database that we want to work with.
-- After this line, the next SQL commands will run inside php_note_db.
USE php_note_db;
