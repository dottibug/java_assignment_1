<!DOCTYPE html>
<html lang="en">
<head>
    <title>Palindrome Tester</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<main>
    <h1>Palindrome Tester</h1>
    <p class="instructions">Enter a word or phrase to find out if it's a palindrome or not.</p>

    <!-- Conditionally render error message -->
    <?php if (!empty($error_message)) : ?>
        <div class="error">
            <p><?php echo $error_message; ?></p>
        </div>
    <?php endif ?>

    <form action="" method="post">
        <div class="label_input">
            <label for="word">Word or phrase</label>
            <input type="text" name="word" id="word" value="<?php echo $word; ?>">
        </div>
        <div class="buttons">
            <button type="submit" name="action" value="form_submitted">Submit</button>
            <button type="submit" name="action" value="reset_form" class="btn_reset">Reset</button>
        </div>
    </form>

    <!-- Conditionally render results -->
    <?php if ($show_results) : ?>
        <section>
            <hr>
            <h1>Results</h1>
            <div class="results">
                <p><?php echo htmlspecialchars($standard_result); ?></p>
                <p><?php echo htmlspecialchars($perfect_result); ?></p>
            </div>
        </section>
    <?php endif; ?>

</main>
</body>
</html>