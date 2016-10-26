<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Edit Profile</title>
        
        
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
    </head>
    <body>
	
	
		<h1>Edit Profile </h1>
		<div class="col-xs-offset-3">
			<?php
				
				$email = $this->session->userdata('email');
				
				
			?>
			<!--form to edit profile-->
		   <form action="<?php echo base_url()."index.php/main/changeProfileFields/"?>" class="form-horizontal col-xs-8 " method="post" accept-charset="utf-8">
			   <?php echo validation_errors(); ?>
			   <div class="col-xs-12">
			   <h4>Name:
			   <input type="text" class="form-control" placeholder="Last Name" name="lastName" value=""  />
			   <input type="text" class="form-control" placeholder="First Name" name="firstName" value=""  />
			   </h4>
			   
			   <h4>Institute/Department: <input type="text" class="form-control" name="dept" value="" placeholder="Institute/Department"  /></h4>
			   <h4>College: <input type="text" class="form-control" name="college" value="" placeholder="College" /></h4>
			   <h4>Password: <input type="password" class="form-control" name="password" placeholder="Password" value=""  /></h4>
			   <button type="submit" name="signup_submit" value="Sign up" class="btn btn-default" />Save Changes</button>
			   </div>
		   </form>
		<div>   
		
    </body>
</html>
