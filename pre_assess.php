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
                <div class="col-md-12" style="color:red;text-align: center;"><br><bR>
                    <?php
                        if(filter_input(INPUT_GET,'fit'))
                        {
                            $driver = filter_input(INPUT_GET,'fit');
                            echo "This Driver '$driver' has not passed or taken the Assement yet";
                            
                        }
                        if(filter_input(INPUT_POST,'submit'))
                        {
                            if(filter_input(INPUT_POST,'test'))
                            {
                                $answer = filter_input(INPUT_POST,'test');
                                if($answer == "yes")
                                {
                                    header("location: assesment.php?fit=$driver");
                                }else{
                                    header('location: assign_driver.php');
                                }
                            }else{
                                ?><script>alert('Please select an option');</script>
                                    <?php
                            }
                            
                        }
                        ?>
                    <div style="color:black;">
                        <br>Take Test Now?<br><br>
                        <form method="post" action="">
                            <input type="radio" value="yes" name="test" id="yes">Yes<br>
                            <input type="radio" name="test" value="no" id="no">No<br><br>
                            <input type="submit" name="submit" value="Submit"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
