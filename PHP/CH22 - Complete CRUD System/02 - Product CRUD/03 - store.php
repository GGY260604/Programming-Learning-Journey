<?php
/*
  FILE: 03 - store.php
  TOPIC: CH22 - Product CRUD System

  GOAL:
  - Receive product form data.
  - Validate the data.
  - Insert the product into MySQL using a prepared statement.
*/

require __DIR__ . "/includes/db.php";

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: 02%20-%20create.php");
    exit;
}

$productName = trim($_POST["product_name"] ?? "");
$category = trim($_POST["category"] ?? "");
$price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT);
$stockQty = filter_input(INPUT_POST, "stock_qty", FILTER_VALIDATE_INT);

$allowedCategories = ["Food", "Drink", "Side Order", "Dessert"];
$errors = [];

if ($productName === "") {
    $errors[] = "Product name is required.";
}

if (!in_array($category, $allowedCategories, true)) {
    $errors[] = "A valid category is required.";
}

if ($price === false || $price < 0) {
    $errors[] = "Price must be a valid number and cannot be negative.";
}

if ($stockQty === false || $stockQty < 0) {
    $errors[] = "Stock quantity must be a valid whole number and cannot be negative.";
}

if (count($errors) === 0) {
    $sql = "INSERT INTO products (product_name, category, price, stock_qty)
            VALUES (:product_name, :category, :price, :stock_qty)";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        "product_name" => $productName,
        "category" => $category,
        "price" => $price,
        "stock_qty" => $stockQty
    ]);

    header("Location: 01%20-%20index.php?message=created");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Store Product</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Store Product</h1>

        <div class="box error">
            <h2>Validation Failed</h2>

            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= e($error) ?></li>
                <?php } ?>
            </ul>

            <a href="02%20-%20create.php">Back to Create Form</a>
        </div>

    </div>

</body>
</html>
