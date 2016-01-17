<?php

require_once './template/header.php';
?>
<div class="container-fluid">
        <!-- carousel -->
        <div id="carousel-example-generic" class="carousel slide row" data-ride="carousel" style="height: 500px; overflow: hidden;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="img/house.jpg" alt="...">
                    <div class="carousel-caption">
                      ...
                    </div>
                  </div>
                  <div class="item ">
                    <img src="img/xmen.jpg" alt="...">
                    <div class="carousel-caption">
                      ...
                    </div>
                  </div>
                    <div class="item ">
                    <img src="img/house.jpg" alt="...">
                    <div class="carousel-caption">
                      ...
                    </div>
                  </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
              </div>
     <!-- /carousel -->
    </div> <!-- /container -->
     <!-- content -->   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="padding: 20px;">
                ToDo:
                <br>
                <ul>
                    <li>Recent news widget</li>
                    <li>Recent blog posts widget</li>
                    <li>Latest posts on the forum</li>
                    <li>Row: Primary services of the company</li>
                    <li>Recent additions to the marketplace</li>
                </ul>
            </div>
            
        </div>
    
        <div id="push"></div>
    </div>
  </div>
 <!-- /content -->
<?php
require_once './template/footer.php';