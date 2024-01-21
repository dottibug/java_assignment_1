<?php
$show_passwords = false;

// Process form submission or form reset
$action = filter_input(INPUT_POST, 'action');;

switch ($action) {
    case 'form_submitted':

        // Get the form data
        $word_1 = filter_input(INPUT_POST, 'word_1');
        $word_2 = filter_input(INPUT_POST, 'word_2');
        $word_3 = filter_input(INPUT_POST, 'word_3');
        $word_4 = filter_input(INPUT_POST, 'word_4');

        // Check for empty inputs, string length 4 to 7, and only letters
        $words_array = array($word_1, $word_2, $word_3, $word_4);
        $word_pattern = '/[^a-zA-Z]/';

        foreach ($words_array as $w) {
            if (empty($w)) {
                $error_message = 'Please enter four words.';
                break;
            } else if (preg_match($word_pattern, $w) === 1) {
                $error_message = 'Words can only contain letters.';
                break;
            } else if (strlen($w) < 4 || strlen($w) > 7) {
                $error_message = 'Each word must be between 4 and 7 letters long.';
                break;
            } else {
                $error_message = '';
            }
        }

        // Convert to HTML entities and transform text to uppercase
        // NOTE: mutates the original $words_array
        foreach ($words_array as &$w) {
            $w = htmlspecialchars($w);
            $w = strtoupper($w);
        }
        
        // Shuffle and create 4 password suggestions
        $words_uppercase = implode($words_array);
        $shuffled_words = array();
        for ($i = 0; $i <= 3; $i++) {
            $shuffled_words[$i] = str_shuffle($words_uppercase);
        }

        // Render passwords
        if (empty($error_message)) $show_passwords = true;

        break;

    case 'reset_form':
        $word_1 = '';
        $word_2 = '';
        $word_3 = '';
        $word_4 = '';

        break;

}
include 'random_passwords.php';
?>