<?php
/*
  FILE: 03 - Select One Record by ID.php
  TOPIC: CH18 - MySQL Select and Display Data

  GOAL:
  - Learn how to select one database record by ID.
  - Learn how to get an ID from the URL using $_GET.
  - Learn how to use a prepared statement with a named placeholder.

  EXAMPLE URL:
  03 - Select One Record by ID.php?id=1

  IMPORTANT:
  - The ID comes from the URL, so it is external input.
  - External input should not be placed directly into SQL.
  - Use prepare() and execute() instead.
*/

require_once __DIR__ . "/includes/db.php";

$student = null;
$errorMessage = "";
$infoMessage = "";

/*
  Get the id value from the URL.

  Example:
  ?id=1

  FILTER_VALIDATE_INT checks whether the value is a valid integer.
*/
$selectedId = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($selectedId === null) {
    /*
      If no id is provided, use 1 as the default learning example.
    */
    $selectedId = 1;
} elseif ($selectedId === false) {
    /*
      If id exists but is not a valid integer, show an error message.
    */
    $errorMessage = "Invalid ID. Please enter a valid number.";
}

if ($errorMessage === "") {
    try {
        $pdo = getPDOConnection();

        /*
          :id is a named placeholder.

          The real value is supplied later using execute().
        */
        $sql = "SELECT student_id, student_name, email, course, year_level
                FROM students
                WHERE student_id = :id";

        $statement = $pdo->prepare($sql);

        /*
          The selected ID is safely bound to the :id placeholder.
        */
        $statement->execute([
            "id" => $selectedId
        ]);

        /*
          fetch() retrieves one row only.

          If no record is found, fetch() returns false.
        */
        $student = $statement->fetch();

        if ($student === false) {
            $infoMessage = "No student found with ID " . $selectedId . ".";
            $student = null;
        }
    } catch (PDOException $error) {
        $errorMessage = $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH18 - Select One Record by ID</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH18 - Select One Record by ID</h1>

        <p>
            This file selects one student record using the ID from the URL or form.
        </p>

        <div class="box info">
            <h2>Try Another ID</h2>

            <form method="get" action="">
                <label for="id">Student ID</label>
                <input type="number" id="id" name="id" value="<?= htmlspecialchars((string) $selectedId) ?>" min="1">

                <button type="submit">Find Student</button>
            </form>
        </div>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } elseif ($infoMessage !== "") { ?>
            <div class="box warning">
                <h2>Not Found</h2>
                <p><?= htmlspecialchars($infoMessage) ?></p>
            </div>
        <?php } elseif ($student !== null) { ?>
            <div class="box output">
                <h2>Selected Student</h2>

                <table>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td><?= htmlspecialchars($student["student_id"]) ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?= htmlspecialchars($student["student_name"]) ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= htmlspecialchars($student["email"]) ?></td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td><?= htmlspecialchars($student["course"]) ?></td>
                    </tr>
                    <tr>
                        <td>Year Level</td>
                        <td><?= htmlspecialchars($student["year_level"]) ?></td>
                    </tr>
                </table>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$sql = "SELECT * FROM students WHERE student_id = :id";
$statement = $pdo-&gt;prepare($sql);
$statement-&gt;execute(["id" =&gt; $selectedId]);
$student = $statement-&gt;fetch();</pre>

            <p>
                Use <code>fetch()</code> when you expect only one record.
            </p>
        </div>
    </div>

</body>
</html>
