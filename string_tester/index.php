<?php
// -------------------------------------------------------------------------
// Author: Tanya Woodside
//
// COMP 3541 Assignment 1
//
// Summary: This program takes user input of name, email, and phone number
// and returns a formatted summary of the data.
// -------------------------------------------------------------------------

// Initial values
$name = $name ?? '';
$email = $email ?? '';
$phone = $phone ?? '';
$message = 'Enter some data and click the \'Submit\' button.';

// Process form submission
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'form_submitted':

        // Get input values
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone');

        // Validate name, email, and phone number
        if (empty($name)) {
            $error_message = 'Please enter a name.';
            break;
        } else if (is_numeric($name)) {
            $error_message = 'Name can not be a number.';
            break;
        } else if (empty($email)) {
            $error_message = 'Please enter an email.';
            break;
        } else if (empty($phone)) {
            $error_message = 'Please enter a phone number.';
            break;
        } else {
            // Remove everything but digits from phone number
            $phone_pattern = '/[^0-9]/';
            $phone_formatted = preg_replace($phone_pattern, '', $phone);
            // Check phone number length
            if (strlen($phone_formatted) < 7) {
                $error_message = "Phone number must be at least 7 digits.";
                break;
            } else {
                $error_message = '';
            }
        }

        // Format name
        $name_lowercase = strtolower($name);
        $name_array = explode(' ', $name_lowercase);

        $first_name = ucfirst($name_array[0]);
        $middle_name = count($name_array) == 3 ? ucfirst($name_array[1]) : '';
        $last_name = count($name_array) == 3 ? ucfirst($name_array[2]) : ucfirst($name_array[1]);
        $full_name = $first_name . ' ' . $middle_name . ' ' . $last_name;

        // Format phone number
        $area_code = substr($phone_formatted, 0, 3);
        $phone_prefix = substr($phone_formatted, 3, 3);
        $phone_suffix = substr($phone_formatted, 6);

        // Format message
        $message = <<<MESSAGE
Hello $first_name,

Thank you for entering this data:

Name: $full_name
Email: $email
Phone: $area_code-$phone_prefix-$phone_suffix

First Name: $first_name
Middle Name: $middle_name
Last Name: $last_name

Area code: $area_code
Phone number: $phone_prefix-$phone_suffix
MESSAGE;

        break;
}

include 'string_tester.php';
