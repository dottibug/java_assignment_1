<?php
// -------------------------------------------------------------------------
// Author: Tanya Woodside
//
// COMP 3541 Assignment 1
//
// Summary: This program calculates the future value of an investment based
// on an interest rate compounded over a number of years. There is also an
// option to compound the interest monthly.
// -------------------------------------------------------------------------

// Initial values
$investment = $investment ?? '';
$interest_rate = $interest_rate ?? '';
$years = $years ?? '';
$investment_formatted = '';
$yearly_rate_formatted = '';
$num_years = '';
$future_value_formatted = '';
$compound_rate = '';
$date = '';

$compound_monthly = false;
$show_results = false;

// Handle form submission
$action = filter_input(INPUT_POST, 'action');

if ($action === 'calculate') {

    // Get input data
    $investment = filter_input(INPUT_POST, 'investment',
        FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate',
        FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years',
        FILTER_VALIDATE_INT);
    $compound_monthly = isset($_POST['compound_monthly']);

    // Validate investment, interest rate, and years
    try {
        if ($investment === FALSE) {
            throw new Exception('Investment must be a valid number.');
        } else if ($investment <= 0) {
            throw new Exception('Investment must be greater than zero.');
        } else if ($interest_rate === FALSE) {
            throw new Exception('Interest rate must be a valid number.');
        } else if ($interest_rate <= 0) {
            throw new Exception('Interest rate must be greater than zero.');
        } else if ($interest_rate > 15) {
            throw new Exception('Interest rate must be less than or equal to 15.');
        } else if ($years === FALSE) {
            throw new Exception('Years must be a valid whole number.');
        } else if ($years <= 0) {
            throw new Exception('Years must be greater than zero.');
        } else if ($years > 30) {
            throw new Exception('Years must be less than 31.');
        } else {
            $error_message = '';
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }

    // Calculate future value
    $num_years = $years;
    $future_value = $investment;
    $compound_rate = $compound_monthly ? 'monthly' : 'yearly';

    if ($compound_monthly) {
        // Compounded monthly
        $monthly_interest = ($interest_rate / 100) / 12;
        for ($i = 1; $i <= $num_years * 12; $i++) {
            $future_value += $future_value * $monthly_interest;
        }
    } else {
        // Compounded yearly
        for ($i = 1; $i <= $years; $i++) {
            $future_value += $future_value * $interest_rate * .01;
        }
    }

    // Format currency and percent
    $investment_formatted = '$' . number_format($investment, 2);
    $yearly_rate_formatted = $interest_rate . '%';
    $future_value_formatted = '$' . number_format($future_value, 2);

    // Get current date
    $date = date('m/d/Y');

    // Render results if no errors
    if (empty($error_message)) $show_results = true;
}

include 'future_value_calculator.php';


