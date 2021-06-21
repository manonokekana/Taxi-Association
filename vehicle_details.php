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
                            echo "<a href='dashboard.php'><- Back</a>" ;
                        }else{
                            header('Location: index.php');
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-9" style="padding:5%;padding-top: 0%;">
                    <?php
                        if(filter_input(INPUT_GET,'msg'))
                        {
                            echo '<b>Vehicle Details</b>';
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
                                <td><input type="date" id="issue_date" name="issue_date" class="form-control" value="<?php echo $issue_date; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Expiry Date:</td>
                                <td><input type="date" id="expiry_date" name="expiry_date" class="form-control" value="<?php echo $exp_date; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Persons Sitting:</td>
                                <td><input type="text" id="personssitting" name="persons_sitting" class="form-control" value="<?php echo $sitting; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Persons Standing:</td>
                                <td><input type="text" id="persons_standing" name="persons_standing" class="form-control" value="<?php echo $standing; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Disc</td>
                            </tr>
                            <tr>
                                <td>Test Date:</td>
                                <td><input type="date" id="test_date" name="test_date" class="form-control" value="<?php echo $test_date ;?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Expiry Date:</td>
                                <td><input type="date" id="disc_expiry_date" name="disc_expiry_date" class="form-control" value="<?php echo $disc_exp_date;?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Tare (Kg):</td>
                                <td><input type="text" id="tare" name="tare" class="form-control" value="<?php echo $tare ;?>" disabled></td>
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
                        <?php } ?>
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

