<?php
include 'header.php';
if (!adminLogin() && !doctorLogin()) {
    echo '<script type=text/javascript> location.href = "logout.php" </script>';
    exit;
}
if (doctorLogin()) {
    $doctor_id = $_SESSION['userData']['id'];
}
include 'sidebar.php';
if (isset($_POST['save'])) {
    $visits_data = array();
    $visits_data = $_POST;
    unset($visits_data['save']);
    $errors = 0;
//    prnt($visits_data);
    if (!$errors) {
        if (isset($_GET['id'])) {
            updateData('visits', $visits_data, ' where id = ' . $_GET['id']);
            $message = "your data is updated Successfully";
        } else {
            insertData('visits', $visits_data);
            $message = "your data is saved Successfully";
        }
    }
}
if (!adminLogin() && !doctorLogin()) {
    echo '<script type=text/javascript> location.href = "logout.php" </script>';
    exit;
}
if (doctorLogin()) {
    $doctor_id = $_SESSION['userData']['id'];
}
if (isset($_GET['id'])) {
    if (doctorLogin()) {
        $visits = getData('visits', '*', 'where id = ' . $_GET["id"] . ' and doctor_id=' . $doctor_id);
    } else {
        $visits = getData('visits', '*', 'where id = ' . $_GET["id"]);
    }

    $visits = $visits[0];
//    prnt($visits);
}
?>
<script type="text/javascript">
    $("#view_patients").addClass("active");
	$(document).ready(function () {
        document.title = "Add/Edit Visits: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Visits</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_visits.php<?php echo isset($_GET['doc_id']) ? '?doc_id=' . $_GET['doc_id'] : ''; ?>">Visits</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <form class="" method="post">
                    <?php if (isset($message)) { ?>
                        <div class="col-lg-6 action-info">
                            <?php echo $message; ?>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                    <div class="form-group col-lg-6">
                        <label>Doctor</label>
                        <select class="form-control" name="doctor_id">
                            <?php
                            if (doctorLogin()) {
                                $doctors = getData('doctors', '*', ' where id = ' . $doctor_id);
                            } else {
                                $doctors = getData('doctors');
                            }

                            foreach ($doctors as $doctor) {
                                ?>
                                <option value="<?php echo $doctor['id']; ?>" 
                                <?php
                                if (isset($visits['doctor_id']) && $visits['doctor_id'] == $doctor['id']) {
                                    echo 'selected';
                                }
                                ?>
                                        ><?php echo $doctor['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Patients</label>
                        <select class="form-control" name="patient_id">
                            <?php
                            if (doctorLogin()) {
                                $patients = getData('patients',' * ', ' where user_id = '.$doctor_id);
                            } else {
                                $patients = getData('patients');
                            }

                            foreach ($patients as $patient) {
                                ?>
                                <option value="<?php echo $patient['id']; ?>" 
                                <?php
                                if (isset($visits['patient_id']) && $visits['patient_id'] == $patient['id']) {
                                    echo 'selected';
                                }
                                ?>
                                        ><?php echo $patient['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Symptoms</label>
                        <input type="text" name="symptoms" value="<?php
                        if (isset($visits['symptoms'])) {
                            echo $visits['symptoms'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>disease</label>
                        <input type="text" name="disease" value="<?php
                        if (isset($visits['disease'])) {
                            echo $visits['disease'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Prescription</label>
                        <textarea name="prescription"  rows="3" class="form-control"><?php if (isset($visits['prescription'])) {echo $visits['prescription'];}?></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Comments</label>
                        <textarea name="comments"  rows="3" class="form-control"><?php
                            if (isset($visits['comments'])) {
                                echo $visits['comments'];
                            }
                            ?></textarea>
                    </div>

                    <div class="form-action col-lg-12">
                        <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>