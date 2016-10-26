<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Profile | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css"rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
     <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
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
  </style>

  </head>

  <body>

<div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="profileLoader">
                          <i class="icon_profile"></i>
                          <span>My Profile</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="classSideBarLoader">
                          <i class="icon_document_alt"></i>
                          <span>Subjects >> </span>
                      </a>
                  </li> 
                  <li class="sub-menu">
                      <a class="createExamLoader">
                          <i class="icon_document_alt"></i>
                          <span>Create Exam</span>
                      </a>
                  </li> 
                  <li class="sub-menu">
                      <a class="addQuestionSidebarLoader">
                          <i class="icon_document_alt"></i>
                          <span> Add Question >> </span>
                          
                      </a>
                  </li> 
                  <li class="sub-menu">
                      <a class="manageExamLoader">
                          <i class="icon_desktop"></i>
                          <span>Manage Exams</span>
                      </a>
                  </li>
                  <li  class="sub-menu">
                      <a class="questionBankLoader">
                          <i class="icon_genius"></i>
                          <span>Question Bank</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Attendance</span>
                      </a>
                  </li>
                   <li>                     
                      <a class="logsLoader">
                          <i class="icon_ol"></i>
                          <span>View Logs</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>



  </body>

    <!-- javascripts -->
     <!-- javascripts -->
    <script src="<?php echo base_url();?>js/jquery.js" ></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="<?php echo base_url();?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="<?php echo base_url();?>js/scripts.js"></script>
     <!-- jquery knob -->
    <script src="<?php echo base_url();?>assets/jquery-knob/js/jquery.knob.js"></script>-->

<script language="javascript">

    $(document).ready(function(){

          $(".profileLoader").click(function(){
        //  $(id).load(controller_function);
            $("#main-content").load("loadProfile").hide(500).fadeIn();
          });

         $(".createExamLoader").click(function(){
            $("#main-content").load("loadCreateExam").hide(500).fadeIn();
          });

        $(".manageExamLoader").click(function(){
            $("#main-content").load("loadManageExam").hide(500).fadeIn();            
          });

        $(".questionBankLoader").click(function(){
            $("#main-content").load("loadQuestionBank").hide(500).fadeIn();
          });

        $(".logsLoader").click(function(){
            $("#main-content").load("loadLogs").hide(500).fadeIn();
          });

        $(".classSideBarLoader").click(function(){
            

            $("#sidebar").load("loadClassSideBar").fadeIn();
          
          });

        $(".addQuestionSidebarLoader").click(function(){
            $("#sidebar").load("loadAddQuestionSideBar").fadeIn();
          });

        

        $(".createClassLoader").click(function(){
            $("#main-content").load("loadCreateClass").hide(500).fadeIn();
          });

        //manually activate dropdown 
        //$('.dropdown-toggle').dropdown();
            


         
    });
    </script>

  <script>

      //knob
      $(".knob").knob();

  </script>

      





</html>
