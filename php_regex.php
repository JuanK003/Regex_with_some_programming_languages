<?php

$file = fopen("./results_4f052c2d-43b0-40fc-97a4-6672a196f4fb.csv", "r");

$match   = 0;
$nomatch = 0;
$t       = time();

while(!feof($file)) {
    $line = fgets($file);
    if(preg_match(
        '/^(\d{4}\-\d\d\-\d\d), (.+), (.+), (\d+), (\d+).*$/i',
        $line,
        $m
    )) {
        //print_r($m);
        if($m[4] == $m[5]) {
            printf("Empate: ");
        } elseif ($m[4] > $m[5]) {
            echo "Local: ";
        } else {
            echo "Visitante: ";
        }
        printf("\t%s %s [%d - %d]\n", $m[2], $m[3], $m[4], $m[5]);
        $match++;
    } else {
        $nomatch++;
        echo $line;
    }
}

fclose($file);  

printf("\n\nmatch %d\nno match %d\n", $match, $nomatch);
printf("tiempo: %d\n", time() - $t);