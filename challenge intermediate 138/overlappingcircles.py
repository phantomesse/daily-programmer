#! /usr/bin/env python

import math

input = raw_input().split(" ")

x1 = float(input[0])
y1 = float(input[1])
x2 = float(input[2])
y2 = float(input[3])

# Check if circles overlap
distance = math.sqrt((x1 - x2)**2 + (y1 - y2)**2)

if distance >= 2:
    # Does not overlap
    print math.pi * 2
else:
    # Overlaps
    h = distance / 2
    angle = 2 * math.acos(h)
    segment_area = 2 * (angle / 2 - h * math.sqrt(1 - h**2))
    area = math.pi * 2 - segment_area
    print area