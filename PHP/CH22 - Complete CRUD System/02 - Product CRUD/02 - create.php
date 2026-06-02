<?php
/*
  FILE: 02 - create.php
  TOPIC: CH22 - Product CRUD System

  GOAL:
  - Display a form for adding a new product.
  - Send the form data to 03 - store.php using POST.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Create Product</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Create Product</h1>

        <div class="nav">
            <a href="01%20-%20index.php">Back to Product List</a>
        </div>

        <div class="box">
            <h2>New Product Form</h2>

            <form action="03%20-%20store.php" method="post">

                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <option value="">-- Select Category --</option>
                        <option value="Food">Food</option>
                        <option value="Drink">Drink</option>
                        <option value="Side Order">Side Order</option>
                        <option value="Dessert">Dessert</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" min="0" step="0.01" required>
                    <small>Example: 8.90</small>
                </div>

                <div class="form-group">
                    <label for="stock_qty">Stock Quantity</label>
                    <input type="number" id="stock_qty" name="stock_qty" min="0" step="1" required>
                </div>

                <button type="submit" class="button-primary">Save Product</button>
            </form>
        </div>

        <div class="box info">
            <h2>Important Concept</h2>
            <p>
                Number inputs can help the browser guide users, but backend validation in PHP is still required.
            </p>
        </div>

    </div>

</body>
</html>
