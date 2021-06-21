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
             Taxi Association
            <div class="collapse navbar-collapse" id="collapse_target">
                <ul class="navbar-nav w-100 justify-content-end padd">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#home">HOME?</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;padding-top: 5%;">
                    <h3>Assign Taxi/Driver</h3>
                    <br>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <b>SELECT DRIVER</b><BR>
                                <?php 
                            $query = "select * from driver";
                            $db = new Database();
                            $details = $db->select($query);
                            
                            echo "<select size='4' name='driver' class='form-control'>";
                            
                            while($row = $details->fetch_assoc())
                            {
                                $name = $row['driver_name'];
                                $id = $row['driver_id_no'];
                                $fit = $row['fit'];
                                
                                echo "<option name='$id' value='$id'>$id</option>";
                            }
                            echo "</select>";
                        ?>
                            </div>
                            <div class="col-md-4">
                                <b>SELECT TAXI</b>
                               <?php
                               $query_taxi = "select * from taxi";
                               $details_taxi = $db->select($query_taxi);
                               
                               echo "<select size='4' name='taxi' class='form-control'>";
                                while($r = $details_taxi->fetch_assoc())
                                {
                                    $reg = $r['taxi_reg'];
                                    echo "<option name='$reg' value='$reg'>$reg</option>";
                                }
                                echo "</select>";
                               ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center"><br><br>
                                <input type="submit" value="Assign" name="assign" class="btn-md">
                            </div>
                            <?php
                             if(filter_input(INPUT_POST,'assign'))
                             {
                                 $driver = filter_input(INPUT_POST,'driver');
                                 $taxi =  filter_input(INPUT_POST,'taxi');
                                 
                                 $query = "select * from driver where driver_id_no='$driver'";
                                 $db = new Database();
                                 $select = $db->select($query);
                                 
                                 while($row = $select->fetch_assoc())
                                 {
                                     $fit = $row['fit'];
                                    
                                     if($fit == "yes")
                                     {
                                         echo 'Taxi to be assigned';
                                     }else{
                                         header("location: pre_assess.php?fit=$driver");
                                     }
                                 }
                             }
                            ?>
                        </div>
                 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
