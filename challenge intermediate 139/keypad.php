<?php
$key = [
0 => [],
1 => [],
2 => ['a', 'b', 'c'],
3 => ['d', 'e', 'f'],
4 => ['g', 'h', 'i'],
5 => ['j', 'k', 'l'],
6 => ['m', 'n', 'o'],
7 => ['p', 'q', 'r', 's'],
8 => ['t', 'u', 'v'],
9 => ['w', 'x', 'y', 'z']
];

# Analyzes knowing knowing the number of times a digit is pressed
function analyze_numbers($numbers) {
    global $key;
    $numbers_array = explode(" ", $numbers);

    $prefix = "";
    foreach($numbers_array as $number) {
        $times_pressed = strlen($number);
        $prefix .= $key[substr($number, 0, 1)][$times_pressed - 1];
    }

    # Iterate through words to find ones with the matching prefix
    $filereader = fopen('dictionary.txt','r');
    while ($line = fgets($filereader)) {

        if (strlen($prefix) < strlen($line)) {
            $line_substr = substr($line, 0, strlen($prefix));
            if ($line_substr === $prefix) {
                echo "$line<br />";
            }
        }


    }
    fclose($filereader);
}

# Analyzes without knowing the number of times a digit is pressed
function analyze_numbers_norepeat($numbers) {
    global $key;
    $numbers_array = str_split($numbers);

    # Create an array of the number of letters per number in the number string
    $combinations = array();
    $number_of_combinations = 1;
    foreach($numbers_array as $number) {
        $num_letters = count($key[$number]);
        $combinations[] = [$number, $num_letters];
        $number_of_combinations *= $num_letters;
    }

    # Create a string combinations array
    $numbers_combinations = array();
    for ($i = 0; $i < count($combinations); $i++) {
        $number = $combinations[$i][0];
        $num_letters = $combinations[$i][1];

        for ($j = 1; $j <= $num_letters; $j++) {
            for ($k = 0; $k < $number_of_combinations; $k += $j) {
                $numbers_combinations[$k] .= $number;
            }
        }

    }

    foreach($numbers_combinations as $blah) {
        echo $blah."<br />";
    }

    var_dump($combinations);
}

echo "<h1>INPUT</h1>";
echo "7777 666 555 3";
echo "<h1>OUTPUT</h1>";
analyze_numbers("7777 666 555 3");

echo "<hr>";

echo "<h1>INPUT</h1>";
echo "7653";
echo "<h1>OUTPUT</h1>";
analyze_numbers_norepeat("7653");

?>