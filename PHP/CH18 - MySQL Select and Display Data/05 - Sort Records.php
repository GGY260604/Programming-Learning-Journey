<?php
/*
  FILE: 05 - Sort Records.php
  TOPIC: CH18 - MySQL Select and Display Data

  GOAL:
  - Learn how to sort selected records using ORDER BY.
  - Learn why column names should be controlled using a whitelist.
  - Learn how to let users choose sorting options safely.

  IMPORTANT:
  - Prepared statements are good for values.
  - But column names and directions cannot be replaced using normal placeholders.
  - Therefore, dynamic ORDER BY values should be checked against a whitelist.
*/

require_once __DIR__ . "/includes/db.php";

/*
  This whitelist controls which columns are allowed for sorting.

  The array key is the real database column name.
  The array value is the label displayed to the user.
*/
$allowedSortColumns = [
    "student_id" => "Student ID",
    "student_name" => "Student Name",
    "email" => "Email",
    "course" => "Course",
    "year_level" => "Year Level"
];

$allowedDirections = [
    "ASC" => "Ascending",
    "DESC" => "Descending"
];

$sort = $_GET["sort"] ?? "student_id";
$direction = strtoupper($_GET["direction"] ?? "ASC");

/*
  If the user provides an unsupported column, use student_id instead.
*/
if (!array_key_exists($sort, $allowedSortColumns)) {
    $sort = "student_id";
}

/*
  If the user provides an unsupported direction, use ASC instead.
*/
if (!array_key_exists($direction, $allowedDirections)) {
    $direction = "ASC";
}

$students = [];
$errorMessage = "";

try {
    $pdo = getPDOConnection();

    /*
      $sort and $direction are inserted into the SQL only after whitelist checking.

      This is important because ORDER BY column names cannot be safely bound as
      normal prepared statement values.
    */
    $sql = "SELECT student_id, student_name, email, course, year_level
            FROM students
            ORDER BY $sort $direction";

    $statement = $pdo->query($sql);
    $students = $statement->fetchAll();
} catch (PDOException $error) {
    $errorMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH18 - Sort Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH18 - Sort Records</h1>

        <p>
            This file sorts student records using <code>ORDER BY</code>.
        </p>

        <div class="box info">
            <h2>Sort Options</h2>

            <form method="get" action="">
                <div class="form-row">
                    <div>
                        <label for="sort">Sort Column</label>
                        <select id="sort" name="sort">
                            <?php foreach ($allowedSortColumns as $column => $label) { ?>
                                <option value="<?= htmlspecialchars($column) ?>" <?= $sort === $column ? "selected" : "" ?>>
                                    <?= htmlspecialchars($label) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="direction">Direction</label>
                        <select id="direction" name="direction">
                            <?php foreach ($allowedDirections as $value => $label) { ?>
                                <option value="<?= htmlspecialchars($value) ?>" <?= $direction === $value ? "selected" : "" ?>>
                                    <?= htmlspecialchars($label) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button type="submit">Apply Sorting</button>
            </form>
        </div>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Database Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } else { ?>
            <div class="box success">
                <h2>Current Sorting</h2>
                <p>
                    Sorting by
                    <strong><?= htmlspecialchars($allowedSortColumns[$sort]) ?></strong>
                    in
                    <strong><?= htmlspecialchars($allowedDirections[$direction]) ?></strong>
                    order.
                </p>
            </div>

            <div class="box output">
                <h2>Sorted Students</h2>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year Level</th>
                    </tr>

                    <?php foreach ($students as $student) { ?>
                        <tr>
                            <td><?= htmlspecialchars($student["student_id"]) ?></td>
                            <td><?= htmlspecialchars($student["student_name"]) ?></td>
                            <td><?= htmlspecialchars($student["email"]) ?></td>
                            <td><?= htmlspecialchars($student["course"]) ?></td>
                            <td><?= htmlspecialchars($student["year_level"]) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>

        <div class="box warning">
            <h2>Security Note</h2>

            <p>
                Do not directly trust a column name from <code>$_GET</code>.
                This file uses a whitelist so only approved column names can be
                used in <code>ORDER BY</code>.
            </p>
        </div>
    </div>

</body>
</html>
