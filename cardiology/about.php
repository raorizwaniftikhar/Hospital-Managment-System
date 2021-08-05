<?php
include 'header.php';
?>
<script type="text/javascript">
 $("#about").addClass("selected");
</script>
<body>
    <div id="body">
        <div class="content">
            <div id="section">
                <h2><?php echo $data[1]['name']; ?></h2>
                    <p>
                        <?php echo $data[1]['value']; ?>
                    </p>
                    <img src="images/uploads/<?php echo $data[1]['image']; ?>" alt="">
                    <p>
                        <?php echo $data[5]['value']; ?>
                    </p>
                    
            </div>
            <div id="sidebar">
                <div class="search">
                    <h3>search</h3>
                    <form action="index.php">
                        <input type="text" name="search" id="search" placeholder="Search here...">
                        <input type="hidden" name="submit" id="submitBtn" value="">
                    </form>
                </div>
                <div class="testimonials">
                    <h3>patient's testimonials</h3>
                    <ul>
                        <li>
                            <p>
                                <?php echo $data[6]['value']; ?>
                            </p>
                            <a href="#" ><?php echo $data[6]['name']; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="awards">
                    <h3>awards</h3>
                    <a href="#" class="first"><img src="images/award.jpg" alt=""></a> <a href="#"><img src="images/award2.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>