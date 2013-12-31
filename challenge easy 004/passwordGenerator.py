#! /usr/bin/env python

from random import randint

number_of_passwords = int(raw_input("Number of passwords: "))
length_of_passwords = int(raw_input("Length of passwords: "))

for i in xrange(0, number_of_passwords):
    password = ""
    for j in xrange(0, length_of_passwords):
        password += chr(randint(32, 126))
    print password