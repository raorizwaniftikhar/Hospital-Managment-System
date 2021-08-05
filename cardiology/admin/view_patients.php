<?php
if (isset($_POST['patientsID']) && isset($_POST['isAjax'])) {
	include '../functions.php';
	if (!adminLogin()) {
		echo '<script type=text/javascript> location.href = "logout.php" </script>';
		exit;
	}
	deleteData('patients', 'where id = \'' . $_POST['patientsID'] . '\'');
	deleteData('visits', 'where patient_id = \'' . $_POST['patientsID'] . '\'');
	echo json_encode(array('result' => 'success'));
	exit;
}
include 'header.php';
if (!adminLogin() && !doctorLogin()) {
	echo '<script type=text/javascript> location.href = "logout.php" </script>';
	exit;
}
include 'sidebar.php';
$get_array = '';
foreach ($_GET as $key => $value) {
	$get_array .='&' . $key . '=' . $value;
}
?>
<script type="text/javascript">
    $("#view_patients").addClass("active");
	$(document).ready(function () {
        document.title = "View Patients: Admin Panel";
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
		<div class="filters">
			<form>
				<span>
					<label>Search</label>
					<input type="text" name="search" value="<?php echo isset($_GET['search'])?$_GET['search']:'';?>">
				</span>
				<span>
					<input type="submit" class="btn btn-primary btn-sm" value="Find">
				</span>
			</form>
		</div>

        <div class="row col-lg-12">

            <div class=" panel panel-success">
                <div class="panel-heading">Patients
                    <a style="margin:0 0 0 10px;" href="export.php?export=patients<?php echo $get_array; ?>" class="label label-primary">Export</a>
                    <a href="add_patients.php" class="label label-primary">Add New</a></div>
                <div id="myTabContent" class="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Mobile No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
							$page = isset($_GET['page']) ? $_GET['page'] : 1;
							$perPage = 5;
							$start = ($page - 1) * $perPage;
							$limit = 'limit ' . $start . ',' . $perPage;
							$where = ' where 1=1 ';
							if (isset($_GET['search']) && $_GET['search'] != '') {
								$where .= 'and (name like \'%' . $_GET['search'] . '%\' or fname like \'%' . $_GET['search'] . '%\' or email like \'%' . $_GET['search'] . '%\')';
							}
							$all_patients = getData('patients', '*', $where, '', $limit);
							foreach ($all_patients as $patients) {
								?>
								<tr id="patients_<?php echo $patients['id'] ?>">
									<td><?php echo $patients['name']; ?></td>
									<td><?php echo $patients['fname']; ?></td>
									<td><?php echo $patients['email']; ?></td>
									<td><?php echo $patients['gender']; ?></td>
									<td><?php echo $patients['city']; ?></td>
									<td><?php echo $patients['mobile']; ?></td>
									<td>
										<a href="#myModal" data-toggle="modal" onclick="confirmPatientsDelete(<?php echo $patients['id']; ?>)"><i class="fa fa-trash-o "></i></a>
										<a href="add_patients.php?id=<?php echo $patients['id']; ?>" title="Delete"><i class="fa fa-pencil "></i></a>
										<a title="View Visits" href="view_visits.php?pat_id=<?php echo $patients['id']; ?>"><i class="fa fa-sign-in "></i></a>
										<a title="Add Visit" href="add_visits.php?pat_id=<?php echo $patients['id']; ?>"><i class="fa fa-plus "></i></a>
									</td>
								</tr>
								<?php
							}
							?>

                        </tbody>
                    </table>
                    <div class="panel-footer">
                        <div class="pagination_custom ">
							<?php
							$url = '?'.$get_array.'&';
							echo pagination('patients '.$where, $page, $perPage,$url); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

        </script>
        <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h3 id="myModalLabel">Delete Confirmation</h3>
                    </div>
                    <div class="modal-body">
                        <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the patients?<br>This cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" onclick="$('#okBtn').unbind('click')" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button id="okBtn" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>


		<?php
		include 'footer.php';
		?>