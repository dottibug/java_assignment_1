<!DOCTYPE html>
<html lang="en">
<head>
    <title>Random Password Generator</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<main>
    <h1>Password Generator</h1>
    <p class="instructions">Enter four words (4 to 7 characters long) to generate random passwords.</p>

    <!-- Conditionally render error message -->
    <?php if (!empty($error_message)) : ?>
        <div class="error">
            <p><?php echo $error_message ?></p>
        </div>
    <?php endif ?>

    <form action="" method="post" id="word_form">

        <div class="word_inputs">
            <div class="label_input">
                <label for="word_1">Word 1</label>
                <input type="text" name="word_1" id="word_1" value="<?php echo htmlspecialchars($word_1) ?>">
            </div>

            <div class="label_input">
                <label for="word_2">Word 2</label>
                <input type="text" name="word_2" id="word_2" value="<?php echo htmlspecialchars($word_2) ?>">
            </div>

            <div class="label_input">
                <label for="word_3">Word 3</label>
                <input type="text" name="word_3" id="word_3" value="<?php echo htmlspecialchars($word_3) ?>">
            </div>

            <div class="label_input">
                <label for="word_4">Word 4</label>
                <input type="text" name="word_4" id="word_4" value="<?php echo $word_4 ?>">
            </div>
        </div>

        <div class="buttons">
            <button type="submit" name="action" value="form_submitted">Submit</button>
            <button type="submit" name="action" value="reset_form" class="btn_reset">Reset</button>
        </div>

    </form>

    <!-- Conditionally render password suggestions -->
    <?php if ($show_passwords) : ?>
        <section>
            <hr>
            <h1>Password Suggestions</h1>
            <ul>
                <?php foreach ($shuffled_words as $w) : ?>
                    <li><?php echo $w ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>

</main>
</body>
</html>