<?php

/**
 * Rebuild Alphabetic array with the new shift value 
 * 
 * @author Mohammed Ibrahim <m@mibrah.im>
 * 
 * @param   int         $shift_number       Number of shifted value
 * @return  array       $shiftedLetters     The rebuilded letters array
 */
function rebuild_letters_arr($shift_number) {

    $letters = range('a', 'z');

    $alpCount = count($letters);

    $shiftedLetters = [];
    
    /**
     * Make sure to reset shifted value to minimum than letters array size.
     */
    if ($shift_number > $alpCount) {
        $shift_number = $shift_number - (intval($shift_number / $alpCount) * $alpCount);
    }

    foreach ($letters as $k => $v) {

        $newIndex = $k + $shift_number;

        if ($newIndex >= $alpCount) {
            $newIndex -= $alpCount;
        }

        $shiftedLetters[$v] = $letters[$newIndex];
    }

    return $shiftedLetters;
}

$letters = rebuild_letters_arr($k);
$newWord = '';

foreach (str_split($s) as $let) {
    $newWord .= isset($letters[strtolower($let)]) ? (ctype_upper($let) ? strtoupper($letters[strtolower($let)]) :  $letters[strtolower($let)]) : $let;
}

echo $newWord;