#!/usr/bin/perl

use strict;
use warnings;

# Read bad words file from argument
my ($filename) = @ARGV;
open(my $file, $filename) or die "Can't open ", @ARGV;
my @badwords = ();
while (<$file>) {
    my $badword = $_;
    $badword =~ s/^\s+//;
    $badword =~ s/\s+$//;
    push(@badwords, $badword);
}
close($file);

# Read text to censor from stdin
while (<STDIN>) {
    my @line = split(" ", $_);
    foreach my $word (@line) {
        # Check if this word is a bad word
        my $badwordfound = 0;
        foreach my $badword (@badwords) {
            my $index = index(lc($word), lc($badword));
            if ($index != -1) {
                $badwordfound = 1;
                
                print substr($word, 0, $index);
                print substr($word, $index, $index + 1);
                my $length = length($badword);
                for (my $i = 1; $i < $length; $i++) {
                    print "*";
                }
                print substr($word, $index + $length);

                last;
            }
        }
        if ($badwordfound == 0) {
            print $word;
        }
        print " ";
    }
    print "\n";
}