<?php
include 'header.php';
$departments = getData('departments');
?>
<script type="text/javascript">
 $("#departments").addClass("selected");
</script>
<body>
    <div id="body">
        <div id="content">
            <div id="sidebar">
                <h3>Departments</h3>
                <ul>

                    <li class="selected collapse">
                        <a href="departments.php"><?php echo $data[13]['name']; ?></a>
                        <ul>
                            <?php foreach ($departments as $department) { 
                                if(isset($_GET['did']) && $_GET['did']==$department['id']){
                                    $pageDepartment = $department;
                                }
                                ?>
                                <li class="<?php echo isset($_GET['did']) &&$_GET['did']==$department['id']?'active':''; ?>">
                                    <a href="departments.php?did=<?php echo $department['id']; ?>" ><?php echo $department['name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="section" class="departments">
                <?php
                if (isset($_GET['did'])) { ?>
                <h3><?php echo $pageDepartment['name']; ?></h3>
                <img src="images/uploads/<?php echo $pageDepartment['image']!=''?$pageDepartment['image']:'department.jpg'; ?>" alt="">
                <p>
                    <?php echo $pageDepartment['description']; ?>
                </p>
                <?php
                } else {
                    ?>
                    <h2><?php echo $data[13]['name']; ?></h2>
                    <p>
                        <?php echo $data[13]['value']; ?>
                    </p>
                    <ul>
                        <?php foreach ($departments as $department) { ?>
                            <li>
                                <a href="departments.php?did=<?php echo $department['id']; ?>" class="figure"><img src="images/uploads/<?php echo $department['image'] != '' ? $department['image'] : 'department.jpg'; ?>" alt=""></a>
                                <div>
                                    <h3><a href="departments.php?did=<?php echo $department['id']; ?>"><?php echo $department['name']; ?></a></h3>
                                    <p>
                                        <?php echo substr($department['description'], 0, 140) ?>...
                                    </p>
                                    <a href="departments.php?did=<?php echo $department['id']; ?>" class="more">more info</a>
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