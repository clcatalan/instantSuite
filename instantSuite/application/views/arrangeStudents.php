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
		 function svgMod(id){ 
      var circle1 = document.getElementById(id); 
      circle1.style.fill="green";
    } 
	
		function disappear(id){
			var circle1 = document.getElementById(id); 
		circle1.style.visibility="hidden";
		}
		
		function getConfiguration(id){
			
				var circle = document.getElementById(id);
				circle.style.fill = "green";
				var $id = circle.id;
				var cx = circle.getAttribute("cx");
				var cy = circle.getAttribute("cy");
			/*	$.ajax({
					type: "POST",
					url: <?= site_url('OrderController/receiveJavascriptVar'); ?>
					data: {"myOrderString": myOrderString},  // fix: need to append your data to the call
					success: function (data) {
					}
				});*/
				//$('#anchortag').prop('href', "localhost/index.php/main/saveSeatPlan/"+$id);
				//alert(cx);
				window.location.href = "index.php/main/saveSeatPlan/?id=" + id + "&radius=" + radius + "&cx=" + cx + "&cy=" + cy;

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
				<h2>Final Seat Plan for<h2> <!--Class details-->
					<?php foreach($class as $row): ?>					
							<h2><?php echo $row->courseNo; echo " ";  echo $row->section; echo " ( "; echo $row->courseTitle; echo " )"; ?></h2>
					<?php endforeach ?>					
		</div>
			<div>
				<!--Choices to arrange students-->
				<a href="<?php echo base_url()."index.php/main/addStudentsAlphabetically/" . $row->id ?>" class="btn btn-info" role="button">Arrange Students Alphabetically</a>
				<a href="<?php echo base_url()."index.php/main/addStudentsAlphabetically/" . $row->id ?>" class="btn btn-info" role="button">Arrange Students Randomly</a>
			</div>
		
			<div class="col-xs-offset-5">
				<h1>BOARD</h1>
			</div>
			
			
			<div>
			
				<svg width="1500" height="1100">
				
				<?php 
							foreach($occupiedSeats as $seat):						
				?>	  
							<!--current seat plan (no students yet)-->
							<circle id="<?php echo $seat->circle_id;?>"  r="20" cx="<?php echo $seat->position_x ?>" cy="<?php echo $seat->position_y;?>" style="fill: green; stroke: black; stroke-width: 2"/>
				<?php 	
							endforeach;
				 ?>
				</svg>
			</div>
			

			
			
			
			<div>
				 <button type="submit" onclick="getConfiguration()" class="btn btn-primary" />Save Changes</button>
			</div>
		
    </body>
</html>
