<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Taxi Association Dashbaord</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type='text/css' rel='stylesheet' href='css/styles.css'/>  
        <script type="text/javascript" src="js/EditEnable.js"></script>
    </head>
    <?php
        include 'config/config.php';
        include 'libraries/database.php';
        include 'libraries/search.php';
        include 'libraries/update_taxi.php';
        $t='';
    ?>
    <body style="color: white">
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
        <div class="container" style="color:black;">
            <div class="row">
                <div class="col-md-12" style="padding-top: 3%">
                    <?php
                        if(filter_input(INPUT_COOKIE,'username'))
                        {
                            $logged_user = filter_input(INPUT_COOKIE,'username');
                            echo "<h3>Welcome back $logged_user</h3>" ;
                        }else{
                            header('Location: index.php');
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    
                    <form action="" method="post"><br><br>
                        <div style="font-size:8px">Search Driver ID No. / Vehicle Registration</div>
                      <input type="text" class="form-control"  placeholder="" name="name"><br>
                      <input type="submit" name="submit" class="btn" value="Search" required>
                    </form><br>
                    <ul style="text-align: center;">
                        <li class='line'>
                            <img src="images/driver.png" width="50" alt="add driver"/><br>
                            <a href="add_drivers.php">Add Driver</a>
                        </li>
                        <li class='line'><br>
                            <img src="images/taxi2.png" width="50" alt="add taxi"/><bR>
                            <a href="add_taxi.php">Add Vehicle</a>
                        </li>
                        <li class='line'><br>
                            <img src="images/assign.png" width="50" alt="assign driver"/><bR>
                            <a href="assign_driver.php">Assign Taxi/Driver</a>
                        </li>
                    </ul>
                    <br>
                    <br>
                    
                </div>
                <div class="col-md-9" style="padding:5%">
                    <?php
                        if(filter_input(INPUT_GET,'msg'))
                        {
                            $reg = filter_input(INPUT_GET,'msg');
                            $query = "select * from taxi join taxi_permit on taxi.permit_id=taxi_permit.permit_id join taxi_disc on taxi.disc_id=taxi_disc.disc_id where taxi_reg = '$reg'";
                            $db = new Database();
                            $r_result = $db->select($query);
                            while($r_row = $r_result->fetch_assoc())
                            {
                                $reg = $r_row['taxi_reg'];
                                $make = $r_row['make'];
                                $model = $r_row['model'];
                                $issue_date = $r_row['permit_issue_date'];
                                $exp_date = $r_row['permit_exp_date'];
                                $sitting = $r_row['persons_sitting'];
                                $standing = $r_row['persons_standing'];
                                $test_date = $r_row['test_date'];
                                $disc_exp_date = $r_row['exp_date'];
                                $tare = $r_row['tare'];
                            }
                            ?>
                   
                    <form action="" method="post"> 
                        <table class="table">
                            <tr>
                                <td style="font-weight: bold;">Vehicle Details</td>
                            </tr>
                            <tr>
                                <td>License No:</td>
                                <td><input type="text" id="reg" name="reg" class="form-control" value="<?php echo $reg; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Make:</td>
                                <td><input type="text" id="make" name="make" class="form-control" value="<?php echo $make; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Model:</td>
                                <td><input type="text" id="model" name="model" class="form-control" value="<?php echo $model; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Permit </td>
                            </tr>
                            <tr>
                                <td>Issued Date:</td>
                                <td><input type="date" id="issue_date" name="issue_date" class="form-control" value="<?php echo $issue_date ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Expiry Date:</td>
                                <td><input type="date" id="expiry_date" name="expiry_date" class="form-control" value="<?php echo $exp_date ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Persons Sitting:</td>
                                <td><input type="text" id="personssitting" name="persons_sitting" class="form-control" value="<?php echo $sitting ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Persons Standing:</td>
                                <td><input type="text" id="persons_standing" name="persons_standing" class="form-control" value="<?php echo $standing ?>" disabled></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Disc</td>
                            </tr>
                            <tr>
                                <td>Test Date:</td>
                                <td><input type="date" id="test_date" name="test_date" class="form-control" value="<?php echo $test_date ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Expiry Date:</td>
                                <td><input type="date" id="disc_expiry_date" name="disc_expiry_date" class="form-control" value="<?php echo $disc_exp_date?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Tare (Kg):</td>
                                <td><input type="text" id="tare" name="tare" class="form-control" value="<?php echo $tare ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="button" id="edit" name="edit" value="Edit" onclick="Edit()">
                                    <input type="submit" id="submit" name="submit" value="Submit" disabled/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                                <?php
                        }elseif(filter_input(INPUT_GET,'msg1')){
                            echo '<b>Driver Details</b>';
                            $id_no = filter_input(INPUT_GET,'msg1');
                            $query_driver = "select * from driver join driver_lic on driver.driver_lic_id = driver_lic.driver_lic_id where driver_id_no = '$id_no'";
                            $db = new Database();
                            $driver_details = $db->select($query_driver);
                            while($row = $driver_details->fetch_assoc())
                            {
                                $name = $row['driver_name'];
                                $surname = $row['driver_surname'];
                                $id_no = $row['driver_id_no'];
                                $contact = $row['contact'];
                                $fit = $row['fit'];
                                $code = $row['code'];
                                $first_issue = $row['first_issue_date'];
                                $exp_date = $row['driver_lic_exp_date'];
                                $pdp_exp = $row['pdp_exp_date'];
                                
                            } 
                            ?>
                    <form action="" method="post">
                        <table class="table">
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" id="name" name="name" class="form-control" value="<?php echo $name?>" disabled/></td>
                            </tr>
                            <tr>
                                <td>Surname:</td>
                                <td><input type="text" id="surname" name="surname" class="form-control" value="<?php echo $surname?>" disabled/></td>
                            </tr>
                            <tr>
                                <td>ID No:</td>
                                <td><input type="text" id="id_no" name="id" class="form-control" value="<?php echo $id_no?>" disabled/></td>
                            </tr>
                            <tr>
                                <td>Contact:</td>
                                <td><input type="text" id="contact" name="contact" class="form-control" value="<?php echo $contact?>" disabled/></td>
                            </tr>
                            <tr>
                                <td>Fit:</td>
                                <td><input type="text" id="fit" name="fit" class="form-control" value="<?php echo $fit?>" disabled/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>License Details</b></td>
                            </tr>
                            <tr>
                                <td>Code:</td>
                                <td><input type="text" id="code" name="code" class="form-control" value="<?php echo $code?>" disabled/></td>
                            </tr>
                            <tr>
                                <td>First Issue:</td>
                                <td><input type="date" id="first_issue" name="first_issue" class="form-control" value="<?php echo $first_issue?>" disabled/></td>
                            </tr>
                            <tr>
                                <td>Expiry Date:</td>
                                <td><input type="date" id="expiry_date" name="expiry_date" class="form-control" value="<?php echo $exp_date?>" disabled/></td>
                            </tr>
                            <tr>
                                <td>PDP Expiry Date:</td>
                                <td><input type="date" id="pdp" name="pdp_exp" class="form-control" value="<?php echo $pdp_exp?>" disabled/></td>
                            </tr>
                            <tr>
                                <td>
                                    
                                </td>
                                <td>
                                    <input type="button" id="edit1" name="edit1" value="Edit" onclick="Save()">
                                    <input type="submit" name="submit_driver" id="save" value="Submit" disabled name="submit">
                                </td>
                            </tr>
                        </table>    
                    </form>
                                
                                <?php
                                if(filter_input(INPUT_POST,'submit_driver'))
                             {
                                 echo $id_no;
                             }  
                        }elseif(!filter_input(INPUT_GET,'msg') && !filter_input(INPUT_GET,'msg')){
                            $query = "select * from taxi join taxi_permit on taxi.permit_id=taxi_permit.permit_id join taxi_disc on taxi.disc_id=taxi_disc.disc_id join driver on driver.driver_id=taxi.driver_id join driver_lic on driver.driver_lic_id = driver_lic.driver_lic_id";
                            $db = new Database();
                            $exp = $db->select($query);
                            
                            $d = 0;
                            $i = 0;
                            $s = 0;
                            while($r=$exp->fetch_assoc())
                            {
                                $today = date("Y/m/d");
                                $permi_exp = $r['permit_exp_date'];
                                $disc_exp = $r['exp_date'];
                                $lic_exp = $r['driver_lic_exp_date'];
                                
                              // $to_date = time(); // Input your date here e.g. strtotime("2014-01-02")
                                $to_date = strtotime($permi_exp);
                                $from_date = strtotime($today);
                                $day_diff = $to_date - $from_date;
                                $days_left = floor($day_diff/(60*60*24))."\n";
                           
                               // echo $days_left;
                                
                               
                                $disc_to_date = strtotime($disc_exp);
                                $disc_from_date = strtotime($today);
                                $disc_day_diff = $disc_to_date - $disc_from_date;
                                $disc_days_left = floor($disc_day_diff/(60*60*24)."\n");
                               // echo $disc_days_left."<br>";
                                
                                $lic_to_date = strtotime($lic_exp);
                                $lic_from_date = strtotime($today);
                                $lic_date_diff = $lic_to_date - $lic_from_date;
                                $lic_days_left = floor($lic_date_diff/(60*60*24)."\n");
                               // echo $lic_days_left."<br>";
                                
                                
                                if($days_left < 91 )
                                {    
                                    $d++;
                                }
                                if($disc_days_left < 91)
                                {
                                    $i++;
                                }
                                if($lic_days_left < 91)
                                {
                                   $s++;   
                                }
                            }
                                echo "<div style='color:red'>Items left with less than 3 months to expire</div>";
                                echo "<div style='color:green;' id='expiry'><i><a href='taxi_permits.php?page=1'>Taxi Permits (".$d.")</a></i><br>";
                                echo "<i><a href='license_disks.php?page=2'>License Disks (".$i.")</a></i><br>";
                                echo "<i><a href='drivers_license.php?page=3'>Drivers' License (".$s.")</a></i></div>";
                        }
                        
                    ?>
                    <?php
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
                                            $id = $row['driver_id'];
                                            $make = $row['make'];
                                            $reg = $row['taxi_reg'];
                                            $driver = $row['driver_name'];
                                            $id_no = $row['driver_id_no'];
                                            ?>
                                                <table class="table">
                                                    <tr>
                                                <?php
                                            echo'<td><a href="?msg='.$id.'">'.$id.'</a></td>';
                                            echo'<td><a href="vehicle_details.php?msg='.$reg.'">'.$reg.'</a></td>';
                                            echo'<td><a href="?msg='.$make.'">'.$make.'</a></td>';
                                            echo'<td><a href="?msg1='.$driver.'">'.$driver.'</a></td>';
                                            echo'<td><a href="driver_details.php?msg1='.$id_no.'">'.$id_no.'</a></td>';
                                        }
                                    }else{
                                        echo "<b>No records for <i>'".$search_box."'</i> found<b>!!";
                                    }
       
                            }

                        }
                    ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script>
    function Save()
    {
        document.getElementById('name').disabled = false;
        document.getElementById('surname').disabled = false;
        document.getElementById('id_no').disabled = false;
        document.getElementById('contact').disabled = false;
        document.getElementById('fit').disabled = false;
        document.getElementById('code').disabled = false;
        document.getElementById('first_issue').disabled = false;
        document.getElementById('expiry_date').disabled = false;
        document.getElementById('pdp').disabled = false;
        document.getElementById('save').disabled = false;
    }
    </script>
</html>

