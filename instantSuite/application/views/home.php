<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Home-Instant Suite</title>
        
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.css")?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css")?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css")?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>" />
		
		
		<!--<script type="text/javascript" src="<?php echo base_url(" assets/js/bootstrap.js")?>"></script>
		-->
		<script type="text/javascript" src="<?php echo base_url(" assets/js/bootstrap.min.js")?>"></script>
		<!--
		<script type="text/javascript" src="<?php echo base_url(" assets/js/vendor/jquery-1.10.1.min.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url(" assets/js/vendor/modernizr-2.6.2.min.js")?>"></script>-->
        
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		-->
		
		

	<style>

	body {
		background-image: url("<?php echo base_url()."assets/css/bg.png"?>");
		
	}
	
	#navbar	{
		background-color: black;
	}

	#name {
		color: white;
	}

	#functions{
		opacity: 0.7;
	}

	#functions_list{
		opacity: 0.7;
	}



	</style>
	
		
    </head>
    <body>

    	<div class="col-md-12" id="navbar">

	    	<div class="col-md-4" id="teacherDetails">
		    	<h1 id="name"><?php  //displays user's credentials
						
						echo $this->session->userdata('firstName');
						echo " ";
						echo $this->session->userdata('lastName');
						?>
				</h1>
			</div>

	    	<div class="col-md-4">
				<img src="<?php echo base_url()."assets/css/instant.png"?>" class="img-responsive" alt="Cinque Terre" width="400" height="200" align="middle">
				
			</div>

			<div class="col-md-4">
				<br>
				<a href="<?php echo base_url()."index.php/ams_controller/logout" ?>" class="btn btn-warning btn-lg btn-block" >Log Out</a>
				<button type="button" class="btn btn-success btn-lg btn-block">Edit Profile</button>

			</div>

		</div>	

       
		<div class="col-md-3">
			<br>
			
				
				<button type="button" class="btn btn-default btn-lg btn-block classloader" >Create Class</button>
				
				
			<div class="jumbotron" id="functions_list">

				<button type="button" class="btn btn-success btn-block classAction" >Class Action</button>
				<?php //if($classes==true):?> <!--If classes received from database is empty-->
					
						<?php // foreach($classes as $row): ?><!--Options for each class a user has-->						
							<!--<button type="button" class="btn btn-success btn-block classAction"><?php echo $row->course_code ,"-", $row->section ; ?> </button>
							<br>-->
						<?php //endforeach ?>
					
				
				
				<?php //endif ?>
				
			</div>
		</div>

		<div class="col-md-offset-1 col-md-8">
			<br>
			<div class="jumbotron col-md-12" id="functions">


			</div>
		</div>

		
		
		
    </body>

	<script language="javascript">

	$(document).ready(function(){
	    $(".classloader").click(function(){
		  	alert("clicked");
		    $("#functions").load("createClass");
		   //$("#functions").load("<?php echo base_url("createClass");?>");

		  });

	     $(".classAction").click(function(){
		  	//alert("clicked");
		    $("#functions").load("classActions");
		   //$("#functions").load("<?php echo base_url("views/createClass.php");?>");
			
		  });
	});





	function createdClass(){
			
				
				var courseNo = document.getElementById('courseNo').value;
				var courseTitle = document.getElementById('courseTitle').value;
				var course_section = document.getElementById('section').value;
				//alert(courseNo);
			$.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>index.php/ams_controller/createClassDetails', 
				 data: 'course_code='+courseNo+'&course_title='+courseTitle+'&section='+course_section, 
				 success: function(resp) { 
					
				 }
			});
			
		}




	</script>


</html>
