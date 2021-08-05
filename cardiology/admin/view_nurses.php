<?php
if (isset($_POST['nursesID']) && isset($_POST['isAjax'])) {
	include_once '../functions.php';
	if (!adminLogin()) {
		echo '<script type=text/javascript> location.href = "logout.php"; </script>';
		exit;
	}
	deleteData('nurses', 'where id = \'' . $_POST['nursesID'] . '\'');
	echo json_encode(array('result' => 'success'));
	exit;
}
include_once '../functions.php';
if (!adminLogin()) {
	echo '<script type=text/javascript> location.href = "logout.php"; </script>';
	exit;
}
include 'header.php';
include 'sidebar.php';
$get_array = '';
foreach ($_GET as $key => $value) {
	$get_array .='&' . $key . '=' . $value;
}
?>
<script type="text/javascript">
    $("#view_nurses").addClass("active");
	$(document).ready(function () {
        document.title = "View Nurses: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Nurses</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_nurses.php">Nurses</a></li>
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
                <div class="panel-heading">Nurses
                    <a style="margin:0 0 0 10px;" href="export.php?export=nurses<?php echo $get_array; ?>" class="label label-primary">Export</a>
                    <a href="add_nurses.php" class="label label-primary">Add New</a>
                </div>
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
							$all_nurses = getData('nurses', '*', $where, '', $limit);
							foreach ($all_nurses as $nurses) {
								?>
								<tr id="nurses_<?php echo $nurses['id'] ?>">
									<td><?php echo $nurses['name']; ?></td>
									<td><?php echo $nurses['fname']; ?></td>
									<td><?php echo $nurses['email']; ?></td>
									<td><?php echo $nurses['gender']; ?></td>
									<td><?php echo $nurses['city']; ?></td>
									<td><?php echo $nurses['mobile']; ?></td>
									<td>
										<a href="#myModal" data-toggle="modal" onclick="confirmNursesDelete(<?php echo $nurses['id']; ?>)"><i class="fa fa-trash-o "></i></a>
										<a href="add_nurses.php?id=<?php echo $nurses['id']; ?>"><i class="fa fa-pencil "></i></a>
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
							echo pagination('nurses '.$where, $page, $perPage, $url); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h3 id="myModalLabel">Delete Confirmation</h3>
                    </div>
                    <div class="modal-body">
                        <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the nurse?<br>This cannot be undone.</p>
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