<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Create Seat Plan</title>
        
        
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

		function saveSeat(class_id, id, y, x){

				 $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>index.php/main/saveStudentToSeat', 
				 data: 'class_id='+class_id+'&seat_id='+id+'&position_x='+x+'&position_y='+y, 
				 success: function(resp) { 
				 document.getElementById(id).style.fill="green"; 
				 }
				 });
		}
		

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
				<h2>Create Seat Plan<h2>
					<?php foreach($class as $row): ?>					
							<h2><?php echo $row->courseNo; echo " ";  echo $row->section; echo " ( "; echo $row->courseTitle; echo " )"; ?></h2>
					<?php endforeach ?>					
		</div>
			<div class="col-xs-offset-5">
				<h1>BOARD</h1>
			</div>
			<div >
			
				<svg width="1500" height="1100">
				
				<?php 
				$k = 0;
				for($i=1;$i<=22;$i++){ 
							for($j=1;$j<=22;$j++){
							$k++;
				?>	 
				<!--loads all the seats for a user to arrange-->
				 <circle id="<?php echo $k;?>" data-toggle="modal" data-target="#myModal" onclick="saveSeat(<?php echo $row->id?>, <?php echo $k;?>, <?php echo 50*$i; ?>, <?php echo 50*$j; ?>)" r="20" cx="<?php echo 50*$j; ?>" cy="<?php echo 50*$i;?>" style="fill: blue; stroke: black; stroke-width: 2"/>
				
				<?php 
					}
				} ?>
				</svg>
				
				
				
				
			</div>
			

			
			
			
			<div>
				<form action="<?php echo base_url()."index.php/main/finalizeSeatPlan/" . $row->id ?>">
				 <button type="submit" onclick="getConfiguration()" class="btn btn-primary" />Finalize Seat Plan</button>
				 </form>
			</div>
		
    </body>
</html>
