#!/bin/bash
echo "number of tiers = "$1
echo "trunk character = "$2
echo "tree character = "$3

for (( width=1; width<=$1; width+=2 ))
do
    tier=""

    # Draw the spaces
    for (( i=0; i < ($1-$width)/2; i++ ))
    do
        tier=$tier" "
    done

    # Draw the leaves
    for (( i=0; i<$width; i++ ))
    do
        tier=$tier$3
    done
    echo "$tier"
done

# Draw tree trunk
trunk=$2$2$2
for (( i=0; i < ($1-3)/2; i++ ))
do
    trunk=" "$trunk
done
echo "$trunk"