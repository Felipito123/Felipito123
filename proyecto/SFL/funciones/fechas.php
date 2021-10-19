<?php

$a = "2021-04-12";
$b = "2021-04-11";

// $a=strtotime($a);
// $b=strtotime($b);

if ($a > $b) {
    echo "$a MAYOR $b";
} elseif ($a == $b) {
    echo "$a IGUAL A $b";
} else {
    echo "$a MENOR $b";
}