<?php
include 'header.php';
$diseases = getData('diseases');
?>
<script type="text/javascript">
    $("#diseases").addClass("selected");
</script>
<body>
    <div id="body">
        <div id="content">
            <div id="sidebar">
                <h3>diseases</h3>
                <ul>

                    <li class="selected collapse">
                        <a href="diseases.php"><?php echo $data[14]['name']; ?></a>
                        <ul>
                            <?php
                            foreach ($diseases as $disease) {
                                if (isset($_GET['des_id']) && $_GET['des_id'] == $disease['id']) {
                                    $pagedisease = $disease;
                                }
                                ?>
                                <li class="<?php echo isset($_GET['des_id']) && $_GET['des_id'] == $disease['id'] ? 'active' : ''; ?>">
                                    <a href="diseases.php?des_id=<?php echo $disease['id']; ?>" ><?php echo $disease['name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="section" class="diseases">
                <?php if (isset($_GET['des_id'])) { ?>
                    <h3><?php echo $pagedisease['name']; ?></h3>
                    <img src="images/uploads/<?php echo $pagedisease['image'] != '' ? $pagedisease['image'] : 'disease.jpg'; ?>" alt="">
                    <p>
                        <?php echo $pagedisease['description']; ?>
                    </p>
                    <a href="search.php?des_id=<?php echo $_GET['des_id']; ?>" class="more">Find Doctors</a>

                    <?php
                } else {
                    ?>
                    <h2><?php echo $data[14]['name']; ?></h2>
                    <p>
                        <?php echo $data[14]['value']; ?>
                    </p>
                    <ul>
                        <?php foreach ($diseases as $disease) { ?>
                            <li>
                                <a href="diseases.php?des_id=<?php echo $disease['id']; ?>" class="figure"><img src="images/uploads/<?php echo $disease['image'] != '' ? $disease['image'] : 'disease.jpg'; ?>" alt=""></a>
                                <div>
                                    <h3><a href="diseases.php?des_id=<?php echo $disease['id']; ?>"><?php echo $disease['name']; ?></a></h3>
                                    <p>
                                        <?php echo substr($disease['description'], 0, 140) ?>...
                                    </p>
                                    <a href="diseases.php?des_id=<?php echo $disease['id']; ?>" class="more">more info</a>
                                    <a href="search.php?des_id=<?php echo $disease['id']; ?>" class="more">find doctors</a>
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