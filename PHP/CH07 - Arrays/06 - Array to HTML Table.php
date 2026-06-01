<?php
/*
  FILE: 06 - Array to HTML Table.php
  TOPIC: CH07 - Arrays

  GOAL:
  - Learn how to display array data in an HTML table.
  - Understand how PHP can generate repeated HTML.
  - Prepare for displaying MySQL data later.

  IMPORTANT:
  - In backend development, data often comes from a database.
  - Database records are commonly displayed in HTML tables.
  - This example uses an array first before learning MySQL.
*/


/*
  This array represents product records.

  Later in database chapters, similar records will come from MySQL.
*/

$products = [
    [
        "id" => 1,
        "name" => "Notebook",
        "category" => "Stationery",
        "price" => 4.50,
        "stock" => 30
    ],
    [
        "id" => 2,
        "name" => "Pen",
        "category" => "Stationery",
        "price" => 1.20,
        "stock" => 100
    ],
    [
        "id" => 3,
        "name" => "USB Cable",
        "category" => "Electronics",
        "price" => 12.90,
        "stock" => 15
    ],
    [
        "id" => 4,
        "name" => "Water Bottle",
        "category" => "Lifestyle",
        "price" => 18.00,
        "stock" => 8
    ]
];


/*
  Calculate simple summary information.
*/

$totalProducts = count($products);
$totalStock = 0;

foreach ($products as $product) {
    $totalStock += $product["stock"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 06 - Array to HTML Table.php

      This file shows how to convert PHP array data into an HTML table.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH07 - Array to HTML Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH07 - Array to HTML Table</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                PHP can loop through an array and generate repeated HTML rows.
            </p>

            <p>
                This is the same basic idea used when displaying database records.
            </p>
        </div>

        <div class="box output">
            <h2>Product Table</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price (RM)</th>
                    <th>Stock</th>
                </tr>

                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?php echo $product["id"]; ?></td>
                        <td><?php echo $product["name"]; ?></td>
                        <td><?php echo $product["category"]; ?></td>
                        <td><?php echo number_format($product["price"], 2); ?></td>
                        <td><?php echo $product["stock"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box success">
            <h2>Summary</h2>

            <p><strong>Total product types:</strong> <?php echo $totalProducts; ?></p>
            <p><strong>Total stock quantity:</strong> <?php echo $totalStock; ?></p>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>&lt;?php foreach ($products as $product) { ?&gt;
    &lt;tr&gt;
        &lt;td&gt;&lt;?php echo $product["id"]; ?&gt;&lt;/td&gt;
        &lt;td&gt;&lt;?php echo $product["name"]; ?&gt;&lt;/td&gt;
    &lt;/tr&gt;
&lt;?php } ?&gt;</pre>
        </div>

        <div class="box warning">
            <h2>Security Preview</h2>

            <p>
                When the array data comes from user input or a database,
                we should usually use <code>htmlspecialchars()</code> before output.
            </p>

            <p>
                This chapter focuses on arrays first.
                Output security will be explained in more detail in the security chapter.
            </p>
        </div>

    </div>

</body>
</html>
