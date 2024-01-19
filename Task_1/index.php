<?php
// Default values
if (!isset($product_description)) $product_description = '';
if (!isset($list_price)) $list_price = '';
if (!isset($discount_percent)) $discount_percent = '';
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<main>
    <h1>Product Discount Calculator</h1>

    <?php if (!empty($error_message)): ?>
        <p class="error_message"> <?php echo $error_message ?> </p>
    <?php endif ?>

    <form action="display_discount.php" method="post">

        <div id="data">
            <label for="product_description">Product Description:</label>
            <input type="text" id="product_description" name="product_description"
                   value="<?php echo htmlspecialchars($product_description) ?>"><br>

            <label for="list_price">List Price:</label>
            <input type="text" id="list_price" name="list_price"
                   value="<?php echo htmlspecialchars($list_price) ?>"><br>

            <label for="discount_percent">Discount Percent:</label>
            <input type="text" id="discount_percent" name="discount_percent"
                   value="<?php echo htmlspecialchars($discount_percent) ?>"><span>%</span><br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate Discount"><br>
        </div>

    </form>
</main>
</body>
</html>