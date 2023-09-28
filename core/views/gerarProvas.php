<?php 

// Cod só pra saber como funciona o sorteio
$var = [];

for ($i=0; $i < 10; $i++) { 
    $cod = rand(1, 10);
    if (in_array($cod, $var)) {
        echo "esta aqui $cod<br>";
    }else {
        array_push($var, $cod);
    }
}

var_dump($var);
?>