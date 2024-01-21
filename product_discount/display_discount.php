<?php

// Get input data
$product_description = filter_input(INPUT_POST, "product_description");
$list_price = filter_input(INPUT_POST, "list_price");
$discount_percent = filter_input(INPUT_POST, "discount_percent");

// Validate product_description, list_price, and discount_percent
if (empty($product_description)) {
    $error_message = 'Please enter a product description.';
} elseif (empty($list_price)) {
    $error_message = 'Please enter a list price.';
} elseif (!is_numeric($list_price)) {
    $error_message = 'The list price must be a number.';
} elseif (empty($discount_percent)) {
    $error_message = 'Please enter a discount percent.';
} elseif (!is_numeric($discount_percent)) {
    $error_message = 'The discount percent must be a number.';
} else {
    $error_message = '';
}

// Show index page if an error message exists
if (!empty($error_message)) {
    include('index.php');
    exit();
}

// Calculate discount, sales tax, and total price
define('SALES_TAX_RATE', 0.2); // 8% sales tax
define('SALES_TAX', '8%');

$discount_amount = $list_price * $discount_percent * .01;
$discount_price = $list_price - $discount_amount;
$sales_tax_amount = $discount_price * SALES_TAX_RATE;
$total_price = $discount_price + $sales_tax_amount;

// Format numbers
$list_price = '$' . number_format($list_price);
$discount_percent = $discount_percent . '%';
$discount_amount = '$' . number_format($discount_amount, 2);
$discount_price = '$' . number_format($discount_price, 2);
$sales_tax_amount = '$' . number_format($sales_tax_amount, 2);
$total_price = '$' . number_format($total_price, 2);

?>

<!DOCTYPE html>
<html lang="en">
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
    <span><?php echo htmlspecialchars($list_price); ?></span><br>

    <label>Standard Discount:</label>
    <span><?php echo htmlspecialchars($discount_percent); ?></span><br>

    <label>Discount Amount:</label>
    <span><?php echo htmlspecialchars($discount_amount); ?></span><br>

    <label>Discount Price:</label>
    <span><?php echo htmlspecialchars($discount_price); ?></span><br><br>

    <label>Sales Tax Rate:</label>
    <span><?php echo SALES_TAX; ?></span><br>

    <label>Sales Tax Amount:</label>
    <span><?php echo htmlspecialchars($sales_tax_amount); ?></span><br><br>

    <div class="total_price">
        <label>Total Price:</label>
        <span><?php echo htmlspecialchars($total_price); ?></span>
    </div>

</main>
</body>
</html>