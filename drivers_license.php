<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Taxi Association</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type='text/css' rel='stylesheet' href='css/styles.css'/>
    </head>
    <?php 
        include 'config/config.php';
        include 'libraries/database.php';
    ?>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color:grey;padding-left:4%;padding-right: 4%;">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target" style="color:white">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="images/logo.PNG" alt="logo" width="100"/>
            <div class="collapse navbar-collapse" id="collapse_target">
                <ul class="navbar-nav w-100 justify-content-end padd">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout?</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class='col-md-2' style='padding-top: 2%'>
                    <?php
                        if(filter_input(INPUT_COOKIE,'username'))
                        {
                            $logged_user = filter_input(INPUT_COOKIE,'username');
                            echo "<a href='dashboard.php'><- Back</a>" ;
                        }else{
                            header('Location: index.php');
                        }
                    ?>
                </div>
                <div class="col-md-8" style="text-align: center;padding-top: 10%">
                    <?php
                        if(filter_input(INPUT_GET,'page'))
                        {
                            $query ="select * from driver join driver_lic where driver.driver_lic_id=driver_lic.driver_lic_id";
                            $db = new Database();
                            $results = $db->select($query);
                            
                            echo "<table class='table'>"
                            . "<thead>"
                                    . "<th>ID No</th>"
                                    . "<th>Driver Name</th>"
                                    . "<th>First Issue</th>"
                                    . "<th>Expiry Date</th>"
                                    . "<th>Renew</th>"
                                    . "</thead>";
                            
                            while($row = $results->fetch_assoc())
                            {
                                $today = date("Y/m/d");
                                $driver_id = $row['driver_id_no'];
                                $driver_name = $row['driver_name'];
                                $driver_lic_issue = $row['first_issue_date'];
                                $driver_lic_exp = $row['driver_lic_exp_date'];
                                
                                $to_date = strtotime($driver_lic_exp);
                                $from_date = strtotime($today);
                                $day_diff = $to_date - $from_date;
                                $days_left = floor($day_diff/(60*60*24))."\n";
                                
                                if($days_left < 91 )
                                {    
                                    echo "<tr>"
                                            . "<td width=100>$driver_id</td>"
                                            . "<td width=100>$driver_name</td>"
                                            . "<td width=100>$driver_lic_issue</td>"
                                            . "<td width=100>$driver_lic_exp</td>"
                                            . "<td width=100><a href='?renew=".$driver_id."'>Renew</a></td>"
                                            . "</tr>"
                                            . "</table>";
                                }
                            }
                        }else{
                            header('Location: index.php');
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
