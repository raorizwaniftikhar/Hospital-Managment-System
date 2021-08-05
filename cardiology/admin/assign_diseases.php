<?php
if (isset($_POST['add'])) {
    include '../functions.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
    $response['result'] = 'failed';
    $doc_id = $_POST['doctor_id'];
    $des_id = $_POST['disease_id'];
    $check = getData('doctor_disease'," count(id) ", "where doctor_id = '".$doc_id."' and disease_id= '".$des_id."'");
    if($check[0]['count(id)'] == 0){
        $last_id=insertData('doctor_disease', array('doctor_id'=>$doc_id,'disease_id'=>$des_id));
        $response['result'] = 'success';
        $response['insert_id'] = $last_id;
    }
    echo json_encode($response);
    exit;
}
if (isset($_POST['remove'])) {
    include '../functions.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
    $response['result'] = 'failed';
    $id = $_POST['doc_des_id'];
    if(deleteData('doctor_disease', 'where id ='.$id) === TRUE){
        $response['result'] = 'success';
    }
    echo json_encode($response);
    exit;
}
include 'header.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
include 'sidebar.php';

$preData = getData("doctor_disease", " doctor_disease.*, diseases.name ", "inner join diseases on diseases.id = doctor_disease.disease_id", " where doctor_id = " . $_GET['id'] . "");
$diseases = getData('diseases');
$doctor = getData("doctors", "*", "where id = " . $_GET['id'])[0];
//prnt($doctor);
?>

<script type="text/javascript">
    $("#view_doctors").addClass("active");
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Doctors</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_doctors.php">Doctors</a></li>
        </ul>
    </div>
    <div class="main-content">
        <?php
        isset($message) ? '' : $message = '';
        echo (isset($errors) && $errors == 1) ? '<span class="error-text" >' . $errors . '</span>' : '<span class="error-text" >' . $message . '</span>';
        ?>
        <div class="row">
            <div class="col-md-8">
                <form class="" method="post">
                    <div class="form-group col-lg-12">
                        <h4>Assign Diseases to doctor</h4>
                    </div>
                    <div class="form-group col-lg-4 text-center">
                        <h2> <?php echo $doctor['name']; ?></h2>
                    </div>
                    <div class="form-group col-lg-8">
                        <select class="select_custom" onchange="addItem(this.value,<?php echo $_GET['id'];?>)">
                            <option disabled="" selected="">Select Disease</option>
                            <?php foreach ($diseases as $disease) { ?>
                            <option value="<?php echo $disease['id']; ?>" id="option_<?php echo $disease['id']; ?>"><?php echo $disease['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <span class="clearfix"></span>
                    <div class="col-lg-12 diseases_admin" id="disease_data">
                            
                            <?php
                            foreach ($preData as $predisease) {
                                ?>
                            <div class="disease_added" id="disease_<?php echo $preDisease['id']; ?>">
                                    
                                    <b><?php echo $predisease['name']; ?></b>
                                    <a href="javascript:removeItem(<?php echo $preDisease['id'];?>);">X</a>
                                    <hr style="width:100%">
                                </div>
                            
                                <?php
                            }
                            ?>
                    </div>

                    <div class="pull-right col-lg-12">
                        <a href="view_doctors.php" class="btn btn-xs btn-default ">Back</a>
                    </div>
                </form>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>