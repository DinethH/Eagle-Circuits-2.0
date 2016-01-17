<?php
    if (isset($_POST['blogArchiveSelect'])) {
        $date = $_POST['blogArchiveSelect'];
        require_once '../includes/config.php';
        require_once '../includes/functions.php';
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));
        $stmt = $db->query("SELECT * FROM blog_posts WHERE YEAR(date) = $year AND MONTH(date) = $month");
        
        if ($_POST['blogArchiveSelect'] == -1) {
            $stmt = $db->query('SELECT * FROM blog_posts ORDER BY date DESC LIMIT 10');
        }
    } else if (isset($postID)) {
        $stmt = $db->query("SELECT * FROM blog_posts WHERE ID = $postID");
    } else {
        $stmt = $db->query('SELECT * FROM blog_posts ORDER BY date DESC LIMIT 10 ');
    }
    
                    $count = 0;
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                 <article>
                     <h2 style="text-transform: uppercase;"><a style="color: #333333" href="post.php?id=<?php echo $row['ID']; ?>"><?php echo $row['title']; ?></a></h2>
                     <span style="font-size: 14px; color: orange; letter-spacing: 0.2em"><span class="glyphicon glyphicon-user"></span><?php echo '<strong>'.$row['poster'].'</strong>'; ?> | <span class="glyphicon glyphicon-time"></span> <?php echo dateInUS($row['date']); ?>
                    <?php
                                if (!isset($postID)) {
                                ?>
                         | <span class="glyphicon glyphicon-comment"></span>  <a style="color: orange" href="post.php?id=<?php echo $row['ID']; ?>#disqus_thread"> </a>
                                <?php
                                }
                                ?>
                    </span>
                    
                    <?php
                        if (strlen($row['img1']) > 0) {
                    ?>
                        <div style="padding-top: 10px;">
                            <img src="../img/blog/<?php echo $row['img1']; ?>" style="width: 100%">
                        </div>
                    <?php
                        }
                    ?>
                 
                    <p style="padding-top: 10px;">
                        <?php 
                        if (str_word_count($row['long_desc']) < $blogWordLimit) {
                            echo $row['long_desc'];
                        } else if ((str_word_count($row['long_desc']) < $blogWordLimit + 50) && (str_word_count($row['long_desc'])-50) < 50 ) {
                            echo $row['long_desc'];
                        } else if (isset ($postID)) {
                            echo $row['long_desc'];
                        } else {
                            echo limit_words($row['long_desc'], $blogWordLimit); ?>
                                <a style="color: #333333" href="post.php?id=<?php echo $row['ID']; ?> ">                                                   
                                <?php echo ' [..]</a>'; 
                        }
                        
                        ?>
                    </p>
                    
                    <div class="shareButtons">
                        <table style="width: 100%">
                            <tr>
                                
                                
                                <td style="width: 100%"></td>
                                <td style="width: 32px;"><a href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['REQUEST_URI']; ?>&t=<?php echo $row['title']; ?>&p[images][0]=' + encodeURIComponent('http://idineth.com/eagle-circuits-2.0/img/blog/<?php echo $row['img1']; ?>')" onclick="
    window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;" class="btnShare"><img width="32" src="../img/facebook500.png"></a></td>
                                <td style="width: 32px; padding-left: 10px;"><a href="https://plus.google.com/share?url=<?php echo $_SERVER['REQUEST_URI']; ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img width="32" src="../img/googleplus-revised.png"></a></td>
                                <td style="width: 32px; padding-left: 10px;"><a href="https://twitter.com/share?url=<?php echo $_SERVER['REQUEST_URI']; ?>&text=<?php echo $row['title']; ?>"><img width="32" src="../img/twitter.png"></a></td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php $count++; if ($stmt->rowCount() != $count) echo '<hr>'; ?>
                    
                    
                    
                 </article>

                 <!-- comments -->
                    <?php
                        if (isset($postID)) {
                    ?>
                 <hr>
                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                        var disqus_shortname = 'eaglecircuits2'; // required: replace example with your forum shortname

                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function() {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    <?php
                        }
                    ?>
                    <!-- /comments -->
                 <?php
                    }
                 ?>

  