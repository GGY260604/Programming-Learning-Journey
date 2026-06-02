<?php
/*
  FILE: 05 - Verify Password.php
  TOPIC: CH24 - Login Processing

  GOAL:
  - Receive email and password from the login form.
  - Find the user by email.
  - Verify the password using password_verify().
  - Store login information in $_SESSION.

  IMPORTANT:
  - We do not compare the plain password directly with the database password.
  - The database stores a hashed password.
  - password_verify() checks whether the plain password matches the hash.
*/

session_start();
require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: 04 - Login Form.php?error=Please submit the login form first");
    exit;
}

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

if ($email === "" || $password === "") {
    header("Location: 04 - Login Form.php?error=Email and password are required");
    exit;
}

try {
    /*
      Find one user by email.

      LIMIT 1 is used because email should be unique.
    */
    $sql = "SELECT user_id, username, email, password
            FROM users
            WHERE email = :email
            LIMIT 1";

    $statement = $pdo->prepare($sql);
    $statement->execute([
        "email" => $email
    ]);

    $user = $statement->fetch();

    /*
      If fetch() returns false, it means no user was found.
    */
    if (!$user) {
        header("Location: 04 - Login Form.php?error=Invalid email or password");
        exit;
    }

    /*
      password_verify($plainPassword, $hashedPassword)

      - $password is what the user typed.
      - $user["password"] is the hashed password from database.
    */
    $passwordIsCorrect = password_verify($password, $user["password"]);

    if (!$passwordIsCorrect) {
        header("Location: 04 - Login Form.php?error=Invalid email or password");
        exit;
    }

    /*
      Login success.

      session_regenerate_id(true) creates a new session ID after login.
      This is a basic protection against session fixation.
    */
    session_regenerate_id(true);

    $_SESSION["user_id"] = $user["user_id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["is_logged_in"] = true;

    header("Location: 06 - Protected Page.php");
    exit;

} catch (PDOException $error) {
    header("Location: 04 - Login Form.php?error=Login failed");
    exit;
}
?>
