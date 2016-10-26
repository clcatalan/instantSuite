<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INSTANT SUITE</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>homepage-css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>homepage-css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

    #modals {
        background-color: gray;
    }
    


    </style>

</head>

<body>

    <!-- Navigation -->

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container" id="index">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                 
                        <h1> Instant Suite</h1>
                        <h3>Online Examination System and Atttendance Checker</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">

                            <li>
                               
                                <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#loginModal"> 
                                    <i class="fa fa-sign-in fa-fw"></i> <span class="network-name">Login</span> 
                                </button>

                            </li>
                            <li>
                                <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#signupModal"> 
                                    <i class="fa fa-sign-in fa-fw"></i> <span class="network-name">Sign Up</span> 
                                </button>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-google fa-fw"></i> <span class="network-name">Login via UP Mail</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-------------------------------------- MODAL FOR LOG IN ------------------------------------>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content col-md-10 col-md-offset-1" >

          <div class="modal-body" id="modals">
           
              <form class="login-form" action="<?php echo base_url()."index.php/home/validate_entry_login/"?>" method="post" accept-charset="utf-8">        
                <?php echo validation_errors(); ?>
                <div class="login-wrap">
                  <form class="login-form" action="<?php echo base_url()."index.php/home/validate_entry_login/"?>" method="post" accept-charset="utf-8">

                    <p class="login-img col-xs-offset-5"><img src="<?php echo base_url(); ?>img/instant-square.png" alt="Logo" height="75" width="75"></p>
                    
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon_profile"></i></span>
                      <input type="text" class="form-control" name="email_address" value="" placeholder="Email Address" />
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" name="password" value="" placeholder="Password" />
                    </div>
                    <br><br>
                    <button class="btn btn-primary btn-lg btn-block" name="login_submit" value="Login" type="submit">Login</button>
     
                </div>
              </form>
            

          </div>

        </div>
      </div>
    </div>
    <!-------------------------------------- END MODAL FOR LOG IN ------------------------------------>


        <!-------------------------------------- MODAL FOR SIGN UP ------------------------------------>
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content col-md-10 col-md-offset-1" >

          <div class="modal-body" id="modals">

              <form class="login-form" action="<?php echo base_url()."index.php/home/signup_validation/"?>" method="post" accept-charset="utf-8" >        
                <div class="login-wrap">
                    <p class="login-img col-xs-offset-5"><img src="<?php echo base_url(); ?>img/instant-square.png" alt="Logo" height="75" width="75"></p>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon_profile"></i></span>

                      <input type="text" class="form-control" placeholder="Last Name" name="lastName" value=""  />
                      <input type="text" class="form-control" placeholder="First Name" name="firstName" value=""  />
                      <input type="text" class="form-control" placeholder="Middle Name" name="middleName" value=""  />

                    </div>
                    <br>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="text" class="form-control" name="empNo" placeholder="Employee No./ Student No. ">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="text" class="form-control" name="email_address_signup" placeholder="E-mail address">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" name="password_signup" placeholder="Password">
                    </div>
                   

                    <br><br>
                   <button type="submit"  name="signup_submit" value="Sign up" class="btn btn-primary btn-lg btn-block" >Sign Up</button>



                </div>
              </form>           

          </div>

        </div>
      </div>
    </div>
    <!-------------------------------------- END MODAL FOR SIGN UP ------------------------------------>




    <!-- jQuery -->
    <script src="homepage-js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="homepage-js/bootstrap.min.js"></script>
   
   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


</body>



</html>
