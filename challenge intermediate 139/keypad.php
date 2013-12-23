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

    # Get number of combinations per number
    $combinations = [];
    foreach($numbers_array as $number) {
        $combinations[$number] = count($key[$number]);
    }

    $str1 = "";
    $str2 = "";
    $str3 = "";
    $str4 = "";
    $prefixes = array();
    for($i = 0; $i < $combinations[$numbers_array[0]]; $i++) {
        $str1 .= $numbers_array[0];
        $str2 = "";
        $str3 = "";
        $str4 = "";

        for($j = 0; $j < $combinations[$numbers_array[1]]; $j++) {
            $str2 .= $numbers_array[1];
            $str3 = "";
            $str4 = "";

            for($k = 0; $k < $combinations[$numbers_array[2]]; $k++) {
                $str3 .= $numbers_array[2];
                $str4 = "";

                for($l = 0; $l < $combinations[$numbers_array[3]]; $l++) {
                    $str4 .= $numbers_array[3];

                    $prefix = "";
                    foreach([$str1, $str2, $str3, $str4] as $number) {
                        $times_pressed = strlen($number);
                        $prefix .= $key[substr($number, 0, 1)][$times_pressed - 1];
                    }

                    $prefixes[] = $prefix;
                }
            }
        }
    }

    sort($prefixes);

    # Iterate through words to find ones with the matching prefixes
    $startmatching = false;
    $filereader = fopen('dictionary.txt','r');
    while ($line = fgets($filereader)) {

        if ($startmatching) {
            if ($line[0] > $prefixes[count($prefixes)-1][0]) {
                $startmatching = false;
            }

            foreach ($prefixes as $prefix) {
                if (strlen($prefix) < strlen($line)) {
                    $line_substr = substr($line, 0, strlen($prefix));
                    if ($line_substr === $prefix) {
                        echo "$line<br />";
                        break;
                    }
                }
            }

        } else {
            if ($line[0] == $prefixes[0][0]) {
                $startmatching = true;
            }
        }

    }
    fclose($filereader);
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