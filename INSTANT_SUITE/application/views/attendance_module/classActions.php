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
  <div class="alert alert-success archivedAlert" role="alert">Class Archived</div>

          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <!--<h3 class="page-header"><i class="fa fa-table"></i><?php echo $subject; ?></h3>-->
                    <?php  foreach($class as $row): 
                      $classCode = $row->classCode;
                    ?>
                        <h3 class="page-header"><i class="fa fa-table"></i><?php echo $row->course_code, "-", $row->section, "( ", $row->course_title, " )" ;?></h3>
                        Class Code (Use this to log in to the Mobile Application): <?php echo $row->classCode;?>         
                    <?php endforeach ?> 
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
                              <?php if($archived==1): ?>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#restoreClassModal"> Restore Class</button>     
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteClassModal"> Delete Class</button> 
                              <?php elseif($archived==0): ?>
                              <button class="btn btn-default" type="submit" data-toggle="modal" data-target="#addStudentsModal">Add Students</button>
                               <button class="btn btn-default" type="submit" data-toggle="modal" data-target="#deleteStudentsModal"  <?php if($students==false){ echo 'disabled'; } ?>  >Delete All Students</button>
                              <a href="<?php echo base_url()."index.php/home/loadCreateSeatPlan/" . $row->classCode ?>" class="btn btn-default" role="button"  > Create Seat Plan</a>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#arrangeStudentsModal" <?php if($students==false){ echo 'disabled'; } ?> > Arrange Students</button>                            
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editClassModal"> Edit Class</button>                             
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#archiveClassModal"> Archive Class</button>     
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteClassModal"> Delete Class</button> 
                              <?php endif ?> 
                            </div>
                          </header>
                          <header class="panel-heading"> View Attendances by Date
                            <div>
                             <?php if($dates!=false){ foreach($dates as $row): ?>
                              <button type="button" class="btn btn-default" data-toggle="modal" onclick="loadAttendanceModal('<?php echo $row->date_of_absence; ?>', '<?php echo $classCode; ?>')"><?php echo $row->date_of_absence; ?></button>     
                              <?php endforeach; } ?> 
                            </div>
                          </header>
                          <header class="panel-heading"> Dates Where All Were Present
                            <div>
                             <?php if($dates!=false){ foreach($allPresent as $row): ?>
                              <h5><?php echo $row->allPresentDate; ?></h5>
                              <?php endforeach; } ?> 
                            </div>
                          </header>
                      </section>  
                          <div id="classActionContent" class="panel">
                            <header class="panel-heading">Student List</header>
                            <table class="table table-striped table-advance table-hover">
                               
                             <tbody>
                                <tr>
                                   <th> Student Number</th>
                                   <th>Last Name</th>
                                   <th>First Name </th>
                                   <th>Middle Name </th>
                                   <th>See More </th>
                                   
                                </tr>
                                <?php if($students!=false): ?>
                               <?php foreach($students as $row): ?>
                                <tr>
                                   <th><?php echo $row->student_no; ?></th>
                                   <th><?php echo $row->lastName; ?></th>
                                   <th><?php echo $row->firstName; ?></th>
                                   <th><?php echo $row->middleName; ?></th>
                                   <th> <a onclick="viewStudentDetails('<?php echo $row->student_no?>', '<?php echo $classCode?>')" class="btn btn-info" role="button"  > View</a></th>
                                   
                                </tr>        
                              <?php endforeach?>
                              <?php endif ?>                 
                             </tbody>
                          </table>

                        </div>

                        <div class="container">
                          <button class="btn btn-default" cx="300">O</button>
                           <button class="btn btn-default" cx="300">O</button>
                          <header class="panel-heading">Seat Plan</header>
                          <h1 class="col-md-offset-5">BLACKBOARD</h1>
                          <svg width="1500" height="1500">

                          
                          <?php 
                                $i = 1;    
                                foreach($seatplan as $seat): 

                          ?>    
                                <!--Displays seat plan of students-->
                                <circle id="<?php echo $i;?>" r="20" cx="<?php echo $seat->location_x ?>" cy="<?php echo $seat->location_y + 30;?>" style="fill: green; stroke: black; stroke-width: 2"/>
                                <!--Hover over a circle and it shows which student is seated-->
                                <text id="<?php echo $seat->stud_no; ?>" x="<?php echo $seat->location_x - 30; ?>" y="<?php echo $seat->location_y - 5; ?>" font-size="20" fill="black" visibility="hidden">
                                  <?php echo $seat->stud_no; ?>
                                <set attributeName="visibility" from="hidden" to="visible" begin="<?php echo $i; ?>.mouseover" end="<?php echo $i; ?>.mouseout"/>
                                </text>
                          <?php
                                $i++;   
                                endforeach;
                           ?>
                          
                          </svg>
                        </div>

                  </div>
              </div>
            </div>

           
          </section>



     
  </body>
  <!--Modal for Edit Class-->
  <div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Class Details</h4>
      </div>
      <div class="modal-body">

           <form action="<?php echo base_url()."index.php/home/editClass/" . $row->classCode ?>" class="form-horizontal" method="post" accept-charset="utf-8">
             <?php foreach($class as $row): ?>
             <h4>Course Number: <input type="text" class="form-control" placeholder="Course Number" name="courseNo" value="<?php echo $row->course_code; ?>"  /></h4>      
             <h4>Course Title: <input type="text" class="form-control" name="courseTitle" value="<?php echo $row->course_title; ?>" placeholder="courseTitle"  /></h4>
             <h4>Section: <input type="text" class="form-control" name="section" value="<?php echo $row->section; ?>" placeholder="section" /></h4>
             
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

  <!--Modal for Add Students-->
  <div class="modal fade" id="addStudentsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Students</h4>
      </div>
      <div class="modal-body">
            <h3>Add Students Individually</h3>
           <form action="<?php echo base_url()."index.php/home/addStudent/" . $row->classCode ?>" class="form-horizontal" method="post" accept-charset="utf-8">

             <h4>Student Number: <input type="text" class="form-control" placeholder="Student Number" name="stdNo" /></h4>      
             <h4>Last Name: <input type="text" class="form-control" placeholder="Last Name" name="lastName"/></h4>
             <h4>First Name: <input type="text" class="form-control" placeholder="First Name" name="firstName"/></h4>
             <h4>Middle Name: <input type="text" class="form-control" placeholder="Middle Name" name="middleName"/></h4>
             
             <button type="submit" name="signup_submit" value="submit" class="btn btn-block btn-primary">Save Student</button>

           </form>

           <h3>Upload CSV</h3>
          <form action="<?php echo base_url()."index.php/home/uploadCSV/" . $row->classCode ?>" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
          <input type="file" class="form-control" name="userfile" id="userfile"  align="center"/>
          <button type="submit" name="submit" class="btn btn-block btn-info">Save Students</button>

          </form>

      </div>

    </div>
  </div>
</div>
<!--End modal for add students-->

<!--Modal for Arrange Students-->
  <div class="modal fade" id="arrangeStudentsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Arrangements: </h4>
      </div>
      <div class="modal-body">
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'leftToRight' ?>" class="btn btn-block btn-info" role="button"  > L-R Alphabetical</a>
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'RightToLeft' ?>" class="btn btn-block btn-info" role="button"  > R-L Alphabetical</a>
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'TopDown' ?>" class="btn btn-block btn-info" role="button"  > T-D Alphabetical</a>
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'DownTop' ?>" class="btn btn-block btn-info" role="button"  > D-T Alphabetical</a>
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'RAleftToRight' ?>" class="btn btn-block btn-info" role="button"  > L-R Reverse Alphabetical</a>
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'RARightToLeft' ?>" class="btn btn-block btn-info" role="button"  > R-L Reverse Alphabetical</a>
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'RATopDown' ?>" class="btn btn-block btn-info" role="button"  > T-D Reverse Alphabetical</a>
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'RADownTop' ?>" class="btn btn-block btn-info" role="button"  > D-T Reverse Alphabetical</a>
          <a href="<?php echo base_url()."index.php/home/arrangeStudents/" . $row->classCode . "/" . 'Random' ?>" class="btn btn-block btn-info" role="button"  > Random </a> 
          <a href="<?php echo base_url()."index.php/home/loadArrangeStudentsManually/" . $row->classCode  ?>" class="btn btn-block btn-success" role="button"  > Manual </a> 
            

      </div>

    </div>
  </div>
</div>
<!--End modal for Arrange Students-->

<!--Modal for Archive Class-->
  <div class="modal fade" id="archiveClassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
      </div>
      <div class="modal-body">
          
           <h2>Are you sure you want to archive this class? </h2>
           <a href="<?php echo base_url()."index.php/home/archiveClass/" . $row->classCode ?>" class="btn btn-block btn-info archived" role="button"> Archive</a>
                           
      </div>

    </div>
  </div>
</div>
<!--End modal for Archive Class-->

<!--Modal for Delete Class-->
  <div class="modal fade" id="deleteClassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
      </div>
      <div class="modal-body">
          
           <h2>Are you sure you want to permanently delete this class? </h2>
           <a href="<?php echo base_url()."index.php/home/deleteClass/" . $row->classCode ?>" class="btn btn-block btn-info archived" role="button"> Delete</a>
                           
      </div>

    </div>
  </div>
</div>
<!--End modal for Delete Class-->

<!--Modal for Restore Class-->
  <div class="modal fade" id="restoreClassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
      </div>
      <div class="modal-body">
          
           <h2>Are you sure you want to restore this class? </h2>
            <a href="<?php echo base_url()."index.php/home/restoreClass/" . $row->classCode ?>" class="btn btn-block btn-info archived" role="button"> Restore</a>                      
      </div>

    </div>
  </div>
</div>
<!--End modal for Restore Class-->

<!--Modal for Delete students-->
  <div class="modal fade" id="deleteStudentsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
      </div>
      <div class="modal-body">
          
           <h2>Are you sure you want to delete all students? </h2>
            <a href="<?php echo base_url()."index.php/home/deleteStudents/" . $row->classCode ?>" class="btn btn-block btn-info archived" role="button"> Delete</a>                      
      </div>

    </div>
  </div>
</div>
<!--End modal for delete students-->

<!--Modal for Attendances-->
  <div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
      </div>
      <div class="col-md-12" id="attendanceBody">
          
                                
      </div>

    </div>
  </div>
</div>
<!--End modal for attendances-->



<script>
    function viewStudentDetails(stdNo, classCode){
        
        
        $("#main-content").load("loadViewStudentDetails", {student_no:stdNo, class_code:classCode}).hide(500).fadeIn();
    }

    function loadAttendanceModal(attendanceDate, classCode){
      $('#attendanceModal').modal({
        show: 'true'

        
      }); 
      $("#attendanceBody").load("loadAttendanceDates", {aDate:attendanceDate, class_code:classCode});
    }


</script>


</html>
