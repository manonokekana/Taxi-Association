<?php
//include 'database.php';

$name = filter_input(INPUT_POST,'name');
$surname = filter_input(INPUT_POST,'surname');
$id = filter_input(INPUT_POST,'id');
$contact = filter_input(INPUT_POST,'contact');
$l_code = filter_input(INPUT_POST,'code');
$l_issue = filter_input(INPUT_POST,'issue_date');
$l_expire = filter_input(INPUT_POST,'expiry_date');
$pdp = filter_input(INPUT_POST,'pdp');
$pdp_expiry = filter_input(INPUT_POST,'pdp_expiry');

if(filter_input(INPUT_POST, 'submit'))
{
    $query = "insert into driver_lic (code,first_issue_date,driver_lic_exp_date,pdp_exp_date) values ('$l_code','$l_issue','$l_expire','$pdp_expiry')";
    $db = new Database();
    $insert_lic = $db->insert($query);
    $lic_id = mysqli_insert_id($db->link);
    
    $q2 = "insert into driver (driver_name,driver_surname,driver_id_no,contact,driver_lic_id) values ('$name','$surname','$id','$contact','$lic_id')";
    $insert_driver = $db->insert($q2);
    
    if(!$insert_lic)
    {
        ?><script>alert("Driver has been inserted");</script><?php
    }else{
        echo 'inserted';
    }
}