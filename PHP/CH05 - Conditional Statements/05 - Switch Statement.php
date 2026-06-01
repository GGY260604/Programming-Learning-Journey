<?php
/*
  FILE: 05 - Switch Statement.php
  TOPIC: CH05 - Conditional Statements

  GOAL:
  - Learn how to use switch.
  - Learn how case, break, and default work.
  - Understand when switch is cleaner than many elseif statements.

  IMPORTANT:
  switch is useful when you compare one value against many possible values.
*/

/*
  Example situation:
  A backend system receives an order status code from a database.
*/

$orderId = "ORD1001";
$orderStatus = "paid";
$statusMessage = "";
$statusAction = "";

/*
  switch checks the value of $orderStatus.

  case:
  - Defines one possible matching value.

  break:
  - Stops PHP from continuing into the next case.

  default:
  - Runs when none of the cases match.
*/

switch ($orderStatus) {
    case "pending":
        $statusMessage = "The order is waiting for payment.";
        $statusAction = "Show payment button.";
        break;

    case "paid":
        $statusMessage = "The order has been paid successfully.";
        $statusAction = "Prepare the order.";
        break;

    case "shipped":
        $statusMessage = "The order has been shipped.";
        $statusAction = "Show tracking information.";
        break;

    case "cancelled":
        $statusMessage = "The order has been cancelled.";
        $statusAction = "Disable order editing.";
        break;

    default:
        $statusMessage = "Unknown order status.";
        $statusAction = "Ask admin to review the order.";
}

$statusCases = [
    ["case" => "pending", "meaning" => "Waiting for payment"],
    ["case" => "paid", "meaning" => "Payment completed"],
    ["case" => "shipped", "meaning" => "Order delivered to courier"],
    ["case" => "cancelled", "meaning" => "Order cancelled"],
    ["case" => "default", "meaning" => "No matching status"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 05 - Switch Statement.php
      TOPIC: CH05 - Conditional Statements

      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH05 - Switch Statement</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Switch Statement</h1>

            <p class="subtitle">
                A <code>switch</code> statement compares one value with many possible cases.
            </p>

            <div class="box example-box">
                <h2>Order Data</h2>

                <p><code>$orderId</code> = <?php echo $orderId; ?></p>
                <p><code>$orderStatus</code> = <?php echo $orderStatus; ?></p>
            </div>

            <div class="box result-box">
                <h2>Switch Result</h2>

                <p class="output-line">
                    <?php echo $statusMessage; ?>
                </p>

                <p class="output-line">
                    Backend action: <?php echo $statusAction; ?>
                </p>
            </div>

            <div class="box note-box">
                <h2>Possible Cases</h2>

                <table>
                    <tr>
                        <th>Case</th>
                        <th>Meaning</th>
                    </tr>

                    <?php foreach ($statusCases as $item) { ?>
                        <tr>
                            <td><code><?php echo $item["case"]; ?></code></td>
                            <td><?php echo $item["meaning"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>

                <p>
                    Remember to use <code>break</code> after each case unless you intentionally
                    want PHP to continue running the next case.
                </p>
            </div>

            <p class="footer-note">
                <code>switch</code> is useful for status values, menu choices, user roles, and fixed categories.
            </p>

        </div>
    </div>

</body>
</html>
