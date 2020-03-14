<?php

function showButton($message)
{
    echo "<button type='button' onClick='alert(\"$message\")'>$message</button>";
}

showButton('test1');
showButton('test2');
showButton('test3');
showButton('test4');

function add($a, $b)
{
    return $a + $b;
}

echo add(4, 2);
