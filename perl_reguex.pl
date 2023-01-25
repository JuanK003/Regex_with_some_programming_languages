#!/usr/bin/perl

use strict;
use warnings;

my $t = time;

open(my $f, "<./results_4f052c2d-43b0-40fc-97a4-6672a196f4fb.csv") or die ("no hay archivo");

my $match   = 0;
my $nomatch = 0;

while(<$f>) {
    chomp;
    # 1877-03-03,England,Scotland,1,3,Friendly,London,England,FALSE
    if(m/^([\d]{4,4})\-.*?,(.*?),(.*?),(\d+),(\d+),.*$/) {
        if($5 > $4) {
            printf("%s: %s (%d) - (%d) %s\n",
            $1, $2, $4, $5, $3
            );
        }
        $match++;
    } else {
        $nomatch++;
    }
}

close($f);

printf("Se encontraron: \n - %d matches\n - %d no matches\ntardo %d segundos\n", $match, $nomatch, time() - $t);