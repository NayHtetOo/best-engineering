<?php

if (!function_exists('change_to_comma_separated_value')) {
    /**
     * Format a number with commas.
     *
     * @param float|int $x
     * @return string
     */
    function change_to_comma_separated_value($x) {
        // Convert number to string
        $x = (string) $x;
        // Use a regular expression to add commas
        return preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', $x);
    }
}
?>
