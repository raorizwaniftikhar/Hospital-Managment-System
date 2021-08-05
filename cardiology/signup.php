<?php
if (isset($_POST['signup'])) {
	include_once 'functions.php';
	$patient_data = $_POST;
	$patient_data['password'] = md5(trim($patient_data['password']));
	$visit_data['disease'] = $patient_data['disease'];
	$visit_data['doctor_id'] = $patient_data['doctor_id'];
	$visit_data['comments'] = $patient_data['comments'];
	unset($patient_data['disease']);
	unset($patient_data['doctor_id']);
	unset($patient_data['comments']);
	unset($patient_data['signup']);
	$visit_data['patient_id'] = insertData('patients', $patient_data);
	if (valid_email($patient_data['email'], 'patients')) {
		insertData('visits', $visit_data);
		echo '<script>alert("Your request is submitted successfully! Please login to view");</script>';
		header('location: login.php');
	} else {
		$message = 'This Email is already in use. If you\'re already a member, please login.';
	}
}
if (isset($_POST['request'])) {
	include_once 'functions.php';
	$visit_data = $_POST;
	unset($visit_data['request']);
	$visit_data['patient_id'] = $_SESSION['patientData']['id'];
//    prnt($visit_data);
	insertData('visits', $visit_data);
	echo '<script>alert("Your request is submitted successfully!");</script>';
	header('location: user.php');
}
include 'header.php';
?>
<script type="text/javascript">
    $("#log_in").addClass("selected");
</script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<div class="dialog" style="    max-width: 70%;">
	<p style="color: red;"><?php echo isset($message)?$message:'';?></p>
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Get Appointment</p>
        <div class="panel-body">
<?php
$doctors = getData('doctors');
if (!isset($_SESSION['patientData'])) {
	?>			
				<form action="" method="post">
					<div class="form-group col-lg-6">
						<label form-control>Name</label>
						<input type="text" name="name" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Father Name</label>
						<input type="text" name="fname" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Email</label>
						<input type="email" name="email" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-6">
						<label>Password</label>
						<input type="password" name="password" class="form-control span12 form-control" required>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>CNIC</label>
						<input type="tel" name="cnic" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Mobile</label>
						<input type="tel" name="mobile" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Phone</label>
						<input type="tel" name="phone" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>City</label>
						<input type="text" name="city" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Address</label>
						<input type="text" name="address" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Gender</label>
						<select name="gender" class="form-control">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Docotor</label>
						<select name="doctor_id" class="form-control">
	<?php
	foreach ($doctors as $doctor) {
		?>
								<option value="<?php echo $doctor['id']; ?>" 
								<?php
								if (isset($_GET['doc_id']) && $_GET['doc_id'] == $doctor['id']) {
									echo 'selected';
								}
								?>><?php echo $doctor['name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Disease</label>
						<input type="text" name="disease" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-12">
						<label form-control>Disease Description</label>
						<textarea class="form-control" name="comments"></textarea>
					</div>
					<div class="form-action col-lg-12">
						<input type="submit" name="signup" class="btn btn-primary pull-right" value="Sign up & Request">
						<div class="clearfix"></div>
					</div>
				</form>
<?php } else { ?>
				<form action="" method="post">

					<div class="form-group col-lg-6">
						<label form-control>Docotor</label>
						<select name="doctor_id" class="form-control">
	<?php
	foreach ($doctors as $doctor) {
		?>
								<option value="<?php echo $doctor['id']; ?>" 
								<?php
								if (isset($_GET['doc_id']) && $_GET['doc_id'] == $doctor['id']) {
									echo 'selected';
								}
								?>><?php echo $doctor['name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-lg-6">
						<label form-control>Disease</label>
						<input type="text" name="disease" class="form-control span12" required>
					</div>
					<div class="form-group col-lg-12">
						<label form-control>Disease Description</label>
						<textarea class="form-control" name="comments"></textarea>
					</div>
					<div class="form-action col-lg-12">
						<input type="submit" name="request" class="btn btn-primary pull-right" value="Request">
						<div class="clearfix"></div>
					</div>
				</form>
<?php } ?>
        </div>
    </div>

</div>
<?php
include 'footer.php';
?>