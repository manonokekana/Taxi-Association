<?php

$reg = filter_input(INPUT_POST,'registration');
$make = filter_input(INPUT_POST,'make');
$model = filter_input(INPUT_POST,'model');
$test_date = filter_input(INPUT_POST,'test_date');
$disc_exp_date = filter_input(INPUT_POST,'disc_exp_date');
$tare = filter_input(INPUT_POST,'tare');
$persons_standing = filter_input(INPUT_POST,'persons_standing');
$persons_sitting = filter_input(INPUT_POST,'persons_sitting');
$permit_issue_date = filter_input(INPUT_POST,'permit_issue_date');
$permit_exp_date = filter_input(INPUT_POST,'permit_exp_date');

if(filter_input(INPUT_POST,'submit'))
{
    $query = "insert into taxi_disc (test_date,exp_date,tare) values ('$test_date','$disc_exp_date','$tare')";
    $db = new Database();
    $result = $db->insert($query);
    $disc_id = mysqli_insert_id($db->link);
    
    $query2 = "insert into taxi_permit (persons_standing,persons_sitting,permit_issue_date,permit_exp_date) values ('$persons_standing','$persons_sitting','$permit_issue_date','$permit_exp_date')";
    $result2 = $db->insert($query2);
    $permit_id = mysqli_insert_id($db->link);
    
    $q2 = "insert into taxi (taxi_reg,make,model,driver_id,disc_id,permit_id) values('$reg','$make','$model','1','$disc_id','$permit_id')";
    $r2 = $db->insert($q2);
    
    if($result && $result2 && $r2)
    {
        ?><script>alert("taxi has been inserted");</script>
            <?php
    }
}