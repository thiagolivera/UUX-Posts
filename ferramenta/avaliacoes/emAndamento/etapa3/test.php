<?php
include './avaliadoresControle.php';

$avaliadoresControle = new AvaliadoresControle();

$teste = $avaliadoresControle->isEmailValido("thiago.engsoftware@gmail.com");

if($teste){
    echo $teste;
} else{
    echo $teste;
}