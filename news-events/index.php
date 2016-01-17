
<?php

require_once '../template/header.php';

?>

 <!-- content --> 

    <div class="container-fluid">
        <div class="row">
            <div class="" style=" height: 400px; width: 100%; overflow: hidden">
                <img src="../img/event.jpg" style="width: 100%;">
                
            </div>
            
        </div>
        
    </div>
 

<div class="container-fluid" style="//padding-top: 50px;">
    <div class="row" style="background: #f6ffc6; padding-top: 20px; padding-bottom: 20px;">
         <div class="col-lg-8 col-lg-offset-2" >
            
             <div class="col-lg-6 text-center"><?php require_once '../includes/calendar.php'; ?></div>
             <div class="col-lg-6">
                 <h3>Upcoming Events</h3>
                 <div class="card" style="padding:10px; margin-top:10px;">
                        <table>
            	<tbody><tr><td style="text-align:left; width:80px;">
            	<figure class="event_figure">
                	<div class="event_month">October</div>
                    <div class="event_day">26</div>
                </figure>
                </td>
                
              
                	
                <td style="width:418px; vertical-align:text-top; padding-top:10px;">
                
                <h1 style="font-size:medium;">Last Call at the Oasis</h1>
                <span class="upcoming_details">
				                 </span>
                    
                
                </td>
                </tr>
                <tr style="height:20px;"><td></td></tr>
  </tbody></table>
           	            <table>
            	<tbody><tr><td style="text-align:left; width:80px;">
            	<figure class="event_figure">
                	<div class="event_month">May</div>
                    <div class="event_day">11</div>
                </figure>
                </td>
                
              
                	
                <td style="width:418px; vertical-align:text-top; padding-top:10px;">
                
                <h1 style="font-size:medium;">Graduation Ceremony</h1>
                <span class="upcoming_details">
				<time>08:00 PM</time> | College Park Center (CPC) on the UT Arlington                  </span>
                    
                
                </td>
                </tr>
                <tr style="height:20px;"><td></td></tr>
  </tbody></table>
           	            <table>
            	<tbody><tr><td style="text-align:left; width:80px;">
            	<figure class="event_figure">
                	<div class="event_month">May</div>
                    <div class="event_day">14</div>
                </figure>
                </td>
                
              
                	
                <td style="width:418px; vertical-align:text-top; padding-top:10px;">
                
                <h1 style="font-size:medium;">Let Geology Come Alive in New Mexico</h1>
                <span class="upcoming_details">
				New Mexico                 </span>
                    
                
                </td>
                </tr>
                <tr style="height:20px;"><td></td></tr>
  </tbody></table>
           	          </div>
             </div>
         </div>
     </div>
 </div>
<!-- -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3" style="padding: 20px;">
            <?php
            $stmt = $db->query('SELECT * FROM news');
            $count = 0;
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <article>
                     <h2 style="text-transform: uppercase;"><a style="color: #333333" href="#"><?php echo $row['title']; ?></a></h2>
                     <span style="font-size: 14px; color: orange; letter-spacing: 0.2em"><span class="glyphicon glyphicon-time"></span> <?php echo dateInUS($row['date']); ?>
                    <?php
                                if (!isset($postID)) {
                                ?>
                         | <span class="glyphicon glyphicon-comment"></span>  <a style="color: orange" href="post.php?id=<?php echo $row['ID']; ?>#disqus_thread"> </a>
                                <?php
                                }
                                ?>
                    </span>
                    
                    <?php
                        if (strlen($row['img']) > 0) {
                    ?>
                        <div style="padding-top: 10px;">
                            <img src="../img/news/<?php echo $row['img']; ?>" style="width: 100%">
                        </div>
                    <?php
                        }
                    ?>
                 
                    <p style="padding-top: 10px;">
                        <?php 
                        if (str_word_count($row['description']) < $blogWordLimit) {
                            echo $row['long_desc'];
                        } else if ((str_word_count($row['description']) < $blogWordLimit + 50) && (str_word_count($row['description'])-50) < 50 ) {
                            echo $row['description'];
                        } else if (isset ($postID)) {
                            echo $row['description'];
                        } else {
                            echo limit_words($row['description'], $blogWordLimit); ?>
                                <a style="color: #333333" href="#">                                                   
                                <?php echo ' [..]</a>'; 
                        }
                        
                        ?>
                    </p>
                    
                    
                    
                    <?php $count++; if ($stmt->rowCount() != $count) echo '<hr>'; ?>
                    
                    
                    
                 </article>
            
            
            <?php
                    }
            ?>
        </div>
    </div>
</div>



<!-- / -->
</div>
 
 
 <!-- /content -->
 <?php
require_once '../template/footer.php';