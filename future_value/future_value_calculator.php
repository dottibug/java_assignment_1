<?php
/////////////// ADD COMMENTS
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<main>
    <section>
        <h1>Future Value Calculator</h1>

        <!-- Conditionally render error message  -->
        <?php if (!empty($error_message)) : ?>
            <p class="error">
                <?php echo htmlspecialchars($error_message); ?>
            </p>
        <?php endif ?>

        <form action="" method="post">
            <div id="data">
                <label for="investment">Investment Amount:</label>
                <input type="text" name="investment" id="investment"
                       value="<?php echo htmlspecialchars($investment); ?>">
                <br>

                <label for="interest_rate">Yearly Interest Rate:</label>
                <input type="text" name="interest_rate" id="interest_rate"
                       value="<?php echo htmlspecialchars($interest_rate); ?>">
                <br>

                <label for="years">Number of Years:</label>
                <input type="text" name="years" id="years"
                       value="<?php echo htmlspecialchars($years); ?>">
                <br>
            </div>

            <div id="compound">
                <label for="compound_monthly">Compound Monthly:</label>
                <input type="checkbox" name="compound_monthly"
                       id="compound_monthly" <?php echo $compound_monthly ? 'checked' : '' ?>
                >
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <button type="submit" name="action" value="calculate">Calculate</button>
                <br>
            </div>
        </form>
    </section>

    <!--  Conditionally render results  -->
    <?php if ($show_results) : ?>
        <section>
            <h1>Results</h1>

            <label>Investment Amount:</label>
            <span><?php echo $investment_formatted; ?></span><br>

            <label>Yearly Interest Rate:</label>
            <span><?php echo $yearly_rate_formatted; ?></span><br>

            <label>Number of Years:</label>
            <span><?php echo $num_years; ?></span><br>

            <label>Future Value:</label>
            <span><?php echo $future_value_formatted; ?></span><br>

            <p class="compound_rate"><?php echo "Interest compounded $compound_rate"; ?></p>

            <p>This calculation was done on <span><?php echo $date; ?></span></p>
        </section>
    <?php endif; ?>

</main>
</body>
</html>
