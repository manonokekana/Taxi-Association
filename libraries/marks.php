<?php

if(filter_input(INPUT_POST,'submit'))
{
    $one = filter_input(INPUT_POST,'one');
    $two = filter_input(INPUT_POST,'two');
    $three = filter_input(INPUT_POST,'three');
    $four = filter_input(INPUT_POST,'four');
    $five = filter_input(INPUT_POST,'five');
    $six = filter_input(INPUT_POST,'six');
    $seven = filter_input(INPUT_POST,'seven');
    $eight = filter_input(INPUT_POST,'eight');
    $nine = filter_input(INPUT_POST,'nine');
    $ten = filter_input(INPUT_POST,'ten');
    $eleven = filter_input(INPUT_POST,'eleven');
    $twelve = filter_input(INPUT_POST,'twelve');
    $thirteen = filter_input(INPUT_POST,'thirteen');
    $fourteen = filter_input(INPUT_POST,'fourteen');
    $fifteen = filter_input(INPUT_POST,'fifteen');
    $sixten = filter_input(INPUT_POST,'sixteen');
    
    $score = $one+$two+$three+$four+$five+$six+$seven+$eight+$nine+$ten+$eleven+$twelve+$thirteen+$fourteen+$fifteen+$sixten;
    echo "$score/16";
    
}
