#! /usr/bin/env python

def recursive_print(start, end):
    if end < start:
        return
    recursive_print(start, end-1)
    print end

recursive_print(1, 500)
recursive_print(501, 1000)