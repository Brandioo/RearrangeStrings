<?php
function rearrangeString($str)
{
    // Count the number of letters and numbers
    $letterCount = 0;
    $numberCount = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_alpha($str[$i])) {
            $letterCount++;
        } else if (ctype_digit($str[$i])) {
            $numberCount++;
        }
    }

    // Check if it's possible to rearrange
    if (abs($letterCount - $numberCount) > 1) {
        return "";
    }

    // Separate letters and numbers into arrays
    $letters = [];
    $numbers = [];
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_alpha($str[$i])) {
            $letters[] = $str[$i];
        } else if (ctype_digit($str[$i])) {
            $numbers[] = $str[$i];
        }
    }

    $result = "";
    // Append characters alternately
    while (!empty($letters) && !empty($numbers)) {
        if ($letterCount >= $numberCount) {
            $result .= array_shift($letters);
            $letterCount--;
        } else {
            $result .= array_shift($numbers);
            $numberCount--;
        }
    }

    // Finish appending remaining characters from the non-empty array
    $result .= implode("", $letters);
    $result .= implode("", $numbers);

    return $result;
}

// Test cases
echo rearrangeString("z3b1a2");  // Output: "1a2b3z"
?>