<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Create Seat Plan</title>
        
        

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		

    </head>
<body>
  <!-- container section start -->
      <nav class="blue lighten-1">
        <div>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
             <li><a href="<?php echo base_url()."index.php/ams_controller/home/"?>"> Return</a></li>
          </ul>
          <ul id="mobile-demo" class="side-nav">
            <li><a href="<?php echo base_url()."index.php/ams_controller/home/"?>"> Return</a></li>
          </ul>
        </div>
      </nav>

      <br><br>

          <section class="wrapper">

              <!-- page start-->

 		  <?php  foreach($student as $row): ?>
          	<h3><?php echo $row->lastName, ", ", $row->firstName, " ", $row->middleName ;?></h3>
          <?php endforeach ?>

          <table class="centered">
                                           
            <tbody>
                <thead>
                    <tr>
                    	<td><h4>Absences<h4></td>
                    </tr>                         
                </thead>
                              
                         
                <?php if($absences!=false):?>              
                <?php foreach($absences as $row1): ?>
                 <tr>
                	<td><h5><?php echo $row1->date_of_absence; ?><h5></td>                                      
                 </tr>        
                 <?php endforeach?>
                <?php endif?> 
                
            </tbody>
           </table>



           
          </section>



     
  </body>

   <script>

      $(document).ready(function(){

        $(".button-collapse").sideNav();
      });
   </script>   
</html>
