<?php
include 'header.php';
?>
<script type="text/javascript">
    $("#doctors").addClass("selected");
</script>
<body>
    <div id="body">
        <?php
        if (isset($_GET['doc_id'])) {
            $doctorData = getData('doctors', '*', 'where id = \'' . $_GET['doc_id'] . '\'')[0];
            ?>
            <div class="my-section">

                <div class="data">

                    <div class="image">
                        <div class="prof-image">
                            <img src="images/uploads/<?php echo $doctorData['image']; ?>">
                        </div>
                    </div>
                    <div class="basic">
                        <div class="basic-data">
                            <h1><?php echo $doctorData['name']; ?></h1>
                            <b><?php echo $doctorData['speciality']; ?></b> - 
                            <b><?php echo $doctorData['designation']; ?></b><br>
                            <span><?php echo $doctorData['qualification']; ?></span> -  
                            <span><?php echo $doctorData['institute']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="data-bottom">
                    <div class="data-item">
						<a href="search.php?doc_id=<?php echo $doctorData['id'];?>" class="more" style="float: right;margin: 0px 10px;">View diseases</a>
      
						<a href="signup.php?doc_id=<?php echo $doctorData['id'];?>" class="more" style="float: right;margin: 0 10px;">Get Appointment</a>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Speciality:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['speciality']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Desigination:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['designation']; ?>
                        </div>
                    </div><div class="data-item">
                        <div class="data-left">
                            <b>
                                Qualification:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['qualification']; ?>
                        </div>
                    </div><div class="data-item">
                        <div class="data-left">
                            <b>
                                Institute:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['institute']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Father Name:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['fname']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Email:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['email']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Mobile:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['mobile']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Address:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['address']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Gender:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['gender'] == 'f%' ? 'Female' : 'Male'; ?>
                        </div>
                    </div>

                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Description:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['comments']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Facebook:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['facebook']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                LinkedIn:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['linkedin']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Twitter:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $doctorData['twitter']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } elseif (isset($_GET['nurse_id'])) {
            $nurseData = getData('nurses', '*', 'where id = \'' . $_GET['nurse_id'] . '\'')[0];
            ?>
            <div class="my-section">

                <div class="data">

                    <div class="image">
                        <div class="prof-image">
                            <img src="images/uploads/<?php echo $nurseData['image']; ?>">
                        </div>
                    </div>
                    <div class="basic">
                        <div class="basic-data">
                            <h1><?php echo $nurseData['name']; ?></h1>
                            <b><?php echo $nurseData['speciality']; ?></b> - 
                            <b><?php echo $nurseData['designation']; ?></b><br>
                            <span><?php echo $nurseData['qualification']; ?></span> -  
                            <span><?php echo $nurseData['institute']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="data-bottom">
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Speciality:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['speciality']; ?>
                        </div>
                    </div><div class="data-item">
                        <div class="data-left">
                            <b>
                                Desigination:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['designation']; ?>
                        </div>
                    </div><div class="data-item">
                        <div class="data-left">
                            <b>
                                Qualification:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['qualification']; ?>
                        </div>
                    </div><div class="data-item">
                        <div class="data-left">
                            <b>
                                Institute:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['institute']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Father Name:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['fname']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Email:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['email']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Mobile:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['mobile']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Address:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['address']; ?>
                        </div>
                    </div>
                    

                    
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Gender:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['gender'] == 'f' || $nurseData['gender'] == 'female' ? 'Female' : 'Male'; ?>
                        </div>
                    </div>

                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Description:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['comments']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Facebook:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['facebook']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                LinkedIn:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['linkedin']; ?>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-left">
                            <b>
                                Twitter:
                            </b>
                        </div>
                        <div class="data-right">
                            <?php echo $nurseData['twitter']; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>        
            <div class="section">
                <h2><?php echo $data[7]['name']; ?></h2>
                <p>
                    <?php echo $data[7]['value']; ?>
                </p>
                <?php
                $doctors = getData('doctors');
                ?>
                <ul class="article">
                    <ul class="article">
                        <?php
                        foreach ($doctors as $doctor) {
                            if ($doctor['image'] == '') {
                                $doctor['image'] = 'doctor.jpg';
                            }
                            ?>
                            <li>
                                <img src="images/uploads/<?php echo $doctor['image']; ?>" alt=""> <b><a href="doctors.php?doc_id=<?php echo $doctor['id']; ?>">Dr. <?php echo $doctor['name']; ?></a></b> <small><?php echo $doctor['designation']; ?></small>
                                <p>
                                    <?php echo substr($doctor['comments'], 0, 220); ?>...
                                </p>
                                <span><a href="<?php echo $doctor['facebook']; ?>" class="facebook">facebook</a><a href="<?php echo $doctor['twitter']; ?>" class="twitter">twitter</a><a href="#" class="linkedIn">linkedin</a><a href="<?php echo $doctor['linkedin']; ?>" class="email">email</a></span>
                            </li>
                        <?php } ?>
                    </ul>
            </div>
            <div class="section nurses">
                <h2><?php echo $data[8]['name']; ?></h2>
                <p>
                    <?php echo $data[8]['value']; ?>
                </p>
                <?php
                $nurses = getData('nurses');
                ?>
                <ul>
                    <?php foreach ($nurses as $nurse) { ?>
                        <li>
                            <a href="doctors.php?nurse_id=<?php echo $nurse['id']; ?>"><img src="images/uploads/<?php echo $nurse['image']; ?>" alt=""><?php echo $nurse['name']; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>