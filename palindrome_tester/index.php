<?php
// Initial values
$word = $word ?? '';
$show_results = false;

// Handle form submission or form reset
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'form_submitted':
        $word = filter_input(INPUT_POST, 'word');

        // Validate word
        if (empty($word)) $error_message = 'Please enter a word or phrase.';

        // Transform to lowercase
        $word_lowercase = strtolower($word);

        // Check for standard palindrome (remove spaces and punctuation)
        $regex_pattern = '/[^a-z0-9]/';
        $standard = preg_replace($regex_pattern, '', $word_lowercase);
        $standard_reversed = strrev($standard);
        $is_standard = strcmp($standard, $standard_reversed) === 0;

        // Check for perfect palindrome (keep spaces and characters)
        $perfect_reversed = strrev($word_lowercase);
        $is_perfect = strcmp($word_lowercase, $perfect_reversed) === 0;

        // Render results
        $standard_result = $word . ($is_standard ? ' is ' : ' is not ') . 'a standard palindrome.';
        $perfect_result = $word . ($is_perfect ? ' is ' : ' is not ') . 'a perfect palindrome.';

        if (empty($error_message)) $show_results = true;
        break;

    case 'reset_form':
        $word = '';
        break;
}

include 'palindrome_tester.php';
