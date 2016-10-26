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
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

  </head>
  <body>

  
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i>Create Class</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo site_url('teachers/teacherActions/2')?>">Home</a></li>
            <li><i class="icon_document_alt"></i>Forms</li>
            <li><i class="fa fa-file-text-o"></i>Create Class</li>
          </ol>
        </div>
      </div>
              <!-- EXAM TEMPLATE FORM -->
              <div class="row">
                  <div class="col-lg-7">
                      <section class="panel">
                          <header class="panel-heading">
                              Class Details
                          </header>
                    <div class="panel-body">
                        <form id="classForm" action="<?php echo base_url()."index.php/home/createClass/"?>" class="form-horizontal col-xs-8 "method="post" accept-charset="utf-8">
                           
                            <div class="form-group">
                              <label class="control-label" for="courseNo">Course Number</label>
                              <div>
                                <input type="text" class="form-control" id="courseNo" placeholder="Course Number" name="courseNo" value=""  />
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label" for="courseTitle">Course Title</label>
                              <div>
                                <input type="text" class="form-control" id="courseTitle" name="courseTitle" value="" placeholder="Course Title"  />
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label" for="section">Section</label>
                              <div>
                              <input type="text" class="form-control" id="section" name="section" value="" placeholder="Section" />
                              </div>
                            </div>

    
                            <button type="submit" name="signup_submit" value="submit" class="btn btn-default createClass">Create</button>
                         
                        </form>
                  </div>
                    </section>
                      
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  

  </body>
</html>
