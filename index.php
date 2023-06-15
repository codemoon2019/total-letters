<?php

function numberToWords($number) {
    $ones = array(
        0 => '',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen'
    );

    $tens = array(
        2 => 'twenty',
        3 => 'thirty',
        4 => 'forty',
        5 => 'fifty',
        6 => 'sixty',
        7 => 'seventy',
        8 => 'eighty',
        9 => 'ninety'
    );

    $words = '';

    if ($number == 1000) {
        return 'one thousand';
    }

    if ($number >= 100) {
        $words .= $ones[floor($number / 100)] . ' hundred';
        if ($number % 100 != 0) {
            $words .= ' and ';
        }
    }

    $number %= 100;

    if ($number >= 20) {
        $words .= $tens[floor($number / 10)];
        $number %= 10;
        if ($number != 0) {
            $words .= '-';
        }
    }

    $words .= $ones[$number];

    return $words;
}

function countLettersInNumbers($start, $end) {
    $count = 0;
    for ($i = $start; $i <= $end; $i++) {
        $numberWords = numberToWords($i);
        $numberWords = str_replace('-', '', $numberWords);
        $numberWords = str_replace(' ', '', $numberWords);
        $count += strlen($numberWords);
    }
    return $count;
}

$totalLetters = countLettersInNumbers(1, 1000);

echo $totalLetters;

?>