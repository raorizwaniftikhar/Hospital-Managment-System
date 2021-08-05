<?php
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
    $("#reports").addClass("active");
    $(document).ready(function () {
        document.title = "Reports: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Reports</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="reports.php">Reports</a></li>
        </ul>

    </div>
    <div class="main-content">
		<div class="filters">
			<span style="width:100%;"> You can view all the visits and appointments.</span>
			<form>
				<?php
				if (!doctorLogin()) {
					?>
					<span>
						<label>Doctor</label>
						<select name="doc_id">
							<option value="">All</option>
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
						<option value="">All</option>
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
				<span>
					<label>From</label>
					<input type="date" name="fromdate" value="<?php echo isset($_GET['fromdate']) ? $_GET['fromdate'] : ''; ?>">
					<label>To</label>
					<input type="date" name="todate" value="<?php echo isset($_GET['todate']) ? $_GET['todate'] : ''; ?>">
				</span>
				<span>
					<label>Search</label>
					<input type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
				</span>

				<span>
					<input type="submit" class="btn btn-primary btn-sm" value="Find">
				</span>
			</form>
		</div>
        <div class="row col-lg-12">

            <div class=" panel panel-success">
                <div class="panel-heading">Visits
                    <a style="margin:0 0 0 10px;" href="export.php?export=reports<?php echo $get_array; ?>" class="label label-primary">Export</a>
                    <!--<a href="add_visits.php<?php echo isset($_GET['doc_id']) ? '?doc_id=' . $_GET['doc_id'] : ''; ?>" class="label label-primary">Add New</a>-->
				</div>
                <div id="myTabContent" class="">
                    <table class="table table-bordered table-striped">
                        <thead>
							<tr>
								<?php if (isset($_GET['doc_id']) && $_GET['doc_id'] != '' && isset($_GET['pat_id']) && $_GET['pat_id'] != '') {
									?>
									<th>Symptoms</th>
									<th>Disease</th>
									<th>Prescription</th>
									<th>Comments</th>
									<th>Date</th>
									<th>Status</th>

									<?php
								} elseif (isset($_GET['doc_id']) && $_GET['doc_id'] != '') {
									?>
									<th>Patient Name</th>
									<th>Father Name</th>
									<th>Prescription</th>
									<th>Symptoms</th>
									<th>Disease</th>
									<th>Comments</th>
									<th>Date</th>
									<th>Status</th>
									<?php
								} elseif (isset($_GET['pat_id']) && $_GET['pat_id'] != '') {
									?>

									<?php if (!doctorLogin()) { ?>
										<th>Doctor Name</th>
										<th>Father Name</th>
									<?php } ?>
									<th>Symptoms</th>
									<th>Disease</th>
									<th>Prescription</th>
									<th>Comments</th>
									<th>Date</th>
									<th>Status</th>

									<?php
								} else {
									?>
									<th colspan="2" style="text-align:center;">Patient</th>
									<?php if (!doctorLogin()) { ?>
										<th colspan="1">Doctor</th>
									<?php } ?>

									<th colspan="6" style="text-align:center;">Visit Details</th>
								</tr>
								<tr>
									<th>Name</th>
									<th>Father Name</th>
									<?php if (!doctorLogin()) { ?>
										<th>Name</th>
									<?php } ?>
									<th>Symptoms</th>
									<th>Disease</th>
									<th>Prescription</th>
									<th>Comments</th>
									<th>Date</th>
									<th>Status</th>


									<?php
								}
								?>
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
							if (isset($_GET['search']) && $_GET['search'] != '') {
								$where .= ' and (p.name like \'%' . $_GET['search'] . '%\' or d.name like \'%' . $_GET['search'] . '%\' or v.prescription like \'%' . $_GET['search'] . '%\' or p.fname like \'%' . $_GET['search'] . '%\' or d.fname like \'%' . $_GET['search'] . '%\' or d.email like \'%' . $_GET['search'] . '%\' or p.email like \'%' . $_GET['search'] . '%\')';
							}
							$where.= " order by v.id DESC";
							$all_visits = getData('patients', $fields, $join, $where, $limit);
							foreach ($all_visits as $visits) {
								?>
								<tr id="visits_<?php echo $visits['id'] ?>">
									<?php if (isset($_GET['doc_id']) && $_GET['doc_id'] != '' && isset($_GET['pat_id']) && $_GET['pat_id'] != '') {
										?>
										<td><?php echo $visits['symptoms']; ?></td>
										<td><?php echo $visits['disease']; ?></td>
										<td><?php echo $visits['prescription']; ?></td>
										<td><?php echo $visits['comments']; ?></td>
										<td><?php echo $visits['created_at']; ?></td>
										<td id="visit_status_<?php echo $visits['id'] ?>"><?php echo $visits['status'] ?></td>


										<?php
									} elseif (isset($_GET['doc_id']) && $_GET['doc_id'] != '') {
										?>
										<td><?php echo $visits['p_name']; ?></td>
										<td><?php echo $visits['p_fname']; ?></td>
										<td><?php echo $visits['symptoms']; ?></td>
										<td><?php echo $visits['disease']; ?></td>
										<td><?php echo $visits['prescription']; ?></td>
										<td><?php echo $visits['comments']; ?></td>
										<td><?php echo $visits['created_at']; ?></td>
										<td id="visit_status_<?php echo $visits['id'] ?>"><?php echo $visits['status'] ?></td>


										<?php
									} elseif (isset($_GET['pat_id']) && $_GET['pat_id'] != '') {
										if (!doctorLogin()) {
											?>
											<td><?php echo $visits['d_name']; ?></td>
											<td><?php echo $visits['d_fname']; ?></td>
										<?php } ?>
										<td><?php echo $visits['symptoms']; ?></td>
										<td><?php echo $visits['disease']; ?></td>
										<td><?php echo $visits['prescription']; ?></td>
										<td><?php echo $visits['comments']; ?></td>
										<td><?php echo $visits['created_at']; ?></td>
										<td id="visit_status_<?php echo $visits['id'] ?>"><?php echo $visits['status'] ?></td>


										<?php
									} else {
										?>
										<td><?php echo $visits['p_name']; ?></td>
										<td><?php echo $visits['p_fname']; ?></td>
										<?php if (!doctorLogin()) { ?>
											<td><?php echo $visits['d_name']; ?></td>
										<?php } ?>
										<td><?php echo $visits['symptoms']; ?></td>
										<td><?php echo $visits['disease']; ?></td>
										<td><?php echo $visits['prescription']; ?></td>
										<td><?php echo $visits['comments']; ?></td>
										<td><?php echo $visits['created_at']; ?></td>
										<td id="visit_status_<?php echo $visits['id'] ?>"><?php echo $visits['status'] ?></td>


										<?php
									}
									?>


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