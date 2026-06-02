<?php
/*
  FILE: 01 - index.php
  TOPIC: CH22 - Product CRUD System

  GOAL:
  - Display all product records from the database.
  - Learn the READ part of CRUD using a product example.
*/

require __DIR__ . "/includes/db.php";

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

$message = $_GET["message"] ?? "";

$messageText = match ($message) {
    "created" => "Product created successfully.",
    "updated" => "Product updated successfully.",
    "deleted" => "Product deleted successfully.",
    default => ""
};

$sql = "SELECT product_id, product_name, category, price, stock_qty, created_at
        FROM products
        ORDER BY product_id DESC";

$statement = $pdo->query($sql);
$products = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Product CRUD</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../global.css">
</head>
<body>

    <div class="container">

        <h1>Product CRUD System</h1>

        <p>
            This page demonstrates a second complete CRUD example using products.
            The structure is similar to the Student CRUD system.
        </p>

        <div class="nav">
            <a href="02%20-%20create.php" class="button-primary">Add New Product</a>
        </div>

        <?php if ($messageText !== "") { ?>
            <div class="box success">
                <?= e($messageText) ?>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Product Records</h2>

            <?php if (count($products) === 0) { ?>

                <p>No product records found.</p>
                <p>Click <strong>Add New Product</strong> to create the first record.</p>

            <?php } else { ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td><?= e($product["product_id"]) ?></td>
                                <td><?= e($product["product_name"]) ?></td>
                                <td><?= e($product["category"]) ?></td>
                                <td>RM <?= e(number_format((float) $product["price"], 2)) ?></td>
                                <td><?= e($product["stock_qty"]) ?></td>
                                <td><?= e($product["created_at"]) ?></td>
                                <td>
                                    <div class="action-list">
                                        <a href="04%20-%20edit.php?id=<?= e($product["product_id"]) ?>">Edit</a>
                                        <a href="06%20-%20delete.php?id=<?= e($product["product_id"]) ?>" class="button-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php } ?>
        </div>

        <div class="box info">
            <h2>Important Concept</h2>
            <p>
                Once you understand one CRUD system, you can reuse the same structure for many entities,
                such as products, customers, orders, menu items, or users.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="../01 - Student CRUD/01 - index.php">&lsaquo; Previous: 01 - Student CRUD System</a>
            <a class="next" href="../../CH23 - Relationships and Join Queries/02 - One to Many Relationship.php">Next: 02 - One to Many Relationship.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
