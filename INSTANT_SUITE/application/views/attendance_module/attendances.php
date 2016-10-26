<!DOCTYPE html>
<html lang="en">




  <body>


        <div>
              <!-- sidebar menu start-->
             
               <table class="table table-striped table-advance table-hover col-md-6">
                               
                <tbody>
                  <tr>
                    <th><h3>Present</h3></th>
                   
                                   
                  </tr>
                      <?php if($presentStudents!=false): ?>

                    
                      <?php foreach($presentStudents as $present): ?>
                      <tr>
                      <th><?php echo $present->student_no; ?></th>
                      <th><?php echo $present->lastName; ?></th>
                      <th><?php echo $present->firstName; ?></th>
                      <th><?php echo $present->middleName; ?></th>
                      </tr>
                      <?php endforeach?>
                      
     
                      
                      <?php endif ?>                 
                    </tbody>
                </table>
                

                
                <table class="table table-striped table-advance table-hover">
                               
                <tbody>
                  <tr>
                    
                    <th><h3>Absent</h3></th>
                                   
                  </tr>
                      <?php if($absentStudentDetails!=false ): ?>

                      <?php foreach($absentStudentDetails as $absent): ?>
                      <tr>
                      <th><?php echo $absent->student_no; ?></th>
                      <th><?php echo $absent->lastName; ?></th>
                      <th><?php echo $absent->firstName; ?></th>
                      <th><?php echo $absent->middleName; ?></th>
                      </tr>
                      <?php endforeach?>  
                      
                      <?php endif ?>                 
                    </tbody>
                </table>
                
               
          </div>



  </body>

    <!-- javascripts -->
     <!-- javascripts -->
 











</html>
