<?php
include 'header.php';
?>
<script type="text/javascript">
    $("#user").addClass("selected");
    function view_visit(id){
        $(".visit_details").hide();
        $("#visit_no"+id).show();
//        $("#visit_no"+id).css("display","block");
    }
</script>
<body>
    <div id="body">
        <div id="content">
            <div id="sidebar">
                <h3>Services</h3>
                <ul>

                    <li class="selected collapse">
                        <a href="user.php">User</a>
                        <ul>
                            <li class="">
                                <a href="user.php" >Profile</a>
                            </li>
                            <li class="active">
                                <a href="apointments.php" >Apointments</a>
                            </li>
                            <li>
                                <a href="login.php?logout=1" >Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="section">
                <h2>Welcome <?php echo $_SESSION['patientData']['name']; ?></h2>
                <p>Here you can change your information, view,edit or add new apointment.</p>
                <span class="actions"><a href="signup.php" class="btn btn-success-custom">Add New</a></span>
                <table id="visits" class="myTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Date-Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $perPage = 20;
                        $start = ($page - 1) * $perPage;
                        $limit = 'limit ' . $start . ',' . $perPage;
                        $fields = " p.name as p_name, p.fname as p_fname, d.name as d_name, d.fname as d_fname, v.* ";
                        $join = " p INNER JOIN `visits` v on p.id=v.patient_id INNER JOIN `doctors` d on d.id=v.doctor_id ";
//                        $where = " ";

                                $where = " WHERE p.id = " . $_SESSION['patientData']['id'];

                        $all_visits = getData('patients', $fields, $join, $where, $limit);
                        foreach ($all_visits as $visits) {
                            ?>
                            <tr id="visits_<?php echo $visits['id'] ?>">

                                <td><?php echo $visits['d_name']; ?></td>
                                <td><?php echo $visits['created_at']; ?></td>
                                <td id="visit_status_<?php echo $visits['id'] ?>"><?php echo $visits['status'] ?></td>
                                <td><a href="#visit_no<?php echo $visits['id'];?>" onclick="view_visit(<?php echo $visits['id']; ?>);">View</a></td>

                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
                <?php
                foreach ($all_visits as $visits) {
                            ?>
                <table class="visit_details" id="visit_no<?php echo $visits['id'];?>" style="display:none">
                    <tr>
                        <td class="left">Doctor Name</td>
                        <td class="right"><?php echo $visits['d_name'];?></td>
                    </tr>
                    <tr>
                        <td class="left">Symptoms</td>
                        <td class="right"><?php echo $visits['symptoms'];?></td>
                    </tr>
                    <tr>
                        <td class="left">Disease</td>
                        <td class="right"><?php echo $visits['disease'];?></td>
                    </tr>
                    <tr>
                        <td class="left">Prescription</td>
                        <td class="right"><?php echo $visits['prescription'];?></td>
                    </tr>
                    <tr>
                        <td class="left">Comments</td>
                        <td class="right"><?php echo $visits['comments'];?></td>
                    </tr>
                    <tr>
                        <td class="left">Date and Time</td>
                        <td class="right"><?php echo $visits['created_at'];?></td>
                    </tr>
                    <tr>
                        <td class="left">Status</td>
                        <td class="right"><?php echo $visits['status'];?></td>
                    </tr>
                </table>
                <?php } ?>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>