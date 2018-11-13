<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
        die();
    }
    
    include('includes/loader.php'); 
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
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img class="img-responsive logo" src="img/chase_logo_blue.png" alt=""></a>
                </div>

                <div class="navbar-right">
                    <a href="calendar.php" class="btn btn-default pull-right add_btn">View Events</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
              
        <div class="clearfix"></div>
        
        <div class="box">
            <div class="header"><h4>Add Event</h4></div>
            <div class="content pad"> 
                
                <form id="add_event">
                
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" class="validate[required] form-control" name="title" placeholder="Event Title" id="title">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Event Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Date:</label>
                                <div class="input-group">
                                    <input type="text" name="start_date" class="validate[required] form-control input-sm datepicker"  autocomplete="off">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Time:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control input-s timepicker" name="start_time" placeholder="HH:MM:SS" id="tp1">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-time"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>End Date:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm datepicker" name="end_date"  autocomplete="off">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>End Time:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" name="end_time" placeholder="HH:MM:SS" id="tp2">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-time"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Event Type:</label>
                                <!-- <input type="text" class="form-control input-sm" name="color" id="cp" autocomplete="off"> -->

                                <select name="color"  class="form-control" validate[required]>
                                    <option value="">Choose One</option>
                                    <option value="#00c2ff">Work</option>
                                    <option value="#f03c3c">Time Off</option>
                                    <option value="#E15B23">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Display Time:</label>
                                <select name="allDay" class="form-control">
                                    <option value="true" selected>Yes</option>
                                    <option value="false">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" name="url" id="url" >
        
                    <button type="submit" onclick="calendar.save()" class="btn btn-primary pull-right">Add Event</button>                
                </form>
            </div> 
        </div>

    </div> <!-- /container -->

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
    
    <script type="text/javascript">
        $().FullCalendarExt({ 
            version: 'php',
            calendarSelector: '#calendar',
            defaultColor:'#00c2ff'
        });
    </script>

  </body>
</html>
