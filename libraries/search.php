<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$result ="";
$make ="";
$driver ="";
$query = "";
$search_box = filter_input(INPUT_POST,'name');
if(filter_input(INPUT_POST,'submit'))
{
    if(!$search_box)
    {
        $result = "Search Box Empty!!";
    }else{   
            $query ="select * from taxi join driver on taxi.driver_id = driver.driver_id where driver_id_no like '%$search_box%' or taxi_reg like '%$search_box%'";
            $db = new Database();
            $results = $db->select($query);
            if($results)
            {
                while($row = $results->fetch_assoc())
                {
                    $make = $row['make'];
                    $driver = $row['driver_name'];
                    echo $driver;
                    echo $make;
                }
            }else{
                echo "No records for ".$search_box." found!!";
            }
            
    }
    
}