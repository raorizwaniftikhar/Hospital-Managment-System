<?php
    
if (isset($_POST['staffID']) && isset($_POST['isAjax'])) {
	include '../functions.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
	deleteData('staff', 'where id = \'' . $_POST['staffID'] . '\'');
	echo json_encode(array('result' => 'success'));
	exit;
}
include 'header.php';
if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
include 'sidebar.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'all';
if ($type != 'all') {
	$where = 'where post =\'' . $type . '\'';
} else {
	$where = '';
}
?>
<script type="text/javascript">
 $("#view_staff").addClass("active");
 $(document).ready(function () {
        document.title = "View Staff: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Staff</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="staff.php">Staff</a></li>
        </ul>

    </div>
    <div class="main-content">
		<div class="filters">
			<select id="filter_type">
				<option value="all">All</option>
				<?php
				$options = getData('staff', 'distinct post');
				foreach ($options as $option) {
					?>
					<option value="<?php echo $option['post']; ?>" <?php echo $type == $option['post'] ? ' selected' : ''; ?> ><?php echo $option['post']; ?></option>
					<?php
				}
				?>
			</select>
		</div>
        <div class="row col-lg-12">

            <div class=" panel panel-success">
				<div class="panel-heading">Staff
					<a href="add_staff.php" class="label label-primary">Add New</a></div>
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
								<th>Post</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$page = isset($_GET['page']) ? $_GET['page'] : 1;
							$perPage = 5;
							$start = ($page - 1) * $perPage;
							$limit = 'limit ' . $start . ',' . $perPage;
							$all_staff = getData('staff', '*', $where, '', $limit);
							foreach ($all_staff as $staff) {
								?>
								<tr id="staff_<?php echo $staff['id'] ?>">
									<td><?php echo $staff['name']; ?></td>
									<td><?php echo $staff['fname']; ?></td>
									<td><?php echo $staff['email']; ?></td>
									<td><?php echo $staff['gender']; ?></td>
									<td><?php echo $staff['city']; ?></td>
									<td><?php echo $staff['mobile']; ?></td>
									<td><?php echo $staff['post']; ?></td>
									<td>
										<a href="#myModal" data-toggle="modal" onclick="confirmStaffDelete(<?php echo $staff['id']; ?>)"><i class="fa fa-trash-o "></i></a>
										<a href="add_staff.php?id=<?php echo $staff['id']; ?>"><i class="fa fa-pencil "></i></a>
									</td>
								</tr>
								<?php
							}
							?>

						</tbody>
					</table>
					<div class="panel-footer">
						<div class="pagination_custom ">
							<?php echo pagination('staff ' . $where, $page, $perPage, '?type=' . $type . '&'); ?>
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
						<p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the staff?<br>This cannot be undone.</p>
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