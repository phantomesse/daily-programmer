<?php

function nuts_and_bolts($filename) {
    $filereader = fopen($filename,'r');
    
    # Get number of rows
    $rows = fgets($filereader);
    
    # Fill out the old list
    $old_list = array();
    for ($i = 0; $i < $rows; $i++) {
        $line = split(" ", fgets($filereader));
        $old_list[$line[0]] = $line[1];
    }

    # Scan through new list, filling out changes array
    $changes = array();
    for ($i = 0; $i < $rows; $i++) {
        $line = split(" ", fgets($filereader));
        $change = $line[1] - $old_list[$line[0]];
        if ($change !== 0) {
            $changes[$line[0]] = $change;
        }
    }

    # Print changes
    foreach($changes as $item => $change) {
        echo $item." ";
        if ($change > 0) {
            echo "+".$change."<br />";
        } else {
            echo $change."<br />";
        }
    }
    
    fclose($filereader);
}

function print_input($filename) {
    $filereader = fopen($filename, 'r');

    while (($line = fgets($filereader)) !== false) {
        echo $line."<br />";
    }

    fclose($filereader);
}

echo "<h1>INPUT</h1>";
print_input("nutsandbolts_input1.txt");
echo "<h1>OUTPUT</h1>";
nuts_and_bolts("nutsandbolts_input1.txt");

echo "<hr>";

echo "<h1>INPUT</h1>";
print_input("nutsandbolts_input2.txt");
echo "<h1>OUTPUT</h1>";
nuts_and_bolts("nutsandbolts_input2.txt");

?>