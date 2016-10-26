<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Archive Class</title>
        
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.css")?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css")?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css")?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>" />
		
		<script type="text/javascript" src="<?php echo base_url(" assets/js/main.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url(" assets/js/vendor/bootstrap.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url(" assets/js/vendor/bootstrap.min.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url(" assets/js/vendor/jquery-1.10.1.min.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url(" assets/js/vendor/modernizr-2.6.2.min.js")?>"></script>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		
		<script>
		</script>
    </head>
    <body>
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url()."index.php/main/home" ?>">Instant Suite</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Class
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url()."index.php/main/createClass" ?>">Create a Class</a></li>
                      <li><a href="<?php echo base_url()."index.php/main/archiveClasses" ?>">Archive a Class</a></li>
                      <li><a href="<?php echo base_url()."index.php/main/displayClasses" ?>">Delete a Class</a></li> 
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Attendance
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">View Attendance Record</a></li>
                      <li><a href="#">Download Attendance Record</a></li>
                      <li><a href="#">Delete a Class</a></li> 
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seat Plan
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Create Seat Plan</a></li>
                      <li><a href="#">Edit Seating Arrangement</a></li> 
                    </ul>
                </li>
                
                 
            </ul> 
             <ul class="nav navbar-nav navbar-right">  
                <li><a href="<?php echo base_url()."index.php/main/editProfile" ?>">Edit Profile</a></li> 
                <li><a href="<?php echo base_url()."index.php/main/logout" ?>"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
              </ul>
        </nav>
	
		<div class="container">
			<div class="jumbotron">									
				<?php foreach($class as $row): ?>					
					<h2><?php echo $row->courseNo; echo " "; echo $row->section; echo " ( "; echo $row->courseTitle; echo " )"; ?></h2>
					<h3>Class Code: <?php echo $row->classCode; ?></h3>
				<?php endforeach ?>								
			</div>
			
			<div>

			
			<table class="table table-hover">
				<thead>
				  <tr>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Student Number</th>
				  </tr>
				</thead>
				<tbody>
					<?php foreach($students as $row): ?> <!--displays list of students-->
						<tr class="clickable-row" data-href='<?php echo base_url()."index.php/main/viewAbsences/" . $row->stdNo?>'>
							<th><?php echo $row->lastName; ?></th>
							<th><?php echo $row->firstName; ?></th>
							<th><?php echo $row->middleName; ?></th>
							<th><?php echo $row->stdNo; ?></th>
							<!--button to display a student's absences-->
							<th><a href="<?php echo base_url()."index.php/main/viewAbsences/" . $row->stdNo ?>" class="btn btn-default" role="button"  ><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></th>
						</tr>
					<?php endforeach ?>
				</tbody>
				</table>
	
			</div>
			
			
		
		</div>
		
    </body>
</html>
