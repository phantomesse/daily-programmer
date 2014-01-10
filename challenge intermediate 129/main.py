#! /usr/bin/env python

import math

# Get the number of vectors
n = int(raw_input())

# Get the vectors
vectors = []
for i in xrange(0, n):
    line = raw_input().split(" ")
    a = int(line[0])
    vectors.append([])
    for j in xrange(0, a):
        vectors[i].append(float(line[j+1]))

# Get the number of functions to compute
m = int(raw_input())

# Create function definitions
def functions(function, line):
    vector1 = vectors[int(line[1])]
    if function == 'l':
        print length(vector1)
    elif function == 'n':
        unitvector = normalize(vector1)
        for component in unitvector:
            print component,
        print
    elif function == 'd':
        vector2 = vectors[int(line[2])]
        print dotproduct(vector1, vector2)

# Compute a vector's Euclidean space length
def length(vector):
    sum = 0
    for component in vector:
        sum += component*component
    return round(math.sqrt(sum), 5)

# Compute a vector's unit vector
def normalize(vector):
    vectorlength = length(vector)
    unitvector = []
    for component in vector:
        unitvector.append(round(component/vectorlength, 5))
    return unitvector

# Compute the dot product of two vectors
def dotproduct(vector1, vector2):
    sum = 0
    for i in xrange(0, len(vector1)):
        sum += vector1[i]*vector2[i]
    return round(sum, 5)

# Get and process functions to print output
for i in xrange(0, m):
    line = raw_input().split(" ")
    functions(line[0], line)