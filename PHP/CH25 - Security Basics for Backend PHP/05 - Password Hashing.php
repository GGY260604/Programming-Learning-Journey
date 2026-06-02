<?php
/*
  FILE: 05 - Password Hashing.php
  TOPIC: CH25 - Security Basics for Backend PHP

  GOAL:
  - Learn why passwords should not be stored as plain text.
  - Learn how to create a password hash using password_hash().
  - Learn how to verify a password using password_verify().

  IMPORTANT:
  - A password hash is not the same as encryption.
  - Usually, we do not decrypt a password hash.
  - Instead, we compare the entered password with the stored hash using password_verify().
*/

$password = $_POST["password"] ?? "student123";
$verifyPassword = $_POST["verify_password"] ?? "student123";

$hash = "";
$isPasswordCorrect = null;
$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

if ($isSubmitted) {
    /*
      password_hash() creates a secure hash for the password.

      PASSWORD_DEFAULT:
      - Lets PHP choose a strong default hashing algorithm.
      - This is usually recommended for normal use.
    */

    $hash = password_hash($password, PASSWORD_DEFAULT);

    /*
      password_verify() checks whether the entered password matches the hash.

      It returns true if the password matches.
      It returns false if the password does not match.
    */

    $isPasswordCorrect = password_verify($verifyPassword, $hash);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH25 - Password Hashing</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH25 - Password Hashing</h1>

        <p>
            Passwords should be hashed before being stored in a database.
        </p>

        <div class="box">
            <h2>Password Hash Demo</h2>

            <form method="POST">
                <label for="password">Password to Hash</label>
                <input type="text" id="password" name="password" value="<?= htmlspecialchars($password) ?>">

                <label for="verify_password">Password to Verify</label>
                <input type="text" id="verify_password" name="verify_password" value="<?= htmlspecialchars($verifyPassword) ?>">

                <button type="submit">Hash and Verify</button>
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="box output">
                <h2>Generated Hash</h2>

                <pre><?= htmlspecialchars($hash) ?></pre>

                <p>
                    The hash usually looks long and different each time.
                    That is normal.
                </p>
            </div>

            <?php if ($isPasswordCorrect) { ?>
                <div class="box success">
                    <h2>Verification Result</h2>
                    <p>The password matches the hash.</p>
                </div>
            <?php } else { ?>
                <div class="box error">
                    <h2>Verification Result</h2>
                    <p>The password does not match the hash.</p>
                </div>
            <?php } ?>
        <?php } ?>

        <div class="box note">
            <h2>Important Code</h2>

            <pre><?= htmlspecialchars('$hash = password_hash($password, PASSWORD_DEFAULT);') ?></pre>
            <pre><?= htmlspecialchars('$isCorrect = password_verify($enteredPassword, $storedHash);') ?></pre>
        </div>

    </div>

</body>
</html>
