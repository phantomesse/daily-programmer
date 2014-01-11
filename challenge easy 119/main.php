<?php

function calculate_change($money) {
    $money = $money*100;

    $quarters = (int) ($money/25);
    if ($quarters > 0)
        echo "Quarters: ".$quarters;
    $money = $money%25;

    $dimes = (int) ($money/10);
    if ($dimes > 0)
        echo "\nDimes: ".$dimes;
    $money = $money%10;

    $nickels = (int) ($money/5);
    if ($nickels > 0)
        echo "\nNickels: ".$nickels;
    $money = $money%5;

    if ($money > 0)
        echo "\nPennies: ".$money;
}

$in = fopen('php://stdin', 'r');

while($line = fgets($in)) {
    echo "$".$line;
    calculate_change((float) $line);
    echo "\n\n";
}

fclose($in);

?>