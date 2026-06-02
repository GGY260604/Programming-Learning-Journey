<?php
/*
  FILE: 02 - create.php
  TOPIC: CH22 - Complete CRUD System

  GOAL:
  - Display a form for adding a new student.
  - Learn the first page involved in the CREATE operation.

  IMPORTANT:
  - This file does not insert data directly.
  - It only displays the form.
  - The form sends data to 03 - store.php using POST.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Create Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Create Student</h1>

        <p>
            This page demonstrates the form part of the <strong>Create</strong> operation.
            After submission, the data will be sent to <code>03 - store.php</code>.
        </p>

        <div class="nav">
            <a href="01%20-%20index.php">Back to Student List</a>
        </div>

        <div class="box">
            <h2>New Student Form</h2>

            <form action="03%20-%20store.php" method="post">

                <div class="form-group">
                    <label for="student_name">Student Name</label>
                    <input type="text" id="student_name" name="student_name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" id="course" name="course" required>
                </div>

                <div class="form-group">
                    <label for="year_level">Year Level</label>
                    <select id="year_level" name="year_level" required>
                        <option value="">-- Select Year --</option>
                        <option value="1">Year 1</option>
                        <option value="2">Year 2</option>
                        <option value="3">Year 3</option>
                        <option value="4">Year 4</option>
                    </select>
                </div>

                <button type="submit" class="button-primary">Save Student</button>
            </form>
        </div>

        <div class="box info">
            <h2>Important Concept</h2>
            <p>
                The form uses <code>method="post"</code> because we are sending data
                that changes the database.
            </p>
        </div>

    </div>

</body>
</html>
