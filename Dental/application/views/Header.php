<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Dental
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="<?php echo base_url('assest/'); ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assest/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assest/'); ?>css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assest/'); ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url('assest/'); ?>css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="<?php echo base_url('assest/'); ?>css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="<?php echo base_url('assest/'); ?>css/custom.css" rel="stylesheet">

    <script src="<?php echo base_url('assest/'); ?>js/respond.min.js"></script>

    <link rel="shortcut icon" href="<?php echo base_url('assest/'); ?>favicon.png">
	
	
    <script src="<?php echo base_url('assest/'); ?>js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url('assest/'); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assest/'); ?>js/jquery.cookie.js"></script>
    <script src="<?php echo base_url('assest/'); ?>js/waypoints.min.js"></script>
    <script src="<?php echo base_url('assest/'); ?>js/modernizr.js"></script>
    <script src="<?php echo base_url('assest/'); ?>js/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo base_url('assest/'); ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assest/'); ?>js/front.js"></script>




</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-2 offer" >
                <!--<a href="<?php echo base_url('assest/'); ?>#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="<?php echo base_url('assest/'); ?>#">Get flat 35% off on orders over $50!</a>-->
            </div>
            <div class="col-md-10" >
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="<?php echo base_url('assest/'); ?>register.html">Register</a>
                    </li>
                    <li><a href="<?php echo base_url('assest/'); ?>contact.html">Contact</a>
                    </li>
                    <li><a href="<?php echo base_url('assest/'); ?>#">Recently viewed</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="<?php echo base_url('assest/'); ?>register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-Best Prices yamm" role="navigation" style="background-color: #c4c4c4;" id="navbar">
        <div class="container">
            <div class="navbar-header">
				<!--
                <a class="navbar-brand home" href="<?php echo base_url('assest/'); ?>index.html" data-animate-hover="bounce">
                    <img src="<?php echo base_url('assest/'); ?>img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="<?php echo base_url('assest/'); ?>img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>-->
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse"  id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="<?php echo base_url('assest/'); ?>index.html">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="<?php echo base_url('assest/'); ?>#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Patient <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        
                                        <div class="col-sm-3">
                                            <h5>Patient</h5>
                                            <ul>
                                                <li><a href="<?php echo base_url('assest/'); ?>category.html">Register</a>
                                                </li>
                                                <li><a href="<?php echo base_url('assest/'); ?>category.html">View Patient Details</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li> 
                    <li class="dropdown yamm-fw">
                        <a href="<?php echo base_url('assest/'); ?>#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Treatment <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        
                                        <div class="col-sm-3">
                                            <h5>Forms</h5>
                                            <ul>
                                                <li><a href="<?php echo base_url('assest/'); ?>category.html">Form 1</a>
                                                </li>
                                                <li><a href="<?php echo base_url('assest/'); ?>category.html">Forms 2</a>
                                                </li>
                                                <li><a href="<?php echo base_url('assest/'); ?>category.html">Forms 3</a>
                                                </li>
                                                <li><a href="<?php echo base_url('assest/'); ?>category.html">Forms 4</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>




                </ul>

            </div>


        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

	<!------------------------------------------------Sidebar--------------------------------------------------------------------->
				<div class="col-md-2">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ 
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Doctor	</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="customer-orders.html"><i class="fa fa-list"></i>Patients</a>
                                </li>
                                <li>
                                    <a href="customer-wishlist.html"><i class="fa fa-list"></i>Treatments</a>
                                </li>
                                <li>
                                    <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>
	<!------------------------------------------------Sidebar--------------------------------------------------------------------->

