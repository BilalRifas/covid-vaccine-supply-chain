<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Corona Vaccine</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/samali/css/style.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/samali/css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <!-- Favicon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Custom stylesheet - for your changes-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>public/samali/img/computer.png">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">

    <link href="<?php echo base_url() ?>public/samali/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/samali/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/samali/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
  </head>
  <body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content" style="margin-top: 5%">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h1>Corona Vaccine</h1></a>
        
                                <form class="mt-5 mb-5 login-input" id="login-form" method="post">
                                    <!-- <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div> -->
                                    <div class="form-group">
                                      <input id="login-username" type="text" name="username" class="form-control" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <input id="login-password" type="password" name="password" class="form-control" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control" id="txtModules" name="txtModules">
                                          <?php foreach($company as $company){ ?>
                                          <option value="<?php echo $company->mas_compmdls_id; ?>"><?php echo strtoupper($company->mas_compmdls_shtname); ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <button type="sumbit" id="login" name="login" class="btn login-form__btn submit w-100">Login</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p>
                                <a href="#" id="demoMessage5" name="demoMessage5"  class="forgot-pass">Forgot Password?</a>
                            </div>
                           <div class="copyrights text-center">
                            <p style="color: rgb(39, 40, 34);">Copyright &copy; &nbsp;<a href="https://www.facebook.com/sajithsamaliarachchi1994/" class="external">TSD Group 5(CMU, MSc IT)</a></p>
                            <p style="color: rgb(39, 40, 34);">Contact Sajith on <a href="https://www.facebook.com/sajithsamaliarachchi1994/" class="external">+94 77 814 2316</a> for System Support</p>


                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript files-->
    <script src="<?php echo base_url(); ?>public/samali/plugins/common/common.min.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/js/settings.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/js/gleek.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="<?php echo base_url(); ?>public/samali/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="<?php echo base_url(); ?>public/samali/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="<?php echo base_url(); ?>public/samali/plugins/d3v3/index.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/plugins/topojson/topojson.min.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="<?php echo base_url(); ?>public/samali/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="<?php echo base_url(); ?>public/samali/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="<?php echo base_url(); ?>public/samali/plugins/chartist/js/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>public/samali/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>