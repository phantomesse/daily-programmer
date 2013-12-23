#!/bin/bash

FILES=tests/*
for file in $FILES
do
    echo "Testing $file..."
    echo ""
    
    echo "INPUT"
    cat $file
    echo ""
    echo ""

    echo "OUTPUT"
    ./braille < $file
    echo "----------------------------------------------------------------------------------------------------"
done