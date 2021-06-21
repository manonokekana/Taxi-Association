<?php

if(filter_input(INPUT_POST,'submit'))
{
    
    if(filter_input(INPUT_GET,'msg1'))
    {
        $id = filter_input(INPUT_GET,'msg1');
        echo $id;
        echo 'Taxi update to be executed here';
        echo "<br><a href='../index.php'>Home</a>";
    }
}
