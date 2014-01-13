#!/bin/bash

# Function for running tests
test()
{
    executable=$1
    tests=$2

    if [[ $tests == '' ]]; then
        # No tests
        $executable
    else
        for test in $tests
        do
            echo 'testing '$test
            $executable < 'tests/'$test
        done
    fi
}

# Retrieve challenge info
# Usage: ./run.sh <difficulty> <number>
# Eg. ./run.sh easy 1
difficulty=$1
number=$2
while [ ${#number} -lt 3 ]; do
    number='0'$number
done

# Determine which language is used
cd 'challenge '$difficulty' '$number
files=$(ls)

# Check if there is a makefile first
# Note that, if there is a makefile,
# then none of the file names should be called "main.*"
# Rather, the executable should be called "main"
makefile=false

for file in $files
do
    if [[ $file == 'makefile' ]]; then
        $makefile = true
        make &
        wait
    elif [[ $file == 'tests' ]]; then
        # Find the folder for tests
        tests=$(ls $file)
    fi
done

# Look for the file that starts with "main"
for file in $files
do
    if [[ $file == 'main'* ]] || [[ $file == 'Main'* ]]; then
        # Execute the file depending on the file type
        ext=${file##*\.}
        case "$ext" in
            c) # C
                gcc $file -o main
                test ./main "$tests"
                rm main
                ;;
            java) # Java
                echo $file
                javac $file
                test 'java Main' "$tests"
                rm Main.class
                ;;
            m) # MATLAB
                # TODO: Add support for injecting test cases via stdin
                matlab -nodisplay -r "main; quit"
                ;;
            ml) # TODO: Add compilation for OCaml
                ocamlc -o main str.cma $file
                test ./main "$tests"
                rm *.cmi *.cmo
                ;;
            php) # PHP
                test 'php main.php' "$tests"
                ;;
            py) # Python
                test ./$file "$tests"
                ;;
            sh) # Bash
                test ./$file "$tests"
                ;;
            *) # Some executable
                test ./$file "$tests"
                ;;
        esac
        break
    fi
done

# Clean up if necessary
if [ $makefile == true ]; then
    make clean
fi