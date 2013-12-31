<?php

function student_management($filename) {
    $filereader = fopen($filename,'r');

    # Get number of students and grades
    list($number_of_students, $number_of_grades) = split(' ', fgets($filereader));

    # Iterate through students
    $print_string = "";
    $class_grade_sum = 0;
    for ($i = 0; $i < $number_of_students; $i++) {
        $line = split(' ', fgets($filereader));
        $student = $line[0];

        # Sum all the grades
        $grade_sum = 0;
        for ($j = 1; $j <= $number_of_grades; $j++) {
            $grade_sum += $line[$j];
        }
        $class_grade_sum += $grade_sum;
        $grade_average = $grade_sum / $number_of_grades;

        # Get student name and average grade
        $print_string .= $student." ".number_format((float)$grade_average, 2, '.', '')."<br />";
    }

    # Calculate class average and print everything
    $class_grade_average = $class_grade_sum / ($number_of_students * $number_of_grades);
    echo number_format((float)$class_grade_average, 2, '.', '')."<br />";
    echo $print_string;
}

function print_input($filename) {
    $filereader = fopen($filename, 'r');

    while (($line = fgets($filereader)) !== false) {
        echo $line."<br />";
    }

    fclose($filereader);
}

echo "<h1>INPUT</h1>";
print_input("studentmanagement_input1.txt");
echo "<h1>OUTPUT</h1>";
student_management("studentmanagement_input1.txt");

echo "<hr>";

echo "<h1>INPUT</h1>";
print_input("studentmanagement_input2.txt");
echo "<h1>OUTPUT</h1>";
student_management("studentmanagement_input2.txt");

?>