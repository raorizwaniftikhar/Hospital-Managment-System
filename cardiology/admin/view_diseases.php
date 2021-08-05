<?php
if (isset($_POST['diseaseID']) && isset($_POST['isAjax'])) {
	include '../functions.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
	deleteData('diseases', 'where id = \'' . $_POST['diseaseID'] . '\'');
	echo json_encode(array('result' => 'success'));
	exit;
}
include 'header.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
include 'sidebar.php';
?>
<script type="text/javascript">
 $("#view_diseases").addClass("active");
 $(document).ready(function () {
        document.title = "View Diseases: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Diseases</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_diseases.php">Services</a></li>
        </ul>

    </div>
    <div class="main-content">
        <div class="row col-lg-12">

            <div class=" panel panel-success">
				<div class="panel-heading">Services
					<a href="add_diseases.php" class="label label-primary">Add New</a></div>
                <div id="myTabContent" class="">
                    <table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Comments</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$page = isset($_GET['page']) ? $_GET['page'] : 1;
							$perPage = 5;
							$start = ($page - 1) * $perPage;
							$limit = 'limit ' . $start . ',' . $perPage;
							$all_diseases = getData('diseases', '*', '', '', $limit);
							foreach ($all_diseases as $diseases) {
								?>
								<tr id="diseases_<?php echo $diseases['id'] ?>">
									<td><?php echo $diseases['name']; ?></td>
									<td><?php echo $diseases['description']; ?></td>
									<td><?php echo $diseases['comments']; ?></td>
									<td>
										<a href="#myModal" data-toggle="modal" onclick="confirmServiceDelete(<?php echo $diseases['id']; ?>)"><i class="fa fa-trash-o "></i></a>
										<a href="add_diseases.php?id=<?php echo $diseases['id']; ?>"><i class="fa fa-pencil "></i></a>
									</td>
								</tr>
								<?php
							}
							?>

						</tbody>
					</table>
					<div class="panel-footer">
						<div class="pagination_custom ">
							<?php echo pagination('diseases ', $page, $perPage); ?>
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
						<p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the disease?<br>This cannot be undone.</p>
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