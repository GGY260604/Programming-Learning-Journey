<?php
/*
  FILE: Order with Customer Example.php
  TOPIC: Practical Customer and Order Join

  GOAL:
  - Understand a practical customer-order relationship.
  - Join customers with orders.
  - Display order items that belong to each order.

  HOW TO RUN:
  1. Start Apache and MySQL in XAMPP.
  2. Run "01 - Create Related Tables.sql" in phpMyAdmin first.
  3. Open this file through localhost.
*/

require_once __DIR__ . "/includes/db.php";

/*
  This file shows a more practical join example.

  Relationship:
  - One customer can have many orders.
  - One order can have many order items.

  This is common in order management systems, e-commerce systems,
  restaurant systems, and booking systems.
*/

$sql = "SELECT
            o.order_id,
            o.order_date,
            o.total_amount,
            o.order_status,
            c.customer_name,
            c.email
        FROM ch23_orders AS o
        INNER JOIN ch23_customers AS c
            ON o.customer_id = c.customer_id
        ORDER BY o.order_date DESC, o.order_id DESC";

$statement = $pdo->query($sql);
$orders = $statement->fetchAll();

/*
  This prepared statement gets the items for one specific order.
  It will be executed inside the loop for each order.
*/
$itemSql = "SELECT
                product_name,
                quantity,
                unit_price,
                quantity * unit_price AS subtotal
            FROM ch23_order_items
            WHERE order_id = :order_id
            ORDER BY item_id";

$itemStatement = $pdo->prepare($itemSql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH23 - Order with Customer Example</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH23 - Order with Customer Example</h1>

        <p>
            This file demonstrates a practical customer-order relationship.
            It is similar to what you may use in a real backend project.
        </p>

        <div class="box note">
            <h2>Relationship Structure</h2>

            <pre>ch23_customers 1 ---- many ch23_orders
ch23_orders    1 ---- many ch23_order_items</pre>

            <p>
                This example combines join queries with repeated child data display.
            </p>
        </div>

        <?php foreach ($orders as $order) { ?>
            <?php
                /*
                  Get all items for the current order.
                */
                $itemStatement->execute([
                    "order_id" => $order["order_id"]
                ]);

                $items = $itemStatement->fetchAll();
            ?>

            <div class="box output">
                <h2>Order #<?= htmlspecialchars($order["order_id"]) ?></h2>

                <p>
                    <strong>Customer:</strong>
                    <?= htmlspecialchars($order["customer_name"]) ?>
                    (<?= htmlspecialchars($order["email"]) ?>)
                </p>

                <p>
                    <strong>Date:</strong>
                    <?= htmlspecialchars($order["order_date"]) ?>
                </p>

                <p>
                    <strong>Status:</strong>
                    <?= htmlspecialchars($order["order_status"]) ?>
                </p>

                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                    </tr>

                    <?php foreach ($items as $item) { ?>
                        <tr>
                            <td><?= htmlspecialchars($item["product_name"]) ?></td>
                            <td><?= htmlspecialchars($item["quantity"]) ?></td>
                            <td>RM <?= htmlspecialchars(number_format($item["unit_price"], 2)) ?></td>
                            <td>RM <?= htmlspecialchars(number_format($item["subtotal"], 2)) ?></td>
                        </tr>
                    <?php } ?>
                </table>

                <p>
                    <strong>Total Amount:</strong>
                    RM <?= htmlspecialchars(number_format($order["total_amount"], 2)) ?>
                </p>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Important Backend Idea</h2>

            <p>
                In real systems, the order table usually stores order-level data,
                while the order items table stores product-level data for that order.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="05 - COUNT with GROUP BY.php">&lsaquo; Previous: 05 - COUNT with GROUP BY.php</a>
            <a class="next" href="../CH24 - Login Register and Authentication/02 - Register Form.php">Next: CH24 - Login Register and Authentication &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
