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
                <div class="col-md-2" style="padding-top:2%;"> 
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
                            $query ="select * from taxi join taxi_permit where taxi.permit_id=taxi_permit.permit_id";
                            $db = new Database();
                            $results = $db->select($query);
                            
                            echo "<table class='table'>"
                                    . "<thead>"
                                            . "<th>Registration</th>"
                                            . "<th>Make</th>"
                                            . "<th>Expirty Date</th>"
                                            . "<th>Renew</th>"
                                            . "</thead>";
                            while($row = $results->fetch_assoc())
                            {
                                $make = $row['make'];
                                
                                $today = date("Y/m/d");
                                $taxi_reg = $row['taxi_reg'];
                                $permit_issue = $row['permit_issue_date'];
                                $permit_exp = $row['permit_exp_date'];
                                
                                $to_date = strtotime($permit_exp);
                                $from_date = strtotime($today);
                                $day_diff = $to_date - $from_date;
                                $days_left = floor($day_diff/(60*60*24))."\n";
                                
                                if($days_left < 91 )
                                { 
                                    
                                    echo "<tr>"
                                            . "<td width=100>$taxi_reg</td>"
                                            . "<td width=100>$make</td>"
                                            . "<td width=100>$permit_exp</td>"
                                            . "<td width=100><a href='?renew=".$taxi_reg."'>Renew</a></td>"
                                            . "</tr>"
                                            . "</table>";
                                }
                            }
                        }elseif(filter_input(INPUT_GET,'renew')){
                           $reg = filter_input(INPUT_GET,'renew');
                           $query = "select * from taxi join taxi_permit on taxi.permit_id=taxi_permit.permit_id where taxi_reg = '$reg'";
                           $db= new Database();
                           $r = $db->select($query);
                           
                           while($rw = $r->fetch_assoc())
                           {
                                $exp = $rw['permit_exp_date'];

                               ?>
                                <form method="post">
                                    Update License Disk for <?php echo $reg;?><br><br>
                                    <input type="date" name="exp_date" id="reg" value="<?php echo $exp;?>" disabled/><br>  <br>
                                    <input type="button" value="Edit" class="btn btn-md" onclick="edit()"/>
                                    <input type="submit" value="Update" id="update" name="update" class="btn btn-md" disabled/>
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
                               $db = new Database();
                               $qr = ("select permit_id from taxi where taxi_reg = '$reg'");
                               $r = $db->select($qr);
                               while($row = $r->fetch_assoc())
                               {
                                   $id = $row['permit_id'];
                                   $query_update = "update taxi_permit set permit_exp_date = '$newDate' where permit_id = '$id'";
                                   $update = $db->update($query_update);
                               }
                           }
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
