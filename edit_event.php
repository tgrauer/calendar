<?php 

// Include the calendar class
include('includes/loader.php'); 

// Retrieve Current Page Data
$info = $calendar->retrieve($_GET['page']);

echo '<pre>';
print_r($info);
echo '</pre>';
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
    <link href="css/bootstrap.css" rel="stylesheet">
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
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img class="img-responsive logo" src="img/chase_logo_blue.png" alt=""></a>
                </div>

                <div class="navbar-right">
                    <a href="index.php" class="btn btn-default pull-right add_btn">View Events</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
	  		
      <div class="clearfix"></div>
        
      <div class="box">
        <div class="header"><h4>Edit Event</h4></div>
        <div class="content pad"> 
            
            <form id="edit_event">
            
                <label>Title:</label>
                <input type="text" class="validate[required] form-control" name="title_update" placeholder="Event Title" value="<?php echo $info['title']; ?>">
                <label>Description:</label>
                <textarea class="form-control" name="description_update" placeholder="Event Description"><?php echo $info['description']; ?></textarea>
                
    			<br /><br />
                <button type="submit" onclick="calendar.update(<?php echo $info['id']; ?>)" class="btn btn-primary">Save Changes</button>
                
            </form>
            
        </div> 
    </div>

    </div> <!-- /container -->

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
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
