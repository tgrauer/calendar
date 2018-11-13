<?php 

    ob_start(); 
  
    include ('includes/loader.php');

    $errors = [];

    if(isset($_POST['login'])){

        if(!empty($_POST['username'])){
            $username = strtolower($_POST['username']);
        }else{
            $error ="Please enter a username";
            array_push($errors, $error);
        }

        if(!empty($_POST['password'])){
            $password = strtolower($_POST['password']);
        }else{
            $error ="Please enter a password";
            array_push($errors, $error);
        }

        if(empty($errors)){
            $login = $calendar->login($username, $password);
            $check_login = mysqli_num_rows($login);

            if($check_login){
                session_start();
                $row = mysqli_fetch_array($login);

                $_SESSION['user']= $row['username'];
                $_SESSION['type']= $row['type'];
                header("Location: calendar.php");
            }else{
                $error = "Invalid Login";
                array_push($errors, $error);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Chase Tech Support Calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/colorpicker/css/colorpicker.css" rel="stylesheet">
    <link href="lib/validation/css/validation.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
    
    <header>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container navcontainer">
                <div class="navbar-header home">
                    <a class="navbar-brand" href="#"><img class="img-responsive logo" src="img/chase_logo_blue.png" alt=""></a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">      
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-holder">
                    <h4>Login</h4>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form">
                        
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="username" value="<?php if(isset($username)){echo $username;}?>">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary btn-lg" value="Login" name="login">
                        
                        <?php 
                            if(!empty($errors)){
                                echo '<div class="alert alert-danger">';
                                foreach ($errors as $e) {
                                    echo '<p>'.$e.'</p>';
                                }
                                echo '</div>';
                            }
                        ?>
                        
                    </form>
                </div>
            </div>
        </div>
      
    </div>
    

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.calendar.js"></script>
    <script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="lib/timepicker/bootstrap-timepicker.js"></script>
    <script src="lib/validation/jquery.validationEngine.js"></script>
    <script src="lib/validation/jquery.validationEngine-en.js"></script>
    <script src="js/custom.js"></script>
    
  </body>
</html>
