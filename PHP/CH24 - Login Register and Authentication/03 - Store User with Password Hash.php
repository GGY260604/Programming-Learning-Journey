<?php
/*
  FILE: 03 - Store User with Password Hash.php
  TOPIC: CH24 - Register Processing

  GOAL:
  - Receive registration data from the form.
  - Validate the input.
  - Hash the password using password_hash().
  - Insert the new user into the MySQL users table.

  IMPORTANT:
  - This file processes backend logic.
  - It does not mainly display a form.
  - It redirects the user after processing.
*/

require_once "includes/db.php";

/*
  $_SERVER["REQUEST_METHOD"] tells us how the page was requested.

  If the user directly opens this file in the browser, the method is GET.
  If the user submits the register form, the method is POST.
*/
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: 02 - Register Form.php?error=Please submit the registration form first");
    exit;
}

/*
  Get submitted values from $_POST.

  trim() removes extra spaces from the beginning and ending.
*/
$username = trim($_POST["username"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

/*
  Basic validation.

  Backend validation is important because users can bypass HTML required attributes.
*/
if ($username === "" || $email === "" || $password === "") {
    header("Location: 02 - Register Form.php?error=All fields are required");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: 02 - Register Form.php?error=Invalid email format");
    exit;
}

if (strlen($password) < 6) {
    header("Location: 02 - Register Form.php?error=Password must be at least 6 characters");
    exit;
}

try {
    /*
      Check whether the email already exists.

      This helps us show a friendly message before inserting.
      The database also has UNIQUE on email as an extra protection.
    */
    $checkSql = "SELECT user_id FROM users WHERE email = :email";
    $checkStatement = $pdo->prepare($checkSql);
    $checkStatement->execute([
        "email" => $email
    ]);

    $existingUser = $checkStatement->fetch();

    if ($existingUser) {
        header("Location: 02 - Register Form.php?error=Email already exists");
        exit;
    }

    /*
      password_hash() converts a plain password into a secure hash.

      PASSWORD_DEFAULT:
      - Lets PHP choose a strong recommended algorithm.
      - The generated hash includes the algorithm and salt information.
    */
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    /*
      Insert the user using a prepared statement.

      Prepared statements help prevent SQL injection.
      Do not directly insert user input into SQL strings.
    */
    $insertSql = "INSERT INTO users (username, email, password)
                  VALUES (:username, :email, :password)";

    $insertStatement = $pdo->prepare($insertSql);

    $insertStatement->execute([
        "username" => $username,
        "email" => $email,
        "password" => $hashedPassword
    ]);

    header("Location: 04 - Login Form.php?message=Registration successful. You can now log in");
    exit;

} catch (PDOException $error) {
    /*
      In a beginner note, we redirect with a simple message.
      In real systems, log the detailed error instead of exposing it to users.
    */
    header("Location: 02 - Register Form.php?error=Registration failed");
    exit;
}
?>
