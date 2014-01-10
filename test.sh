#!/bin/bash

run ()
{

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
files=$(ls 'challenge '$difficulty' '$number)
for file in $files
do
    if [[ $file == *'.sh' ]]
    then
        # Bash
        echo 'Bash!'
        break
    elif [[ $file == *'.c' ]]
    then
        # C
        echo 'C!'
        break
    elif [[ $file == *'.java' ]]
    then
        # Java
        echo 'Java!'
        break
    elif [[ $file == *'.m' ]]
    then
        # MATLAB
        echo 'MATLAB!'
        break
    elif [[ $file == *'.ml' ]]
    then
        # OCaml
        echo 'OCaml!'
        break
    elif [[ $file == *'.php' ]]
    then
        # PHP
        echo 'PHP!'
        break
    elif [[ $file == *'.py' ]]
    then
        # Python
        echo 'Python!'
        break
    fi
done


