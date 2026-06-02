<?php
/*
  FILE: 04 - edit.php
  TOPIC: CH22 - Product CRUD System

  GOAL:
  - Retrieve one product by ID.
  - Display the product data inside an edit form.
*/

require __DIR__ . "/includes/db.php";

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    die("Invalid product ID.");
}

$sql = "SELECT product_id, product_name, category, price, stock_qty
        FROM products
        WHERE product_id = :id";

$statement = $pdo->prepare($sql);
$statement->execute([
    "id" => $id
]);

$product = $statement->fetch();

if (!$product) {
    die("Product record not found.");
}

$categories = ["Food", "Drink", "Side Order", "Dessert"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Edit Product</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Edit Product</h1>

        <div class="nav">
            <a href="01%20-%20index.php">Back to Product List</a>
        </div>

        <div class="box">
            <h2>Edit Form</h2>

            <form action="05%20-%20update.php" method="post">

                <input type="hidden" name="product_id" value="<?= e($product["product_id"]) ?>">

                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name" value="<?= e($product["product_name"]) ?>" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= e($category) ?>" <?= ($product["category"] === $category) ? "selected" : "" ?>>
                                <?= e($category) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" min="0" step="0.01" value="<?= e($product["price"]) ?>" required>
                </div>

                <div class="form-group">
                    <label for="stock_qty">Stock Quantity</label>
                    <input type="number" id="stock_qty" name="stock_qty" min="0" step="1" value="<?= e($product["stock_qty"]) ?>" required>
                </div>

                <button type="submit" class="button-primary">Update Product</button>
            </form>
        </div>

        <div class="box info">
            <h2>Important Concept</h2>
            <p>
                The edit page uses <code>SELECT ... WHERE product_id = :id</code>
                to get only one product record.
            </p>
        </div>

    </div>

</body>
</html>
