<?php
/*
  FILE: 05 - Break and Continue.php
  TOPIC: CH06 - Loops

  GOAL:
  - Learn how to use break in a loop.
  - Learn how to use continue in a loop.
  - Understand the difference between stopping a loop and skipping one cycle.

  IMPORTANT:
  break stops the whole loop.
  continue skips the current cycle and moves to the next cycle.
*/

/*
  Example 1: break

  We loop from 1 to 10.
  When the number reaches 6, the loop stops completely.
*/

$breakResult = [];

for ($i = 1; $i <= 10; $i++) {
    if ($i == 6) {
        break;
    }

    $breakResult[] = $i;
}

/*
  Example 2: continue

  We loop from 1 to 10.
  When the number is even, we skip it.
  Only odd numbers are saved.
*/

$continueResult = [];

for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        continue;
    }

    $continueResult[] = $i;
}

/*
  Example 3:
  Simulate checking order status.
  We skip cancelled orders and stop when an invalid order is found.
*/

$orders = [
    ["id" => "ORD001", "status" => "paid"],
    ["id" => "ORD002", "status" => "cancelled"],
    ["id" => "ORD003", "status" => "paid"],
    ["id" => "ORD004", "status" => "invalid"],
    ["id" => "ORD005", "status" => "paid"]
];

$processedOrders = [];

foreach ($orders as $order) {
    if ($order["status"] === "cancelled") {
        continue;
    }

    if ($order["status"] === "invalid") {
        break;
    }

    $processedOrders[] = $order;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file is a PHP file that outputs HTML.

      Important:
      If we want to show PHP syntax inside an HTML comment,
      we should escape the PHP opening tag.

      Safe example inside HTML comment:
      &lt;?php echo "Hello World"; ?&gt;

      Do not write the real PHP opening tag inside an HTML comment
      when you only want to display it as text.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH06 - Break and Continue</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        
        <div class="page-card">
            <h1>CH06 - Break and Continue</h1>

        <div class="box example">
            <h2>Meaning</h2>

            <table>
                <tr>
                    <th>Keyword</th>
                    <th>Meaning</th>
                </tr>
                <tr>
                    <td><code>break</code></td>
                    <td>Stop the loop immediately</td>
                </tr>
                <tr>
                    <td><code>continue</code></td>
                    <td>Skip the current loop cycle and continue with the next one</td>
                </tr>
            </table>
        </div>

        <div class="box output">
            <h2>Example 1: Break</h2>

            <p>The loop should count from 1 to 10, but it stops when the number reaches 6.</p>

            <?php foreach ($breakResult as $item) { ?>
                <span class="badge"><?php echo $item; ?></span>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>Example 2: Continue</h2>

            <p>The loop skips even numbers and displays only odd numbers.</p>

            <?php foreach ($continueResult as $item) { ?>
                <span class="badge"><?php echo $item; ?></span>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>Example 3: Backend Style Example</h2>

            <p>
                Cancelled orders are skipped using <code>continue</code>.
                The loop stops when an invalid order is found using <code>break</code>.
            </p>

            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Status</th>
                </tr>

                <?php foreach ($processedOrders as $order) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order["id"]); ?></td>
                        <td><?php echo htmlspecialchars($order["status"]); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="04 - Foreach Loop.php">&lsaquo; Previous: 04 - Foreach Loop.php</a>
                <a class="next" href="06 - Loop with HTML Table.php">Next: 06 - Loop with HTML Table.php &rsaquo;</a>
            </nav>

        </div>
    </div>

</body>
</html>
