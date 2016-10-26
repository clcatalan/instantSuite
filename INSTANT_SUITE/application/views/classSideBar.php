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
                  <li class="sub-menu">
                      <a class="mainSideBarLoader">
                          <i class="icon_document_alt"></i>
                          <span> << Return </span>
                      </a>
                  </li>                
                  <li class="sub-menu">
                      <a class="createClassLoader">
                          <i class="icon_document_alt"></i>
                          <span>Create Class</span>
                      </a>
                  </li>
                  <?php if($classes!=false): ?>
                   <?php foreach($classes as $row): ?>
                    <li class="sub-menu">
                      <a id ="classDetails-<?php echo $row->classCode; ?>" onClick="classActionsLoader(this.id)">
                          <i class="icon_document_alt"></i>
                          <span><?php echo $row->course_code ,"-", $row->section ; ?></span>
                      </a>
                    </li>                                           
                  <?php endforeach?>
                  <?php endif ?>
                  <li class="sub-menu">
                      <a class="archivedClassLoader">
                          <i class="icon_document_alt"></i>
                          <span>Archived Classes</span>
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



  <script>

      //knob
      $(".knob").knob();

  </script>

      <script language="javascript">

    $(document).ready(function(){

        $(".createClassLoader").click(function(){
            

            $("#main-content").load("loadCreateClass").hide(500).fadeIn();
          });

        $(".mainSideBarLoader").click(function(){
            $("#sidebar").load("loadMainSideBar").fadeIn();
          });

        $(".archivedClassLoader").click(function(){
            $("#sidebar").load("loadArchivedSideBar").fadeIn();
          });

    });


    function classActionsLoader(id){

        var subject = id.split("-");
        $("#main-content").load("loadClassActions", {courseCode:subject[1], archived:0}).hide(500).fadeIn();
    }

    </script>





</html>
