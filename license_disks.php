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
                <div class="col-md-2" style='padding-top: 2%'>
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
                <div class="col-md-8" style="text-align: center;padding-top: 10%;">
                    <?php
                        if(filter_input(INPUT_GET,'page'))
                        {
                            $query ="select * from taxi join taxi_disc where taxi.disc_id=taxi_disc.disc_id";
                            $db = new Database();
                            $results = $db->select($query);
                            
                             echo "<table class='table'>"
                            . "<thead>"
                                     . "<th>Registration</th>"
                                     . "<th>Make</th>"
                                     . "<th>Expiry Date</th>"
                                     . "<th>Renew</th>"
                                     . "</thead>";
                            
                            while($row = $results->fetch_assoc())
                            {
                                $make = $row['make'];
                                
                                $today = date("Y/m/d");
                                $taxi_reg = $row['taxi_reg'];
                                $disc_issue = $row['test_date'];
                                $disc_exp = $row['exp_date'];
                                
                                $to_date = strtotime($disc_exp);
                                $from_date = strtotime($today);
                                $day_diff = $to_date - $from_date;
                                $days_left = floor($day_diff/(60*60*24))."\n";
                                
                                if($days_left < 91 )
                                {    
                                    echo "<tr>"
                                            . "<td width=100>$taxi_reg</td>"
                                            . "<td width=100>$make</td>"
                                            . "<td width=100>$disc_exp</td>"
                                            . "<td width=100><a href='?renew=".$taxi_reg."'>Renew</a></td>"
                                            . "</tr>"
                                            . "</table>";
                                }
                            }
                        }elseif(filter_input(INPUT_GET,'renew')){
                            $taxi_reg = filter_input(INPUT_GET,'renew');
                            $query = "select * from taxi join taxi_disc on taxi.disc_id=taxi_disc.disc_id where taxi_reg='$taxi_reg'";
                            $db = new Database();
                            $r = $db->select($query);
                            while($row = $r->fetch_assoc())
                            {
                                $exp = $row['exp_date'];
                                ?>
                    <form method="post">
                        <input type="date" name="exp_date" id="reg" value="<?php echo $exp;?>" disabled><br><br>
                        <input type="button" value="Edit" onclick="edit()">
                        <input type="submit" value="Update" id="update" name="update" disabled>
                    </form>
                    <script>
                        function edit(){
                              document.getElementById('reg').disabled = false;
                              document.getElementById('update').disabled = false;
                        }
                    </script>
                                    <?php
                            }
                            if(filter_input(INPUT_POST,'update'))
                            {
                                $newDate = filter_input(INPUT_POST,'exp_date');
                                $q = "select disc_id from taxi where taxi_reg = '$taxi_reg'";
                                $qr = $db->select($q);
                                while($row = $qr->fetch_assoc())
                                {
                                    $id = $row['disc_id'];
                                    $query_update = "update taxi_disc set exp_date = '$newDate' where disc_id = '$id'";
                                    $qu = $db->update($query_update);
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
