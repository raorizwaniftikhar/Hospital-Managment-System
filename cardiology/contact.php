<?php
include 'header.php';
if(isset($_POST['send'])){
    $msg['name'] = $_POST['fname'];
    $msg['email'] = $_POST['email'];
    $msg['message'] = $_POST['message'];
    insertData('messages', $msg);
    $flag = TRUE;
}
?>
<script type="text/javascript">
 $("#contact").addClass("selected");
</script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(30.2700699,71.5066266),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<body>
    <div id="body">
        <div class="content">
            <div id="section">
                <h2>contact us</h2>
                <img src="images/uploads/<?php echo $data[11]['image']; ?>" alt="">
                <form action="" method="post">
                    <b>send us a message</b>
                    <h4>
                    <?php if(isset($flag)){ ?>
                    Your message sent successfully!
                    <?php } ?>
                    </h4>
                    <input type="text" name="fname" id="fname" value="" placeholder="Your Name" required="">
                    <input type="email" name="email" id="email" value="" placeholder="Your Email" required="">
                    <textarea name="message" id="message" cols="30" rows="10" required=""></textarea>
                    <input type="submit" name="send" id="send" value="send message">
                </form>
                <br>
                <hr>
                <b><a href="#">visit us</a></b> 
                
                <div id="map" style="width: 570px;height:275px;margin: 20px 0px"></div>
            </div>
            <div id="sidebar">
                <div class="search">
                    <h3>search</h3>
                    <form action="index.php">
                        <input type="text" name="search" id="search" placeholder="Search here...">
                        <input type="hidden" name="submit" id="submitBtn" value="">
                    </form>
                </div>
                <div class="contact">
                    <h3>contact information</h3>
                    <ul class="first">
                        <li class="office">
                            <b><?php echo $data[9]['comments']; ?></b><span><?php echo $data[9]['value']; ?></span>
                        </li>
                        <li class="telephone">
                            <?php echo $data[2]['value']; ?>
                        </li>
<!--                        <li class="telephone">
                            <?php echo $data[3]['value']; ?>
                        </li>-->
                        <li class="email">
                            <a href="javascript:void(0);"><?php echo $data[10]['value']; ?></a>
                        </li>
                    </ul>
                    
                <div>
                    <h3>office hours:</h3>
                    <span>Monday - Friday <span>7:00 a.m. - 4:30 p.m.</span></span> <span>Saturdays &amp; Sundays <span>7:00 a.m. - 12:00 p.m.</span></span>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>