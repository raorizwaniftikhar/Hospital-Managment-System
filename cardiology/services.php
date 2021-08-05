<?php
include 'header.php';
$services = getData('services');
?>
<script type="text/javascript">
 $("#services").addClass("selected");
</script>
<body>
    <div id="body">
        <div id="content">
            <div id="sidebar">
                <h3>Services</h3>
                <ul>

                    <li class="selected collapse">
                        <a href="services.php"><?php echo $data[12]['name']; ?></a>
                        <ul>
                            <?php foreach ($services as $service) { 
                                if(isset($_GET['sid']) && $_GET['sid']==$service['id']){
                                    $pageService = $service;
                                }
                                ?>
                                <li class="<?php echo isset($_GET['sid']) &&$_GET['sid']==$service['id']?'active':''; ?>">
                                    <a href="services.php?sid=<?php echo $service['id']; ?>" ><?php echo $service['name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="section" class="services">
                <?php
                if (isset($_GET['sid'])) { ?>
                <h3><?php echo $pageService['name']; ?></h3>
                <img src="images/uploads/<?php echo $pageService['image']!=''?$pageService['image']:'service.jpg'; ?>" alt="">
                <p>
                    <?php echo $pageService['description']; ?>
                </p>
                <?php
                } else {
                    ?>
                    <h2><?php echo $data[12]['name']; ?></h2>
                    <p>
                        <?php echo $data[12]['value']; ?>
                    </p>
                    <ul>
                        <?php foreach ($services as $service) { ?>
                            <li>
                                <a href="services.php?sid=<?php echo $service['id']; ?>" class="figure"><img src="images/uploads/<?php echo $service['image'] != '' ? $service['image'] : 'service.jpg'; ?>" alt=""></a>
                                <div>
                                    <h3><a href="services.php?sid=<?php echo $service['id']; ?>"><?php echo $service['name']; ?></a></h3>
                                    <p>
                                        <?php echo substr($service['description'], 0, 140) ?>...
                                    </p>
                                    <a href="services.php?sid=<?php echo $service['id']; ?>" class="more">more info</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>