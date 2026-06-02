-- FILE: 03 - Insert Sample Students.sql
-- TOPIC: CH16 - MySQL Database Preparation

-- GOAL:
-- Insert sample data into the students table.

-- IMPORTANT:
-- INSERT INTO is used to add records into a table.
-- We do not insert student_id manually because it is AUTO_INCREMENT.
-- We also do not insert created_at manually because it has DEFAULT CURRENT_TIMESTAMP.

USE php_note_db;

INSERT INTO students (student_name, email, course, year_level)
VALUES
    ('Galen', 'galen@example.com', 'Software Engineering', 1),
    ('Cleo', 'cleo@example.com', 'Data Engineering', 2),
    ('Ali', 'ali@example.com', 'Network Security', 1),
    ('Mei Ling', 'meiling@example.com', 'Artificial Intelligence', 3),
    ('Daniel', 'daniel@example.com', 'Information Systems', 2);

-- After running this file, the students table should contain five records.
