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
     <script src="<?php echo base_url();?>js/svg.min.js" ></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">   



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



  <body onload="initialize()">
        <?php $classCode = $this->uri->segment(3); ?>
<section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="#" class="logo">INSTANT <span class="lite">SUITE</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                    <li id="task_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="icon-task-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 5 pending tasks</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Design PSD </div>
                                        <div class="percent">90%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                            <span class="sr-only">90% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">
                                            Project 1
                                        </div>
                                        <div class="percent">30%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                            <span class="sr-only">30% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Digital Marketing</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Logo Designing</div>
                                        <div class="percent">78%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                                            <span class="sr-only">78% Complete (danger)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Mobile App</div>
                                        <div class="percent">50%</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar"  role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                            <span class="sr-only">50% Complete</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                    <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Greg  Martin</span>
                                    <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Bob   Mckenzie</span>
                                    <span class="time">5 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, What is next project plan?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Phillip   Park</span>
                                    <span class="time">2 hrs</span>
                                    </span>
                                    <span class="message">
                                        I am like to buy this Admin Template.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Ray   Munoz</span>
                                    <span class="time">1 day</span>
                                    </span>
                                    <span class="message">
                                        Icon fonts are great.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 4 new notifications</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span> 
                                    Friend Request
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>  
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span> 
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span> 
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
                            </li>                            
                            <li>
                                <a href="#">See all notifications</a>
                            </li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle profile" aria-haspopup="true" aria-expanded="false">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo base_url()?>img/avatar1_small.jpg">
                            </span>
                            <span class="username">
                            <?php  //displays user's credentials
                            echo $this->session->userdata('firstName');
                            echo " ";
                            echo $this->session->userdata('lastName');
                            ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout" id="profile-dropdown">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()."index.php/home/logout" ?>"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
       <aside>
        <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="sub-menu">
                      <a href="<?php echo base_url()."index.php/home/clearAllSeats/" . $classCode ?>">
                          <i class="icon_document_alt"></i>
                          <span> Clear All</span>
                      </a><!--
                       <a onclick="enableRemoveSeat()">
                          <i class="icon_document_alt"></i>
                          <span id="removeSeatText"> Remove Seat </span>
                      </a>-->
                  </li>
                    <li class="sub-menu">
                      <a onclick="undoPrevious('<?php echo $classCode; ?>')">
                          <i class="icon_document_alt"></i>
                          <span> Undo Previous</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a onclick="redoPrevious('<?php echo $classCode; ?>')">
                          <i class="icon_document_alt"></i>
                          <span> Redo Previous </span>
                      </a>
                  </li>                  
                  <li class="sub-menu">
                      <a href="<?php echo base_url()."index.php/home/saveSeatLayout/" . $classCode ?>">
                          <i class="icon_document_alt"></i>
                          <span> Save Seat Plan </span>
                      </a>
                  </li>                
                 

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <div class="container" id="main-content">
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
  
              <div class="col-lg-12">
                <form class="form-horizontal">
                    <h4>Rows: <input type="text" class="form-horizontal" id="rows" value= 1 placeholder="Rows" /></h4>
                    <h4>Columns: <input type="text" class="form-horizontal" id="columns" value= 1 placeholder="Columns" /></h4>
                </form>


                 

                  <section class="panel">
                      <header class="panel-heading">
                          Create Seat Plan 
                      </header>
                    <h2 class="col-lg-offset-5">BLACKBOARD</h2>
                    <svg id="seatingLayout" onclick="createSeat(evt, '<?php echo $classCode; ?>')" width="1000" height="1500">

                    <!--<circle fill="red" cx="100" cy="100" r="20" stroke="black" stroke-width="3"></circle>
                    -->
                    </svg>
                    
              </div>
        </div>
      <!--main content end-->
  </section>




     
  </body>

    <script type="text/javascript">
        var recent_x;
        var recent_y;

        var columns = 0;
        var rows = 0;

        var x = 0;
        var y = 0;

        var rSeat = 0;

    function initialize(){
       recent_x = 0;
       recent_y = 0;
       x = 0;
       y = 0;
      
    }

    /*function undoPrevious(classCode){

        //alert(recent_x+" "+recent_y);
        $.ajax({

                    type: 'POST',
                    url: '<?php echo base_url(); ?>index.php/home/undoPrevious', 
                    data: 'classCode='+classCode+'&position_x='+recent_x+'&position_y='+recent_y+'&columns='+columns+'&rows='+rows, 
                    success: function(resp) { 
                    
                       alert("previous move undone");
                    }
                });
    }*/

    function undoPrevious(classCode){


                $.ajax({


                    type: 'POST',
                    url: '<?php echo base_url(); ?>index.php/home/undoPrevious', 
                    data: 'classCode='+classCode+'&position_x='+recent_x+'&position_y='+recent_y+'&columns='+columns+'&rows='+rows, 
                    success: function(resp) { 
                        for(var i=1;i<=rows;i++){
                            for(var j=1;j<=columns;j++){
                                prev_x = recent_x + (j*70);
                                prev_y = recent_y + (i*70);

                                document.getElementById(prev_x*prev_y).style.visibility = "hidden"; 
                            }    
                        }         
                    }
                });

    }

    function redoPrevious(classCode){
                $.ajax({


                    type: 'POST',
                    url: '<?php echo base_url(); ?>index.php/home/redoPrevious', 
                    data: 'classCode='+classCode+'&position_x='+recent_x+'&position_y='+recent_y+'&columns='+columns+'&rows='+rows, 
                    success: function(resp) { 
                        for(var i=1;i<=rows;i++){
                            for(var j=1;j<=columns;j++){
                                prev_x = recent_x + (j*70);
                                prev_y = recent_y + (i*70);

                                document.getElementById(prev_x*prev_y).style.visibility = "visible"; 
                            }    
                        }         
                    }
                });


    }

    function createSeat(evt, classCode){


    if(rSeat==0){

        columns = document.getElementById('columns').value;
        rows = document.getElementById('rows').value;
        //alert(columns+" "+rows);
        if(columns<=0||rows<=0){
            alert("Columns or Rows cannot be Less than or equal to Zero");
        }

        else{
            var e = evt.target;
            var dim = e.getBoundingClientRect();
            x = evt.clientX - dim.left-70;
            y = evt.clientY - dim.top-70;

            recent_x = x;
            recent_y = y;

           //alert(recent_x+" "+recent_y);



            var draw = SVG('seatingLayout');
            draw.size(1500,1500);

            var counter = 1;

             
            
                $.ajax({

                    type: 'POST',
                    url: '<?php echo base_url(); ?>index.php/home/saveTempSeat', 
                    data: 'classCode='+classCode+'&position_x='+x+'&position_y='+y+'&columns='+columns+'&rows='+rows, 
                    success: function(resp) { 
                        for(var i=1;i<=rows;i++){
                            for(var j=1;j<=columns;j++){
                                
                                draw.circle(10).attr({id: (recent_x+(j*40))*(recent_y+(i*50)), fill: 'red', cx: x+(j*50), cy: y+(i*50), r:20});
                               
                            }
                        }
                      
                    }
                });


        }
      }  

    }

    function enableRemoveSeat(){
       // document.getElementById("removeSeatText").innerHTML.text = "Remove Seat (Enabled)";
        if(rSeat==0){
            rSeat = 1;
            alert("Remove Seat Enabled");
        }
        else if(rSeat==1){
            rSeat = 0;
            alert("Remove Seat Disabled");
        }
        //alert(cx);
       
    }




    </script>



</html>
