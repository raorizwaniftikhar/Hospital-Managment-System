<?php
include 'header.php';
?>
<script type="text/javascript">
 $("#home").addClass("selected");
</script>
<div id="body">
    <div class="header">
        <div>
			<?php include 'slider.php'; ?>
            <!--<img src="images/cardiology.png" alt="">-->
            <ul>
                <li>
                    <a href="about.php">we truly care</a>
                </li>
                <li>
                    <a href="departments.php">modern equipment</a>
                </li>
                <li>
                    <a href="doctors.php">highly trained proffesionals</a>
                </li>
                <li>
                    <a href="services.php">fast and accurate services</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="body">
        <div class="section">
            <div class="article">
                <h2><?php echo $data[4]['name']; ?></h2>
                <!--<img src="images/uploads/<?php echo $data[4]['image']; ?>" alt="">-->
                <p>
                    <?php echo $data[4]['value']; ?>
                </p>
            </div>
            <div class="aside">
                <b><?php echo $data[0]['name']; ?></b>
                <p>
                    <?php echo $data[0]['value']; ?>
                </p>
                <a href="#">Dr. Haider Zaman</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <div>
            <a href="doctors.php"><img src="images/doctors.jpg" alt=""></a>
            <h3>our doctors</h3>
            <p>
                <?php echo substr($data[7]['value'],0,120).'...'; ?>
            </p>
        </div>
        <div>
            <a href="services.php"><img src="images/what-can-we-do.jpg" alt=""></a>
            <h3>what we can do for you</h3>
            <p>
                <?php echo substr($data[12]['value'],0,120).'...'; ?>
            </p>
        </div>
        <div>
            <a href="contact.php"><img src="images/where-you-can-find.jpg" alt=""></a>
            <h3>where you can find us</h3>
            <p>
                <?php echo substr($data[9]['value'],0,120); ?>
            </p>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>