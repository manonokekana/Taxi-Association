<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Local Water Municipality</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type='text/css' rel='stylesheet' href='css/styles.css'/>
    </head>
    <?php
       include 'config/config.php';
       include 'libraries/database.php';
       include 'libraries/add_taxi.php';
    ?>
    <body style="color:white">
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
        <div class="container" style="color:black;">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="text-align: center;padding-top: 2%;">
                    <h2>Add Taxi</h2>
                    <form action="" method="post">
                        Registration Number:<bR><input type="text" name="registration" class="form-control" required>
                        Make:<bR><input type="text" name="make" class="form-control" required>
                        Model:<bR><input type="text" name="model" class="form-control" required>
                        Test Date:<bR><input type="date" name="test_date" class="form-control" required>
                        Disc Exp Date:<bR><input type="date" name="disc_exp_date" class="form-control" required>
                        Tare:<bR><input type="text" name="tare" class="form-control" required>
                        Persons Standing:<bR><input type="text" name="persons_standing" class="form-control" required>
                        Persons Sitting:<bR><input type="text" name="persons_sitting" class="form-control" required>
                        Permit Issue Date:<bR><input type="date" name="permit_issue_date" class="form-control" required>
                        Permit Exp Date:<bR><input type="date" name="permit_exp_date" class="form-control" required><br>
                        <input type="submit" name="submit" value="Register Taxi" class="btn btn-md"/><br><br>&COPY;
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
