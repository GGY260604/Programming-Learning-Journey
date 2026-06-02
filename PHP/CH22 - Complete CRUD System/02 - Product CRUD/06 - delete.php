<?php
/*
  FILE: 06 - delete.php
  TOPIC: CH22 - Product CRUD System

  GOAL:
  - Display product delete confirmation.
  - Delete the product only after confirmation.
*/

require __DIR__ . "/includes/db.php";

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = filter_input(INPUT_POST, "product_id", FILTER_VALIDATE_INT);

    if ($id === false || $id === null) {
        die("Invalid product ID.");
    }

    $sql = "DELETE FROM products WHERE product_id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "id" => $id
    ]);

    header("Location: 01%20-%20index.php?message=deleted");
    exit;
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Delete Product</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Delete Product</h1>

        <div class="box warning">
            <h2>Confirm Delete</h2>

            <p>Are you sure you want to delete this product?</p>

            <table>
                <tr>
                    <th>ID</th>
                    <td><?= e($product["product_id"]) ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?= e($product["product_name"]) ?></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><?= e($product["category"]) ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>RM <?= e(number_format((float) $product["price"], 2)) ?></td>
                </tr>
                <tr>
                    <th>Stock</th>
                    <td><?= e($product["stock_qty"]) ?></td>
                </tr>
            </table>

            <form action="06%20-%20delete.php" method="post">
                <input type="hidden" name="product_id" value="<?= e($product["product_id"]) ?>">
                <button type="submit" class="button-danger">Yes, Delete</button>
                <a href="01%20-%20index.php">Cancel</a>
            </form>
        </div>

    </div>

</body>
</html>
