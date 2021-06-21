<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome Taxi Association</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type='text/css' rel='stylesheet' href='css/styles.css'/>  
        <script type="text/javascript" src="js/EditEnable.js"></script>
    </head>
    <?php
        include 'config/config.php';
        include 'libraries/database.php';
        $message = "";
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
                        <a class="nav-link" href="index.php#home">HOME?</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container" style="color:black;">
            <div class="row" style="padding: 10%">
                <div class="col-md-3"></div>
                <div class="col-md-6 login">
                    <h1>Login</h1>
                    <?php
                            $username = filter_input(INPUT_POST,'username');
                            $password = filter_input(INPUT_POST,'password');
                            if(filter_input(INPUT_POST,'submit'))
                            {
                                if(!empty($username))
                                {
                                  $query = "select * from users where username = '$username'";
                                  $db = new Database();
                                  $results=$db->select($query);
                                  if(!$results)
                                  {
                                      $message = "Username Incorrect";
                                  }else{
                                      while($row = $results->fetch_assoc())
                                      {
                                          $user = $row['username'];
                                          $pass = $row['password'];
                                          if($username == $user && $password == $pass)
                                          {
                                              setcookie('username', $username);
                                              header('Location: dashboard.php');
                                          }else{
                                              $message = "Password Incorrect";
                                          }
                                      }
                                  }
                                }
                            }
                        ?>
                    <form action="" method="post">
                        <input type="text" name="username" class="form-control" placeholder="Username" required/><br>
                        <input type="password" name="password" class="form-control" placeholder="Password" required/><br>
                        <input type="submit" name="submit" value="Submit" class="btn-primary"/>
                        <div style="color:red"><br><?php echo $message;?></div>
                        
                    </form>
                </div>
            </div> 
        </div>
    </body>
</html>

