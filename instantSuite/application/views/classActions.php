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

  <head>
    <!--
    <link href="<?php echo base_url(); ?>css/bootstrap-theme.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet"/>

    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
     <link rel="stylesheet" href="/resources/demos/style.css">-->


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>

  </head>

 <style>
    fieldset {
      border: 0;
    }
    label {
      display: block;
      margin: 30px 0 0 0;
    }
    select {
      width: 200px;
    }
    .overflow {
      height: 200px;
    }
        body {
        background-color: cyan;
    }

   
  </style>



  <body>
  <!-- container section start -->
    <div class="nav-wrapper">
      <nav class="blue lighten-1">
        <div>
          <?php  foreach($class as $row): ?>
          <a href="#" class="brand-logo"><?php echo $row->course_code, "-", $row->section, "( ", $row->course_title, " )" ;?></a>
          <?php endforeach ?>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            
             <li><a class="modal-trigger" href="#instructionsModal"><i class="material-icons right">info_outline</i>How to Use</a></li>
            <li><a href="<?php echo base_url()."index.php/ams_controller/logout/"?>"><i class="material-icons right">input</i>Logout</a></li>
            
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a class="modal-trigger" href="#instructionsModal"><i class="material-icons right">info_outline</i>How to Use</a></li>
            <li><a href="<?php echo base_url()."index.php/ams_controller/logout/"?>"><i class="material-icons right">input</i>Logout</a></li>
            
          </ul>
        </div>
      </nav>
    </div>
      <br><br>

          <section class="wrapper">

              <!-- page start-->

                      
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s3"><a class="active black-text text-darken-2" href="#test1">Student List</a></li>
                    <li class="tab col s3"><a href="#test2" class="black-text text-darken-2">Record Attendances</a></li>
                  </ul>
                </div>
                <div id="test1" class="col s12">

                <div id="users">
                <input class="search" placeholder="Search" />
                  <button class="sort btn" data-sort="stdNo">
                    Sort by Student Number
                  </button>
                  <button class="sort btn" data-sort="lastName">
                    Sort by Last Name
                  </button>
                  <button class="sort btn" data-sort="firstName">
                    Sort by First Name
                  </button>
                  <button class="sort btn" data-sort="middleName">
                    Sort by Middle Name
                  </button>
                                        <div class="row">
                      <h5 class="stdNo col s2">Student Number</h5>  
                      <h5 class="lastName col s3">Last Name</h5>
                      <h5 class="firstName col s3">First Name</h5>
                      <h5 class="middleName col s3">Middle Name</h5>
                      
                      </div>
                  <ul class="list collection">
                    

                    
                    <?php if($students!=false): ?>
                    <?php foreach($students as $row): ?>
                    <li class="collection-item">
                      <div class="row">
                      <h5 class="stdNo col s2"><?php echo $row->student_no; ?></h5>  
                      <h5 class="lastName col s3"><?php echo $row->lastName; ?></h5>
                      <h5 class="firstName col s3"><?php echo $row->firstName; ?></h5>
                      <h5 class="middleName col s3"><?php echo $row->middleName; ?></h5>
                      <a class="waves-effect waves-light btn col s1" href="<?php echo base_url()."index.php/ams_controller/viewAbsences/" . $row->student_no ?>">View</a>
                      </div>
                    </li>
                    <?php endforeach?>
                    <?php endif ?>  
                  </ul>
                </div>
                     
                      <!--<table data-filter="true" data-input="#myFilter" data-autodividers="true" data-inset="true">
                                           
                          <tbody>
                            <tr>
                              <th> Student Number</th>
                              <th>Last Name</th>
                              <th>First Name </th>
                              <th>Middle Name </th>
                              <th>Absences</th>

                                               
                            </tr>
                           
                              <?php if($students!=false): ?>
                              <?php foreach($students as $row): ?>

                                <td><?php echo $row->student_no; ?></td>
                                <td><?php echo $row->lastName; ?></td>
                                <td><?php echo $row->firstName; ?></td>
                                <td><?php echo $row->middleName; ?></td>
                                <td><a class="waves-effect waves-light btn" href="<?php echo base_url()."index.php/ams_controller/viewAbsences/" . $row->student_no ?>">View</a></td>            

                              </tr>        
                              <?php endforeach?>

                              <?php endif ?>                 
                             </tbody>
                        </table>-->


                </div>
                <div id="test2">
                          <h4 class="center-align">BLACKBOARD</h4>
                          <div>

                                 
                           
                          <?php 
                                $i = 0;    
                                foreach($seatplan as $seat): 
                                
                          ?>    
                                <div style="position:absolute; left:<?php echo $seat->location_x;?>px; top:<?php echo $seat->location_y+300;?>px;">
                                <a class="btn-floating btn-large green" id="stdButton" 
                                  onclick="recordAbsence('<?php echo $seat->stud_no; ?>')"><h5 id='<?php echo $seat->stud_no; ?>'></h5></a>
                                </div>
                          <?php
                                $i++;   
                                endforeach;
                           ?>
                           <!--
                          <svg width="1500" height="1500">
                          
                          <circle onclick="recordAbsence(1, 'MFa6C', '2012-37801')" id="1" r="25" cx="300" cy="300" style="fill: green; stroke: black; stroke-width: 2">


                          </circle>
                          
                          <?php 
                                $i = 0;    
                               // foreach($seatplan as $seat): 

                          ?>    
                                
                                <circle onclick="recordAbsence(<?php echo $i;?>, '<?php echo $this->session->userdata('classCode'); ?>', '<?php echo $seat->stud_no;?>')" id="<?php echo $i;?>" r="25" cx="<?php echo (($seat->location_x) - 20); ?>" cy="<?php echo $seat->location_y;?>" style="fill: green; stroke: black; stroke-width: 2"/>
                                
                                <text id="<?php echo $seat->stud_no; ?>" x="<?php echo $seat->location_x - 25; ?>" y="<?php echo $seat->location_y - 27; ?>" font-size="20" fill="black" visibility="hidden">
                                  <?php echo $seat->stud_no; ?>
                                <set attributeName="visibility" from="hidden" to="visible" begin="<?php echo $i; ?>.mouseover" end="<?php echo $i; ?>.mouseout"/>
                                </text>
                          <?php
                                $i++;   
                               // endforeach;
                           ?>
                          
                          </svg>-->


                          </div>
                          <a class="waves-effect waves-light btn" onclick="saveAbsences('<?php echo $this->session->userdata('classCode'); ?>')">Save Absences</a>
                          <a class="waves-effect waves-light btn" onclick="allPresent('<?php echo $this->session->userdata('classCode'); ?>')">All Present</a>
                
                </div>

              <!--</div>-->
                        



           
          </section>


    <div id="instructionsModal" class="modal modal-fixed-footer">
        <div class="modal-content">

          <h4>How to Use This Mobile Application</h4>
          <p>Upon logging in to the application, you are immediately given two choices, either to view the list of students, or record their attendances</p>
          <p>1. Viewing the List of Students</p>
          <img src="<?php echo base_url()."assets/student_list.png"?>">
          <p>Above you are shown the complete list of students for the class as provided by the instructor. This will only be empty if the instructor still has not uploaded the student list in the web application</p>
          <p>2. Recording a Student's Attendance</p>
          <img src="<?php echo base_url()."assets/allPresent.png"?>">
          <p>Next, you are shown the seat plan of the class also provided by the instructor. A green seat indicates the students presence in the class.</p>
           <img src="<?php echo base_url()."assets/seatPlan.png"?>">
           <p>To mark a student absent, simply click on the seat. Once clicked, it turns red, indicating the absence. To undo this, simply click on the red seat again and it will turn green. Make sure to save once your done!</p>
          <p>3. Viewing the Absences of a Student</p>
          <img src="<?php echo base_url()."assets/student_list.png"?>">
          <p>To view a student's absence, click on the view button along the row of the student in the table</p>
          <img src="<?php echo base_url()."assets/seatPlan.png"?>">
          <p>A student's absences are immediately reflected after you have recorded them. If there are any discrepancies, inform the instructor of this class and he/she will address them.</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Got it!</a>
        </div>
      </div>
     
  </body>




    <script>

    var options = {
      valueNames: [ 'stdNo', 'lastName', 'firstName', 'middleName' ]
    };

    var userList = new List('users', options);

      var students = new Array();

      $(document).ready(function(){
        $('ul.tabs').tabs();
      
        $('ul.tabs').tabs('select_tab', 'tab_id');

        $(".button-collapse").sideNav();

         $('.modal-trigger').leanModal();

           $('.slider').slider({full_width: true});

        
      });

      function recordAbsence(stdNo){ //id classCode, stdNo


       if(document.getElementById(stdNo).innerHTML == "A"){
          document.getElementById(stdNo).innerHTML = " ";
          
           for(var i=0;i<students.length;i++){
            if(students[i]==stdNo){
              students.splice(i, 1);
            }
          }

       }
        else if((document.getElementById(stdNo).innerHTML) != "A"){
          //alert("Not A")
          document.getElementById(stdNo).innerHTML = "A";
          students.push(stdNo);

        }

        alert(students);

      }


      function checkConnectionFirst(classCode, type){
        var xhr = new XMLHttpRequest();
          var file = "http://instantsuite.heliohost.org/instantSuite/assets/instant.png";
          var randomNum = Math.round(Math.random() * 10000);
           
          xhr.open('HEAD', file + "?rand=" + randomNum, false);
           
          try {
              xhr.send();
               
              if (xhr.status >= 200 && xhr.status < 304) {
                  if(type==1){
                    //save absences
                    saveAbsences(classCode);
                  }
                  else if(type==2){
                    //all present
                    allPresent(classCode);
                  }



              } else {
                  alert("connection does not exist");
              }
          } catch (e) {
              alert("No Internet Connection");
          }
      }

      function saveAbsences(classCode){
        //alert(classCode);

        for(var i=0; i< students.length;i++){
          
            $.ajax({
             traditional: true,
             type: 'POST',
             url: '<?php echo base_url(); ?>index.php/ams_controller/recordAbsence', //We are going to make the request to the method "list_dropdown" in the match controller
             data: 'classCode='+classCode+'&students='+students[i], //POST parameter to be sent with the tournament id
            
               success: function(resp) { 
                  alert("Absences Saved");
               }
           });
        }

      }

      function allPresent(classCode){

        var d = new Date();
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";

        var allPresentDate = month[d.getMonth()]+" "+d.getDate()+" "+d.getFullYear();

        $.ajax({
             traditional: true,
             type: 'POST',
             url: '<?php echo base_url(); ?>index.php/ams_controller/allPresent', //We are going to make the request to the method "list_dropdown" in the match controller
             data: 'allPresent='+allPresentDate, //POST parameter to be sent with the tournament id
            
               success: function(resp) { 
                  alert("Date Saved: No Absences Today");
               }
           });
      }


    </script>
  


</html>
