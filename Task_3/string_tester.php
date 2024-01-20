<?php
// Initial values
$name = $name ?? '';
$email = $email ?? '';
$phone = $phone ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>String Tester</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<main>
    <h1>String Tester</h1>

    <?php if (!empty($error_message)) : ?>
        <div class="error">
            <p><?php echo $error_message ?></p>
        </div>
    <?php endif ?>

    <form action="" method="post" name="user_form">
        <input type="hidden" name="action" value="form_submitted">

        <div class="label_input">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $name ?>">
        </div>

        <div class="label_input">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email ?>">
        </div>

        <div class="label_input">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $phone ?>">
        </div>

        <button type="submit" name="submit">Submit</button>
    </form>

    <div class="message">
        <h2>Message</h2>
        <p><?php echo nl2br(htmlspecialchars($message)) ?></p>
    </div>

</main>
</body>
</html>


