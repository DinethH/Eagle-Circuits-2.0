<?php
date_default_timezone_set('US/Central');	
$page = explode("/", $_SERVER['PHP_SELF']);
//print_r($page);
if ($page[2] == "index.php") {    
    require_once './includes/config.php';
    require_once './includes/functions.php';
} else {
    require_once '../includes/config.php';
    require_once '../includes/functions.php';

}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Eagle Circuits</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300' rel='stylesheet' type='text/css'>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
    <script src="https://rawgit.com/abduzeedo/ios7-blur-html5/master/js/html2canvas.js"></script>
    <script src="https://rawgit.com/abduzeedo/ios7-blur-html5/master/js/StackBlur.js"></script>
    
    <script>
    $(function () {
    html2canvas($("body"), {
        onrendered: function (canvas) {
            $(".blurheader").append(canvas);
            $("canvas").attr("id", "canvas");
            stackBlurCanvasRGB(
                'canvas',
            0,
            0,
            $("canvas").width(),
            $("canvas").height(),
            20);
        }
    });
    vv = setTimeout(function () {
        $("header").show();
        clearTimeout(vv);
    }, 200);
});

$(window).scroll(function () {
    $("canvas").css("-webkit-transform", "translatey(-" + $(window).scrollTop() + "px)");
$("canvas").css("-moz-transform", "translatey(-" + $(window).scrollTop() + "px)");  
$("canvas").css("-ms-transform", "translatey(-" + $(window).scrollTop() + "px)");   
$("canvas").css("-o-transform", "translatey(-" + $(window).scrollTop() + "px)");    
$("canvas").css("transform", "translatey(-" + $(window).scrollTop() + "px)");   
});

window.onresize = function () {
    $("canvas").width($(window).width());
};

$(document).bind('touchmove', function () {
    $("canvas").css("-webkit-transform", "translatey(-" + $(window).scrollTop() + "px)");
    $("canvas").css("-moz-transform", "translatey(-" + $(window).scrollTop() + "px)");  
    $("canvas").css("-ms-transform", "translatey(-" + $(window).scrollTop() + "px)");   
    $("canvas").css("-o-transform", "translatey(-" + $(window).scrollTop() + "px)");    
    $("canvas").css("transform", "translatey(-" + $(window).scrollTop() + "px)");   
});

$(document).bind('touchend', function () {
    $("canvas").css("-webkit-transform", "translatey(-" + $(window).scrollTop() + "px)");
    $("canvas").css("-moz-transform", "translatey(-" + $(window).scrollTop() + "px)");  
    $("canvas").css("-ms-transform", "translatey(-" + $(window).scrollTop() + "px)");   
    $("canvas").css("-o-transform", "translatey(-" + $(window).scrollTop() + "px)");    
    $("canvas").css("transform", "translatey(-" + $(window).scrollTop() + "px)");   
});
    </script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <header>
        <div id="mainnavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="<?php if ($page[2] == "index.php") echo 'active'; ?>"><a href="<?php 
                                            if ($page[2] == "index.php") {    
                                                echo './';
                                            } else {
                                                echo '../';
                                            }
                                        ?>
                                    ">Home</a></li>
            <li class="<?php if ($page[2] == "news-events") echo 'active'; ?>"><a href="<?php 
                            if ($page[2] == "index.php") {   
                                echo './news-events/';
                            } else {
                                echo '../news-events/';
                            }
                        ?>">News &amp; Events</a></li>
            <li class="<?php if ($page[2] == "capabilities-services") echo 'active'; ?>"><a href="<?php 
                            if ($page[2] == "index.php") {   
                                echo './capabilities-services/';
                            } else {
                                echo '../capabilities-services/';
                            }
                        ?>">Capabilities &amp; Services</a></li>
            <li class="<?php if ($page[2] == "marketplace") echo 'active'; ?>"><a href="<?php 
                            if ($page[2] == "index.php") {   
                                echo './marketplace/';
                            } else {
                                echo '../marketplace/';
                            }
                        ?>">Marketplace</a></li>
            <li class="<?php if ($page[2] == "blog") echo 'active'; ?>"><a href="<?php 
                           
                            if ($page[2] == "index.php") {    
                                echo './blog/';
                            } else {
                                echo '../blog/';
                            }
                        ?>">Blog</a></li>
            <li class="<?php if ($page[2] == "forum") echo 'active'; ?>"><a href="<?php 
                            if ($page[2] == "index.php") {   
                                echo './forum/';
                            } else {
                                echo '../forum/';
                            }
                        ?>">Forum</a></li>
            <li class="<?php if ($page[2] == "about-us") echo 'active'; ?>"><a href="<?php 
                            if ($page[2] == "index.php") {   
                                echo './about-us/';
                            } else {
                                echo '../about-us/';
                            }
                        ?>">About</a></li>
            <li class="<?php if ($page[2] == "contact-us") echo 'active'; ?>"><a href="<?php 
                            if ($page[2] == "index.php") {    
                                echo './contact-us/';
                            } else {
                                echo '../contact-us/';
                            }
                        ?>">Contact</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </header>
    <div class="blurheader"></div>

    <div id="wrap">
   