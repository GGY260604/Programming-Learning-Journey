<?php
/*
  FILE: 08 - Sticky Form Value.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn how to keep form values after submission.
  - Understand why sticky form values improve user experience.
  - Learn how to safely place PHP values inside input value attributes.

  IMPORTANT:
  - A sticky form remembers what the user typed.
  - This is useful when validation fails and the user needs to correct only one field.
  - Always use htmlspecialchars() when outputting user input into HTML attributes.
*/

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$gender = $_POST["gender"] ?? "";
$course = $_POST["course"] ?? "";

$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - Sticky Form Value</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">
            <div class="card">
            <h1>CH09 - Sticky Form Value</h1>

            <p>
                A sticky form keeps the user's previous input after submission.
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="<?= htmlspecialchars($name) ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= htmlspecialchars($email) ?>">
                </div>

                <div class="form-group">
                    <label>Gender</label>

                    <label class="inline-label">
                        <input
                            type="radio"
                            name="gender"
                            value="male"
                            <?= $gender === "male" ? "checked" : "" ?>>
                        Male
                    </label>

                    <label class="inline-label">
                        <input
                            type="radio"
                            name="gender"
                            value="female"
                            <?= $gender === "female" ? "checked" : "" ?>>
                        Female
                    </label>
                </div>

                <div class="form-group">
                    <label for="course">Course</label>
                    <select id="course" name="course">
                        <option value="">-- Select Course --</option>
                        <option value="php" <?= $course === "php" ? "selected" : "" ?>>PHP</option>
                        <option value="mysql" <?= $course === "mysql" ? "selected" : "" ?>>MySQL</option>
                        <option value="backend" <?= $course === "backend" ? "selected" : "" ?>>Backend Development</option>
                    </select>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="result-box">
                <h2>Submitted Data</h2>

                <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
                <p><strong>Gender:</strong> <?= htmlspecialchars($gender) ?></p>
                <p><strong>Course:</strong> <?= htmlspecialchars($course) ?></p>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>Important Concept</h2>

            <p>
                This line keeps the input value after the form is submitted:
            </p>

            <pre>value="<?= htmlspecialchars($name) ?>"</pre>

            <p>
                For radio buttons and dropdowns, we use conditional output to add
                <code>checked</code> or <code>selected</code>.
            </p>
        </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="07 - Textarea Handling.php">&lsaquo; Previous: 07 - Textarea Handling.php</a>
                <a class="next" href="09 - Basic Form Validation.php">Next: 09 - Basic Form Validation.php &rsaquo;</a>
            </nav>

        </div>
    </div>

</body>
</html>
