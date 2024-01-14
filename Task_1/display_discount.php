<?php
    $product_description = filter_input(INPUT_POST, "product_description");
    $list_price = filter_input(INPUT_POST, "list_price");
    $discount_percent = filter_input(INPUT_POST, "discount_percent");

    $discount_amount = $list_price * $discount_percent *.01;
    $discount_price = $list_price - $discount_amount;

    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo '$'.number_format(htmlspecialchars($list_price), 2); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_percent).'%'; ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo '$'.number_format(htmlspecialchars($discount_amount), 2); ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo '$'.number_format(htmlspecialchars($discount_price), 2); ?></span><br>
    </main>
</body>
</html>