
<?php

require_once '../template/header.php';

?>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtfOB6Kj2PP4aGVMrGzHd1LH5U8GC1vr4&sensor=false">
</script>
<script type="text/javascript">
	function initialize() {
	  var myLatlng = new google.maps.LatLng(32.725502,-97.10966);
	  var mapOptions = {
		zoom: 16,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  }
	  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
	  var marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  title: 'Eagle Circuits'
	  });
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);

</script>
<script type="text/javascript">
	function initialize() {
	  var myLatlng = new google.maps.LatLng(32.725502,-97.10966);
	  var mapOptions = {
		zoom: 16,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  }
	  var map = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
	
	  var marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  title: 'Eagle Circuits'
	  });
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);

</script>
 <!-- content --> 

    <div class="">
        <div class="row" style="">
            <div class="visible-lg" style=" height: 600px; width: 100%; overflow: hidden">
<!--                <img src="../img/house.jpg" style="width: 100%">-->
                    <div id="map-canvas" style="width:100%; height:100%" class=""></div>
            </div>
            <div class="hidden-lg" style=" height: 300px; width: 100%; overflow: hidden">
<!--                <img src="../img/house.jpg" style="width: 100%">-->
                    <div id="map-canvas2" style="width:100%; height:100%" class=""></div>
            </div>
            
        </div>
        
    </div>
<div style="background: #f0f3ff;" class="row">
    <div class="col-md-6 col-md-offset-3 row" style="padding-top: 20px; padding-bottom: 20px; ">
        <h3 style="line-height: 36px;">Thank you for your interest in Eagle Circuits, the leader in high-quality, quick-turn PCB manufacturing. Please fill in the forms below and we will promptly respond to your request.
              </h3>  
    </div>
</div>
 <div class="container-fluid inner-content">
     
     <div class="row">
         
         <div class="col-md-6 col-md-offset-3" >
             
             
             <div class="col-md-8" >
                 
                 
                 <div class="hidden-lg hidden-md hidden-sm" >
                
                            <div style="line-height:26px;">
                                <address>10820 Sanden Drive <br>
                                    Dallas, Texas  75238</address>
                                <span>
                                    Phone: <span id="gc-number-0" class="gc-cs-link" ><a href="tel:+12143490288">214.349.0288</a></span></span><br><span>
                                Fax: <span id="gc-number-1" class="gc-cs-link">214.349.1210</span></span><br>
                                <a href="mailto:rfq@eagle-circuits.com">rfq@eagle-circuits.com</a><br>
                                <a href="http://www.eagle-circuits.com">www.eagle-circuits.com</a>
                                <hr>
                                
                            </div>
             </div>
                 <br>
                 
                 <div id="contactAlert" class="alert alert-danger" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    
                </div>
                 <form role="form" id="commentForm" name="commentForm" method="post" action="../includes/mailer.php">
                     <div class="row">
                        <div class="form-group col-lg-5">
                           <label for="inputTopic">Choose Topic:</label>
                           <select name="inputTopic" id="inputTopic" class="form-control" >
                               <option value="Customer Service Issue">Customer Service Issue</option>
                               <option value="Feedback">Feedback</option>
                               <option value="Technical Issue">Technical Issue</option>
                               <option value="Other">Other</option>
                            </select>
                        </div>
                     </div>
                     <div class="row">
                     
                            <div id="inputNameGroup" class="form-group col-lg-7">
                           <label for="inputName">Name</label>
                           <input name="inputName" type="text" class="form-control" id="inputName" placeholder="" required="">
                            </div>
                     </div>
                     <div class="row">
                       
                            <div class="form-group col-lg-7">
                           <label for="inputCompany">Company</label>
                           <input name="inputCompany" type="text" class="form-control" id="inputCompany" placeholder="" >
                         </div>
                     </div>
                      <div class="row">
                            <div id="inputEmailGroup" class="form-group col-lg-7">
                           <label for="inputEmail">Email address</label>
                           <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="" required="">
                         </div>
                      </div>
                      <div class="row">
                            <div class="form-group col-lg-7">
                           <label for="inputPhone">Phone</label>
                           <input name="inputPhone" type="text" class="form-control" id="inputPhone" placeholder="" >
                         </div>
                      </div>
                      <div class="row">
                            <div id="inputCommentsGroup" class="form-group col-lg-8">
                                <label for="inputComments">Comments</label>
                                <textarea name="inputComments" id="inputComments" class="form-control" rows="6" required=""></textarea>
                            </div>
                      </div>
                  
                  
                  
                     <button id="formSubmitButton" type="submit" class="btn btn-warning">Submit</button>
                </form>
                 
                 <div id="form-messages" style="display: none"></div>
                 <script>
                     $("#formSubmitButton").click( function () {
                        var name = $("#inputName").val();
                        var email = $("#inputEmail").val();
                        var comments = $("#inputComments").val();
                        
                        if (name.length < 2) {
                          $("#inputNameGroup").addClass("has-error");  
                        } else {
                          $("#inputNameGroup").removeClass("has-error") ;
                        }
                        if (email.length < 2) {
                          $("#inputEmailGroup").addClass("has-error");  
                        } else {
                          $("#inputEmailGroup").removeClass("has-error") ;
                        }
                        if (comments.length < 2) {
                          $("#inputCommentsGroup").addClass("has-error");  
                        } else {
                          $("#inputCommentsGroup").removeClass("has-error") ;
                        }
                        
                        if (name.length > 2 && email.length > 2 && comments.length > 2) {
                            $(function() {
                            // Get the form.
                            var form = $('#commentForm');

                            // Get the messages div.
                            var formMessages = $('#form-messages');

                            // TODO: The rest of the code will go here..
                                // Set up an event listener for the contact form.
                                $(form).submit(function(event) {
                                        // Stop the browser from submitting the form.
                                        event.preventDefault();

                                        // TODO
                                });
                                // Serialize the form data.
                                var formData = $(form).serialize();

                            // Submit the form using AJAX.
                            $.ajax({
                                type: 'POST',
                                url: $(form).attr('action'),
                                data: formData
                            })
                            .done(function(response) {
                                // Make sure that the formMessages div has the 'success' class.
                                $("#contactAlert").removeClass('alert-danger');
                                $("#contactAlert").addClass('alert-success');
                                $("#contactAlert").text("Your message has been sent!");
                                $("#contactAlert").slideDown();

                                // Set the message text.
                                $(formMessages).text(response);

                                // Clear the form.
                                $('#inputName').val('');
                                $('#inputEmail').val('');
                                $('#inputComments').val('');
                                $('#inputCompany').val('');
                                $('#inputPhone').val('');
                            })

                            .fail(function(data) {
                                // Make sure that the formMessages div has the 'error' class.
                                $("#contactAlert").removeClass('alert-success');
                                $("#contactAlert").addClass('alert-danger');
                                $("#contactAlert").text("Something went wrong! Try again.");
                                $("#contactAlert").slideDown();

                                // Set the message text.
                                if (data.responseText !== '') {
                                    $(formMessages).text(data.responseText);
                                } else {
                                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                                }
                            });

                        });
                        
                        };
                        //return false;
                       
                     });


                 </script>
                 
           <div class="hidden-md hidden-sm hidden-lg">
                 <hr>
                 <p>If you are looking for a turnkey solution to your design, fabrication and assembly needs, contact OneSource at:</p>
                                <p><strong>One Source Group</strong> <br><span>
Phone: <span id="gc-number-2" class="gc-cs-link" title="Call with Google Voice">214.349.0288</span></span><br><span>
Fax:  <span id="gc-number-3" class="gc-cs-link" title="Call with Google Voice">214.349.1210</span></span><br>
10820 Sanden Drive<br>
Dallas, Texas 75238<br>
<a href="mailto:rfq@onesource-group.com">rfq@onesource-group.com</a><br>
<a href="http://www.onesource-group.com">www.onesource-group.com</a></p>
             </div>                
                 
             </div>
   
             
             <div class="col-md-4 visible-lg visible-md" style="padding-top: 20px;">
<!--                 <div id="map-canvas" style="width:100%; height:500px;" class=""></div>-->
                            <div style="line-height:26px;">
                                <address>10820 Sanden Drive <br>
                                    Dallas, Texas  75238</address>
                                <span>
                                    Phone: <span id="gc-number-0" class="gc-cs-link" ><a href="tel:+12143490288">214.349.0288</a></span></span><br><span>
                                Fax: <span id="gc-number-1" class="gc-cs-link">214.349.1210</span></span><br>
                                <a href="mailto:rfq@eagle-circuits.com">rfq@eagle-circuits.com</a><br>
                                <a href="http://www.eagle-circuits.com">www.eagle-circuits.com</a>
                                <hr>
                                <p>If you are looking for a turnkey solution to your design, fabrication and assembly needs, contact OneSource at:</p>
                                <p><strong>One Source Group</strong> <br><span>
Phone: <span id="gc-number-2" class="gc-cs-link" title="Call with Google Voice">214.349.0288</span></span><br><span>
Fax:  <span id="gc-number-3" class="gc-cs-link" title="Call with Google Voice">214.349.1210</span></span><br>
10820 Sanden Drive<br>
Dallas, Texas 75238<br>
<a href="mailto:rfq@onesource-group.com">rfq@onesource-group.com</a><br>
<a href="http://www.onesource-group.com">www.onesource-group.com</a></p>
                            </div>
             </div>
         </div>
     </div>
     <br>
 </div>
 
 
 
 <!-- /content -->
 <?php
require_once '../template/footer.php';