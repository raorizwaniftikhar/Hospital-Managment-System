<?php
include 'header.php';
if (!adminLogin() && !doctorLogin()) {
	echo '<script type=text/javascript> location.href = "logout.php" </script>';
	exit;
}
include 'sidebar.php';
if (isset($_POST['save'])) {
	$patients_data = array();
	$patients_data = $_POST;
	unset($patients_data['gender']);
	unset($patients_data['save']);
	$errors = 0;
	$patients_data['gender'] = $_POST['gender'][0];
//    prnt($patients_data);
	if (isset($_GET['id'])) {
		if (isset($patients_data['email']) && !valid_email($patients_data['email'], 'patients', $_GET['id'])) {
			$message = 'This Email is already in use.';
			$errors = 1;
		}
	} else {
		if (isset($patients_data['email']) && !valid_email($patients_data['email'], 'patients')) {
			$message = 'This Email is already in use.';
			$errors = 1;
		}
	}
	if (!$errors) {
		if (doctorLogin()) {
			$patients_data['user_id'] = $_SESSION['userData']['id'];
		}
		if (isset($_GET['id'])) {

			updateData('patients', $patients_data, ' where id = ' . $_GET['id']);
			$message = "your data is updated Successfully";
		} else {

			insertData('patients', $patients_data);
			$message = "your data is saved Successfully";
		}
	}
}
if (isset($_GET['id'])) {
	$patients = getData('patients', '*', 'where id = ' . $_GET["id"]);
	$patients = $patients[0];
//    prnt($patients);
}
?>
<script type="text/javascript">
    $("#view_patients").addClass("active");
	$(document).ready(function () {
        document.title = "Add/Edit Patients: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Patients</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_patients.php">Patients</a></li>
        </ul>
    </div>
    <div class="main-content">
		<?php // echo isset($errors)?'<span class="error-text" >'.$errors.'</span>':'';  ?>
        <div class="row">
            <div class="col-md-12">
                <form class="" method="post" enctype="multipart/form-data">
					<?php if (isset($message)) { ?>
						<div class="col-lg-6 action-info">
							<?php echo $message; ?>
						</div>
						<div class="clearfix"></div>
					<?php } ?>
                    <div class="form-group col-lg-6">
                        <label>Name</label>
                        <input type="text" value="<?php
						if (isset($patients['name'])) {
							echo $patients['name'];
						}
						?>" class="form-control" name="name">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Father Name</label>
                        <input type="text" name="fname" value="<?php
						if (isset($patients['fname'])) {
							echo $patients['fname'];
						}
						?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php
						if (isset($patients['email'])) {
							echo $patients['email'];
						}
						?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Phone</label>
                        <input type="tel" name="phone" value="<?php
						if (isset($patients['phone'])) {
							echo $patients['phone'];
						}
						?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Mobile</label>
                        <input type="tel" name="mobile" value="<?php
						if (isset($patients['mobile'])) {
							echo $patients['mobile'];
						}
						?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>CNIC</label>
                        <input type="tel" name="cnic" value="<?php
						if (isset($patients['cnic'])) {
							echo $patients['cnic'];
						}
						?>" class="form-control">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>City</label>
                        <input type="text" name="city" value="<?php
						if (isset($patients['city'])) {
							echo $patients['city'];
						}
						?>" class="form-control">
                    </div>

                    <div class="form-group col-lg-6">
                        <label style="width: 100%;">Refferal</label>
                        <input type="text" name="refferal" value="<?php
						if (isset($patients['refferal'])) {
							echo $patients['refferal'];
						}
						?>" class="form-control">
                    </div>


                    <div class="form-group col-lg-6">
                        <label>Address</label>
                        <textarea name="address"  rows="3" class="form-control"><?php
							if (isset($patients['address'])) {
								echo $patients['address'];
							}
							?></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Comments</label>
                        <textarea name="comments"  rows="3" class="form-control"><?php
							if (isset($patients['comments'])) {
								echo $patients['comments'];
							}
							?></textarea>
                    </div>


                    <div class="form-group col-lg-6 ">
                        <label style="width: 100%;">Gender</label>
                        <input type="radio" name="gender[]" value="Male" class="radio-inline" <?php
						if (isset($patients['gender']) && ($patients['gender'] == 'Male' || $patients['gender'] == 'male')) {
							echo 'checked';
						}
						?>><span class="rad-lable">Male</span>
                        <input type="radio" name="gender[]" value="Female" class="radio-inline" <?php
						if (isset($patients['gender']) && ($patients['gender'] == 'FeMale' || $patients['gender'] == 'Female')) {
							echo 'checked';
						}
						?>><span class="rad-lable">FeMale</span>
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