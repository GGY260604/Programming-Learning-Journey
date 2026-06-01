<?php
/*
  FILE: 06 - Match Expression.php
  TOPIC: CH05 - Conditional Statements

  GOAL:
  - Learn the basic use of match expression.
  - Compare match expression with switch statement.
  - Understand that match returns a value.

  IMPORTANT:
  match is available in PHP 8.0 and above.
  It is stricter than switch because it uses strict comparison ===.
*/

/*
  Example situation:
  A backend system decides the delivery fee based on delivery zone.
*/

$customerName = "Galen";
$deliveryZone = "zone_b";

/*
  match returns a value directly.
  The returned value is assigned to $deliveryFee.

  The default branch runs when no other branch matches.
*/

$deliveryFee = match ($deliveryZone) {
    "zone_a" => 5.00,
    "zone_b" => 8.00,
    "zone_c" => 12.00,
    default => 0.00
};

/*
  Another match expression can return a message.
*/

$deliveryMessage = match ($deliveryZone) {
    "zone_a" => "Nearby delivery area.",
    "zone_b" => "Normal delivery area.",
    "zone_c" => "Far delivery area.",
    default => "Unknown delivery area."
};

$zones = [
    ["zone" => "zone_a", "fee" => "RM 5.00", "description" => "Nearby delivery area"],
    ["zone" => "zone_b", "fee" => "RM 8.00", "description" => "Normal delivery area"],
    ["zone" => "zone_c", "fee" => "RM 12.00", "description" => "Far delivery area"],
    ["zone" => "default", "fee" => "RM 0.00", "description" => "Unknown delivery area"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 06 - Match Expression.php
      TOPIC: CH05 - Conditional Statements

      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH05 - Match Expression</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Match Expression</h1>

            <p class="subtitle">
                A <code>match</code> expression is a modern PHP syntax that returns a value from matching conditions.
            </p>

            <div class="box example-box">
                <h2>Customer Delivery Data</h2>

                <p><code>$customerName</code> = <?php echo $customerName; ?></p>
                <p><code>$deliveryZone</code> = <?php echo $deliveryZone; ?></p>
            </div>

            <div class="box result-box">
                <h2>Match Result</h2>

                <p class="output-line">
                    Delivery fee: RM <?php echo number_format($deliveryFee, 2); ?>
                </p>

                <p class="output-line">
                    <?php echo $deliveryMessage; ?>
                </p>
            </div>

            <div class="box note-box">
                <h2>Delivery Zone Rules</h2>

                <table>
                    <tr>
                        <th>Zone</th>
                        <th>Fee</th>
                        <th>Description</th>
                    </tr>

                    <?php foreach ($zones as $zone) { ?>
                        <tr>
                            <td><code><?php echo $zone["zone"]; ?></code></td>
                            <td><?php echo $zone["fee"]; ?></td>
                            <td><?php echo $zone["description"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box warning-box">
                <h2>Important Difference from Switch</h2>

                <p>
                    <code>match</code> returns a value, so it is useful when you want to assign
                    a result directly to a variable.
                </p>

                <p>
                    <code>match</code> also uses strict comparison, similar to <code>===</code>.
                </p>

                <p>
                    This file requires PHP 8.0 or above.
                </p>
            </div>

            <p class="footer-note">
                Use <code>match</code> when you want a cleaner expression for returning values from fixed conditions.
            </p>

        </div>
    </div>

</body>
</html>
