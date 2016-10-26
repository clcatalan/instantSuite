<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>INSTANT SUITE</title>

    <!-- Bootstrap CSS -->    



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>



  <body>
  <!-- container section start -->

          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <?php  foreach($subject as $row): ?>
                    <h3><?php echo $row->course_code, "-", $row->section, " (", $row->course_title, ")" ;?></h3>
                  <?php endforeach ?>


                   <?php if($student!=false):?>   
                   <?php  foreach($student as $row): ?>
                    <h3><?php echo $row->lastName, ", ", $row->firstName, " ", $row->middleName ," (", $row->student_no, ")" ;?></h3>
                  <?php endforeach ?>
                  <?php endif?> 
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-table"></i>Table</li>
                        <li><i class="fa fa-th-list"></i>Exam List</li>
                    </ol>
                </div>
            </div>
              <!-- page start-->
            <div id = "classActionsSection"> 
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            <div>
                                                       
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editStudentModal"> Edit Student</button>                             
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteStudentModal"> Delete Student</button>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addAbsenceModal"> Add Absence</button>    

                            </div>
                          </header>



                      </section>
                        <div id="classActionContent" class="panel">
                              <header class="panel-heading">Exam Scores</header>
                               <table >
                                             
                                <tbody>

 
                                    
                                </tbody>
                               </table>

                          </div>  
                          <div id="classActionContent" class="panel">
                            <header class="panel-heading">Absences</header>
                             <table  class="table table-striped table-advance table-hover center">
                                           
                              <tbody>

                                                
                                           
                                  <?php if($absences!=false):?>              
                                  <?php foreach($absences as $row1): ?>
                                   <tr>
                                    <th><?php echo $row1->date_of_absence; ?></th> 
                                    <th>
                                      <button type="button" class="btn btn-default" data-toggle="modal" onclick="loadEditAbsence('<?php echo $row1->date_of_absence; ?>')"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Absence</button>
                                      <button type="button" class="btn btn-default" data-toggle="modal" onclick="loadDeleteAbsence('<?php echo $row1->date_of_absence; ?>', '<?php echo $row->classCode; ?>', '<?php echo $row->student_no; ?>')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove Absence</button>

                                    <th>                                      
                                   </tr>        
                                   <?php endforeach?>
                                  <?php endif?> 
                                  
                              </tbody>
                             </table>

                        </div>


                  </div>
              </div>
            </div>

           
          </section>



     
  </body>

  <!--Modal for Edit Class-->
  <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Student Details</h4>
      </div>
      <div class="modal-body">

           <form action="<?php echo base_url()."index.php/home/editStudent/" . $row->classCode . "/" . $row->student_no ?>" class="form-horizontal" method="post" accept-charset="utf-8">
             <?php foreach($student as $row): ?>
             <h4>Student Number: <input type="text" class="form-control" name="stdNo" value="<?php echo $row->student_no; ?>"  /></h4>      
             <h4>Last Name: <input type="text" class="form-control" name="lastName" value="<?php echo $row->lastName; ?>" /></h4>
             <h4>First Name: <input type="text" class="form-control" name="firstName" value="<?php echo $row->firstName; ?>" /></h4>
             <h4>Middle Name: <input type="text" class="form-control" name="middleName" value="<?php echo $row->middleName; ?>"  /></h4>
              <?php endforeach?>
             <div class="col-md-offset-8">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" name="signup_submit" value="submit" class="btn btn-primary">Save Changes</button>
             </div>
           </form>

      </div>

    </div>
  </div>
</div>
<!--End modal for edit class-->

<!--Modal for Delete Class-->
  <div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
      </div>
      <div class="modal-body">
          
           <h2>Are you sure you want to permanently delete this Student? </h2>
           <a href="<?php echo base_url()."index.php/home/deleteStudent/" . $row->classCode . "/" . $row->student_no ?>" class="btn btn-block btn-info archived" role="button"> Delete</a>
                           
      </div>

    </div>
  </div>
</div>
<!--End modal for Delete Class-->

  <!--Modal for Add Absence-->
  <div class="modal fade" id="addAbsenceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Absence</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()."index.php/home/addAbsence/" ?>" class="form-horizontal" method="post" accept-charset="utf-8">
               <h4>Student Number: <input type="text" class="form-control" name="stdNo" value="<?php echo $row->student_no; ?>" readonly  /></h4>  
               <h4>Class Code: <input type="text" class="form-control" name="classCode" value="<?php echo $row->classCode?>" readonly  /></h4> 
               <h4>Absence Date: <input type="text" class="form-control" name="absenceDate" value=""  /></h4>      
               
             <div >
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" name="signup_submit" value="submit" class="btn btn-primary">Save Changes</button>
             </div>
        </form>      

      </div>

    </div>
  </div>
</div>
<!--End modal for add absence-->

  <!--Modal for Edit Absence-->
  <div class="modal fade" id="editAbsenceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Absence Details</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()."index.php/home/editAbsence/" . $row->classCode . "/" . $row->student_no ?>" class="form-horizontal" method="post" accept-charset="utf-8">
          <h4>Current Absence Date: <input id="cDate" type="text" class="form-control" name="currentAbsence" value="" readonly  /></h4>  
          <h4>New Absence Date: <input id="nDate" type="text" class="form-control" placeholder="Follow the Above Format (January 1 2016)" name="newAbsence" value=""  /></h4>      
            
              
             <div >
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" name="signup_submit" value="submit" class="btn btn-primary">Save Changes</button>
             </div>
        </form>      

      </div>

    </div>
  </div>
</div>
<!--End modal for edit absence-->

<!--Modal for Delete absence-->
  <div class=" col-md-offset-12 modal fade" id="deleteAbsenceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
      </div>
      <div class="modal-body">
         <form action="<?php echo base_url()."index.php/home/deleteAbsence/"?>" class="form-horizontal" method="post" accept-charset="utf-8">
               <h4>Are you sure you want to delete this absence with the following details?</h4>
               <h4>Student Number: <input id="d_stdNo" type="text" class="form-control" name="stdNo" value="" readonly  /></h4>  
               <h4>Absence Date: <input id="d_aDate" type="text" class="form-control" name="absenceDate" value="" readonly  /></h4>      
               <h4>Class Code: <input id="d_classCode" type="text" class="form-control" name="classCode" value="" readonly  /></h4>      
                 
                
               <div >
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" name="signup_submit" value="submit" class="btn btn-primary">Delete</button>
               </div>
          </form>                    
      </div>

    </div>
  </div>
</div>
<!--End modal for Delete absence-->

<script>

    var currentAbsenceDate;
    function viewStudentDetails(stdNo, classCode){
        
        
        $("#main-content").load("loadViewStudentDetails", {student_no:stdNo, class_code:classCode}).hide(500).fadeIn();
    }

    function loadEditAbsence(absenceDate){

      //get input from javascript alert
       //var $this = $(this).data('editAbsenceModal');
      
      document.getElementById("cDate").value = absenceDate;
       $('#editAbsenceModal').modal('show');
     // alert(absenceDate);
    }

    function loadDeleteAbsence(absenceDate, classCode, stdNo){
       //var $this = $(this).data('editAbsenceModal');
      // document.getElementById("aDate").value = absenceDate;
      // $('#editAbsenceModal').modal('show');
     /* alert(absenceDate);
      alert(classCode);
      alert(stdNo);*/

      document.getElementById("d_stdNo").value = stdNo;
      document.getElementById("d_aDate").value = absenceDate;
      document.getElementById("d_classCode").value = classCode;

       $('#deleteAbsenceModal').modal('show');

     // $("#main-content").load("deleteAbsence", {student_no:stdNo, class_code:classCode, aDate:absenceDate}).hide(500).fadeIn();
    }
</script>


</html>
