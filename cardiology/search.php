<?php
include 'header.php';
?>
<body>
    <div id="body">
        <div class="my-section">

            <?php
            if (isset($_POST['search'])) {
                $text = trim($_POST['disease']);
                if($text != ""){
                $queryDes = execute_query("select * from diseases where name like '%" . $text . "%'", TRUE);
                $queryDoc = execute_query("select * from doctors where name like '%" . $text . "%' or email like '%" . $text . "%' or address like '%" . $text . "%'", TRUE);
                ?>
                <div class="section">
                    <h2 class="srch-heading">diseases</h2>
                    <ul class="result_list">
                        <?php if (sizeof($queryDes) > 0) { ?> 

                            <?php
                            foreach ($queryDes as $disease) {
                                ?>
                                <li>
                                    <a href="diseases.php?des_id=<?php echo $disease['id']; ?>" class="link-left"><?php echo $disease['name']; ?></a>
                                    <a href="search.php?des_id=<?php echo $disease['id']; ?>" class="link-right">View Doctors</a>
                                </li>
                                <?php
                            }
                            ?>

                            <?php
                        } else {
                            ?>
                            <li>
                                <p class="link-left">No disease Found with this search.</p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <?php
                ?>
                <div class="section">
                    <h2 class="srch-heading">Doctors</h2>
                    <ul class="result_list">
                        <?php if (sizeof($queryDoc) > 0) { ?> 

                            <?php
                            foreach ($queryDoc as $doctor) {
                                ?>
                                <li>
                                    <a href="doctors.php?doc_id=<?php echo $doctor['id']; ?>" class="link-left"><?php echo $doctor['name']; ?></a>
                                    <a href="search.php?doc_id=<?php echo $doctor['id']; ?>" class="link-right">View diseases</a>
                                </li>
                                <?php
                            }
                            ?>

                            <?php
                        } else {
                            ?>
                            <li>
                                <p class="link-left">No Doctor Found with this search.</p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
                }
            }
            if (isset($_GET['des_id'])) {
                $des_id = $_GET['des_id'];
                $queryDoc = execute_query("select d.* from doctors d inner join doctor_disease dd on d.id=dd.doctor_id where dd.disease_id=" . $des_id, TRUE);
                ?>
                <div class="section">
                    <h2 class="srch-heading">Doctors</h2>
                    <ul class="result_list">
                        <?php if (sizeof($queryDoc) > 0) { ?> 

                            <?php
                            foreach ($queryDoc as $doctor) {
                                ?>
                                <li>
                                    <a href="doctors.php?doc_id=<?php echo $doctor['id']; ?>" class="link-left"><?php echo $doctor['name']; ?></a>
                                    <!--<a href="search.php?doc_id=<?php echo $doctor['id']; ?>" class="link-right">View diseases</a>-->
                                </li>
                                <?php
                            }
                            ?>

                            <?php
                        } else {
                            ?>
                            <li>
                                <p class="link-left">We are sory! This disease haven't assigned to any doctor yet.</p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            if (isset($_GET['doc_id'])) {
                $doc_id = $_GET['doc_id'];
                $queryDes = execute_query("select d.* from diseases d inner join doctor_disease dd on d.id=dd.disease_id where dd.doctor_id=" . $doc_id, TRUE);
                ?>
                <div class="section">
                    <h2 class="srch-heading">diseases</h2>
                    <ul class="result_list">
                        <?php if (sizeof($queryDes) > 0) { ?> 

                            <?php
                            foreach ($queryDes as $disease) {
                                ?>
                                <li>
                                    <a href="diseases.php?des_id=<?php echo $disease['id']; ?>" class="link-left"><?php echo $disease['name']; ?></a>
                                    <a href="search.php?des_id=<?php echo $disease['id']; ?>" class="link-right">View Doctors</a>
                                </li>
                                <?php
                            }
                            ?>

                            <?php
                        } else {
                            ?>
                            <li>
                                <p class="link-left">We are sory! This doctor haven't assigned any disease yet.</p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>        