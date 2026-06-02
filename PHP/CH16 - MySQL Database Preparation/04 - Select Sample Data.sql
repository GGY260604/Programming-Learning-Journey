-- FILE: 04 - Select Sample Data.sql
-- TOPIC: CH16 - MySQL Database Preparation

-- GOAL:
-- Check whether the students table was created and filled correctly.

-- IMPORTANT:
-- SELECT is used to retrieve data from a table.
-- The asterisk symbol * means all columns.

USE php_note_db;

-- Select all students.
SELECT * FROM students;

-- Select only specific columns.
SELECT student_id, student_name, email, course, year_level
FROM students;

-- Select students from Year 1 only.
SELECT student_id, student_name, course, year_level
FROM students
WHERE year_level = 1;

-- Sort students by student name.
SELECT student_id, student_name, course, year_level
FROM students
ORDER BY student_name ASC;
