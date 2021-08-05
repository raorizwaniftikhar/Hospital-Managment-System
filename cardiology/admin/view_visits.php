<?php
if (isset($_POST['visitsID']) && isset($_POST['isAjax'])) {
	include '../functions.php';
	if (!adminLogin() && !doctorLogin()) {
		echo '<script type=text/javascript> location.href = "logout.php" </script>';
		exit;
	}
	deleteData('visits', 'where id = ' . $_POST['visitsID'] . '');
	echo json_encode(array('result' => 'success'));
	exit;
}
if (isset($_POST['visit_id']) && isset($_POST['isAjax']) && isset($_POST['status'])) {
	include '../functions.php';
	if (!adminLogin() && !doctorLogin()) {
		echo '<script type=text/javascript> location.href = "logout.php" </script>';
		exit;
	}
	updateData('visits', array('status' => $_POST['status']), 'where id = ' . $_POST['visit_id'] . '');
	echo json_encode(array('result' => 'success'));
	exit;
}
include 'header.php';
if (!adminLogin() && !doctorLogin()) {
	echo '<script type=text/javascript> location.href = "logout.php" </script>';
	exit;
}
if (doctorLogin()) {
	$doctor_id = $_SESSION['userData']['id'];
	if (isset($_GET['doc_id']) && $_GET['doc_id'] != '') {
		$_GET['doc_id'] = $doctor_id;
	}
}
include 'sidebar.php';
$get_array = '';
foreach ($_GET as $key => $value) {
	$get_array .='&' . $key . '=' . $value;
}
?>
<script type="text/javascript">
    $("#view_visits").addClass("active");
    $(document).ready(function () {
        document.title = "View Visits: Admin Panel";
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
		<div class="filters">
			<form>
<!--				
				<?php
				if (!doctorLogin()) {
					?>
					<span>
						<label>Doctor</label>
						<select name="doc_id">
							<option value="">Select</option>
							<?php
							$doctors = getData('doctors');
							foreach ($doctors as $doctor) {
								?>
								<option value="<?php echo $doctor['id']; ?>" 
								<?php
								if (isset($_GET['doc_id']) && $_GET['doc_id'] == $doctor['id']) {
									echo 'selected';
								}
								?>
										><?php echo $doctor['name']; ?></option>
										<?php
									}
									?>
						</select>
					</span>
				<?php } ?>
				<span>
					<label>Patient</label>
					<select name="pat_id">
						<option value="">Select</option>
						<?php
						$patients = getData('patients');
						foreach ($patients as $patient) {
							?>
							<option value="<?php echo $patient['id']; ?>" 
							<?php
							if (isset($_GET['pat_id']) && $_GET['pat_id'] == $patient['id']) {
								echo 'selected';
							}
							?>
									><?php echo $patient['name']; ?></option>
									<?php
								}
								?>

					</select>
				</span>
-->
				<span>
					<label>Date From</label>
					<input type="date" name="fromdate" value="<?php echo isset($_GET['fromdate']) ? $_GET['fromdate'] : ''; ?>">
				</span>
				<span>
					<label>To Date</label>
					<input type="date" name="todate" value="<?php echo isset($_GET['todate']) ? $_GET['todate'] : ''; ?>">
				</span>
				<span>
					<input type="submit" class="btn btn-primary btn-sm" value="Find">
				</span>
			</form>
		</div>
        <div class="row col-lg-12">

            <div class=" panel panel-success">
                <div class="panel-heading">Visits
                    <a style="margin:0 0 0 10px;" href="export.php?export=visits<?php echo $get_array; ?>" class="label label-primary">Export</a>
                    <a href="add_visits.php<?php echo isset($_GET['doc_id']) ? '?doc_id=' . $_GET['doc_id'] : ''; ?>" class="label label-primary">Add New</a></div>
                <div id="myTabContent" class="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Patient</th>
                                <th colspan="1">Doctor</th>
                                <th colspan="5">Visit Details</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Name</th>
                                <th>Prescription</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
							$page = isset($_GET['page']) ? $_GET['page'] : 1;
							$perPage = 5;
							$start = ($page - 1) * $perPage;
							$limit = ' limit ' . $start . ',' . $perPage;
							$fields = " p.name as p_name, p.fname as p_fname, d.name as d_name, d.fname as d_fname, v.* ";
							$join = " p INNER JOIN `visits` v on p.id=v.patient_id INNER JOIN `doctors` d on d.id=v.doctor_id ";
							$where = "where 1=1 ";

							if (doctorLogin()) {
								$where .= " and d.id = " . $doctor_id;
							} else {
								if (isset($_GET['doc_id']) && $_GET['doc_id'] != '') {
									$where .= " and d.id = " . $_GET['doc_id'];
								}
							}
							if (isset($_GET['pat_id']) && $_GET['pat_id'] != '') {
								$where .= " and p.id = " . $_GET['pat_id'];
							}
							if (isset($_GET['fromdate']) && $_GET['fromdate'] != '') {
								$where .= " and DATE_FORMAT(date(v.created_at),'%Y-%m-%d') >= '" . $_GET['fromdate'] . "'";
							}
							if (isset($_GET['todate']) && $_GET['todate'] != '') {
								$where .= " and DATE_FORMAT(date(v.created_at),'%Y-%m-%d') <= '" . $_GET['todate'] . "'";
							}
							$where.= " order by v.id DESC";
							$all_visits = getData('patients', $fields, $join, $where, $limit);
							foreach ($all_visits as $visits) {
								?>
								<tr id="visits_<?php echo $visits['id'] ?>">
									<td><?php echo $visits['p_name']; ?></td>
									<td><?php echo $visits['p_fname']; ?></td>
									<td><?php echo $visits['d_name']; ?></td>
									<td><?php echo $visits['prescription']; ?></td>
									<td><?php echo $visits['comments']; ?></td>
									<td><?php echo $visits['created_at']; ?></td>
									<td id="visit_status_<?php echo $visits['id'] ?>"><?php echo $visits['status'] ?></td>

									<td>
										<a href="#myModal" title="Delete Visit" data-toggle="modal" onclick="confirmVisitsDelete(<?php echo $visits['id']; ?>)"><i class="fa fa-trash-o "></i></a>
										<a href="add_visits.php?id=<?php
										echo $visits['id'];
										if (doctorLogin()) {
											echo '&doc_id=' . $doctor_id;
										}
										?>" title="Edit Visit"><i class="fa fa-pencil "></i></a>
										   <?php
										   echo '<a title="Approve" onclick=javascript:changeStatus(' . $visits["id"] . ',"Approved")><i class="fa fa-check" ></i></a><a title="Reject" onclick=javascript:changeStatus(' . $visits["id"] . ',"Rejected")><i class="fa fa-plus" style="transform: rotate(45deg)"></i></a>';
										   ?>
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
							$url = '?' . $get_array . '&';

							echo pagination('patients ' . $join . ' ' . $where, $page, $perPage, $url);
							?>
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
                        <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the visits?<br>This cannot be undone.</p>
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