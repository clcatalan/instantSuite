<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


    </head>
	<style>

	body {
		background-color: black;
	}
	


	</style>
	
    <body bgcolor="black">
		<div class="col-md-offset-2">
       <img src="<?php echo base_url()."assets/instant.png"?>" class="img-responsive" alt="Instant Suite" width="880" height="500" align="middle">
	   </div>
	   
	   <div>
		   <div class="col-md-12">		   
			<br><br>
			
			  <form action="<?php echo base_url()."index.php/ams_controller/login/"?>" class="form-horizontal" method="post" accept-charset="utf-8">
				  <?php echo validation_errors(); ?>

				  <input type="password" class="form-control" name="classCode" value="" placeholder="Class Code Generated From the Web Application" />
				  <br>
				  <button type="submit" class="btn btn-info btn-lg btn-block" name="login_submit" value="Login"/>Log In</button>
			  </form>
			
	
		   </div>
		   
	   </div>
	   

	   
    </body>

   

</html>
