<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Driver</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type='text/css' rel='stylesheet' href='css/styles.css'/>
    </head>
    <?php
       include 'config/config.php';
       include 'libraries/database.php';
       include 'libraries/add_driver.php';
    ?>
    <body style="">
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
                <div class="col-md-3"></div>
                <div class="col-md-6" style="text-align: center;padding-top: 2%;">
                    <h2>Add Driver</h2>
                    <form action="" method="post">
                        Name:<bR><input type="text" name="name" class="form-control" required>
                        Surname:<br><input type="text" name="surname" class="form-control" required>
                        ID No:<br><input type="text" name="id" class="form-control" required>
                        Contact:<br><input type="tel" name="contact" class="form-control" required>
                        License Code:<br><input type="text" name="code" class="form-control" required>
                        License issue Date:<br><input type="date" name="issue_date" class="form-control" required>
                        License expiry Date:<br><input type="date" name="expiry_date" class="form-control" required>
                        Does driver have PDP?<br>
                        <input type="radio" name="pdp" value="Yes" onchange="pdp_enable()"> Yes<br>
                        <input type="radio" id="pdp" name="pdp" value="No" onchange="pdp_disable()"> No<br>
                        PDP Expiry Date:<br>
                        <input type="date" name="pdp_expiry" id="pdp_expiry" class="form-control" disabled><br>
                        <input type="submit" name="submit" class="btn btn-md" value="Register Driver"/><br><br>
                        <script>
                            function pdp_disable(){
                                document.getElementById('pdp_expiry').disabled = true;
                            }
                            function pdp_enable(){
                                document.getElementById('pdp_expiry').disabled = false;
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
