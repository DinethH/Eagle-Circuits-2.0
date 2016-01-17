
<?php

require_once '../template/header.php';

if (isset($_GET['id']) && is_int((int)(trim($_GET['id'])))) {
    $postID = $_GET['id'];
} 


?>

 <!-- content --> 

<!--    <div class="container-fluid">
        <div class="row">
            <div class="" style=" height: 500px; width: 100%; overflow: hidden">
                <img src="../img/circuitree.jpg" style="width: 100%;">
                
            </div>
            
        </div>
        
    </div>-->
 

<div class="container-fluid" style="padding-top: 50px;">
     <div class="row" style="//background: black">
         <div class="col-lg-8 col-lg-offset-2" >
             <section id="blogPosts" class="col-lg-8" style="padding: 20px;//background: blue">
                 <?php                 require_once './blogPosts.php'; ?>
            </section>

             <aside class="col-lg-4" style="padding-top: 20px;">
                 <div id="blogarchive" style="//border-left: 2px solid lightsalmon; padding-left: 20px;">
                     <h2 style="font-size: 30px; color: #999;">Blog Archive</h2>
                     <form id="blogArchiveForm" name="blogArchiveForm" method="post" action="blogPosts.php">
                         <select class="form-control" id="blogArchiveSelect" name="blogArchiveSelect">
                            <option value="-1">--</option>
                            <?php
                               $stmt = $db->query('SELECT date, COUNT(*) as count FROM blog_posts GROUP BY YEAR(date), MONTH(date) ORDER BY date DESC');
                               while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                   echo '<option value='.$row['date'].'>'.date("F, Y", strtotime($row['date'])).' ('.$row['count'].')</option>';
                               }
                            ?>

                        </select>
                     </form>
                 </div>
                 <div id="IPCposts" style="//border-left: 2px solid lightsalmon; padding-left: 20px;">
                     <h2 style="font-size: 30px; color: #999;">IPC.ORG</h2>
                     <?php
                        $IPC_posts = fetch_IPC_blog();
                        
                        foreach ($IPC_posts as $ipcpost) {
                     ?>
                     <style>
                         #links:hover {
                             text-decoration: underline;
                         }
                     </style>
                     <a id="links" style="color: darkslategrey;" href="<?php echo $ipcpost['link']; ?>" target="_blank" >
                        <h5 style="margin-bottom: 0;"><?php echo $ipcpost['title']; ?></h5>
                        <span style="font-size:12px; color:green; margin-top: -5px;"><?php echo substr($ipcpost['date'], 0, -15); ?></span> 
                     </a>
                     <?php
                        }
                     ?>
                 </div>
            </aside>
         </div>
     </div>
 </div>
<!-- -->

<script>
    $("#blogArchiveSelect").change( function () {
        var form = $('#blogArchiveForm');
        $(form).submit(function(event) {
            
            // Stop the browser from submitting the form.
            event.preventDefault();
            
        });
        var formData = $(form).serialize();
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
        .done(function(response) {
            $("#blogPosts").html(response);
        }) .fail(function(data) {
            
        });
       
    });
</script>




<!-- / -->
</div>
 
 
 <!-- /content -->
 <?php
require_once '../template/footer.php';