<?php
include_once 'functions.php';
if(!isset($_SESSION['patientData'])){
    header("location: login.php");
}
//prnt($_POST,1);
if(isset($_POST['submit'])){
    $patientData  = $_POST;
    unset($patientData['submit']);
	if($patientData['password'] == ''){
		unset($patientData['password']);
	}  else {
		$patientData['password']= md5($patientData['password']);
	}
	if(valid_email($patientData['email'],'patients',$_SESSION['patientData']['id'])){
    updateData('patients', $patientData,'where id ='.$_SESSION['patientData']['id']);
    $_SESSION['patientData'] = getData('patients','*', 'where id ='.$_SESSION['patientData']['id'])[0];
    $message = "Updated Successfully";
}  else {
	$message = "This email is already in use";
}
	}
include 'header.php';
?>
<script type="text/javascript">
    $("#user").addClass("selected");
</script>
<body>
    <div id="body">
        <div id="content">
            <div id="sidebar">
                <h3>Services</h3>
                <ul>

                    <li class="selected collapse">
                        <a href="user.php">User</a>
                        <ul>
                            <li class="active">
                                <a href="user.php" >Profile</a>
                            </li>
                            <li>
                                <a href="apointments.php" >Apointments</a>
                            </li>
                            <li>
                                <a href="login.php?logout=1" >Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="section">
                <h2>Welcome <?php echo $_SESSION['patientData']['name']; ?></h2>
                <p>Here you can change your information, view,edit or add new apointment.</p>
				<p style="color: red;float: right;margin-right: 50px;"><?php echo isset($message)?$message:''; ?></p>
                <form method="post" action="user.php">
                    <table class="show-info">
                        <tr>
                            <td>Name</td>
                            <td class="hide"><?php echo $_SESSION['patientData']['name']; ?></td>
                            <td class="show"><input type="text" name="name" value="<?php echo $_SESSION['patientData']['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Father Name</td>
                            <td class="hide"><?php echo $_SESSION['patientData']['fname']; ?></td>
                            <td class="show"><input type="text" name="fname" value="<?php echo $_SESSION['patientData']['fname']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td class="hide"><?php echo $_SESSION['patientData']['email']; ?></td>
                            <td class="show"><input type="email" name="email" value="<?php echo $_SESSION['patientData']['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td class="hide" >Default is '123'</td>
                            <td class="show"><input type="password" name="password" placeholder="Enter to change"></td>
                        </tr>
                        <tr>
                            <td>CNIC</td>
                            <td class="hide"><?php echo $_SESSION['patientData']['cnic']; ?></td>
                            <td class="show"><input type="tel" name="cnic" value="<?php echo $_SESSION['patientData']['cnic']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td class="hide"><?php echo $_SESSION['patientData']['phone']; ?></td>
                            <td class="show"><input type="tel" name="phone" value="<?php echo $_SESSION['patientData']['phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td class="hide"><?php echo $_SESSION['patientData']['mobile']; ?></td>
                            <td class="show"><input type="tel" name="mobile" value="<?php echo $_SESSION['patientData']['mobile']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td class="hide"><?php echo $_SESSION['patientData']['address']; ?></td>
                            <td class="show"><input type="text" name="address" value="address"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td class="hide"><?php echo $_SESSION['patientData']['gender']; ?></td>
                            <td class="show">
                                <select name="gender" style="width: 103%;height: 30px;">
                                    <option value="Male" <?php echo $_SESSION['patientData']['gender']=='Male'?'selected':''; ?>>Male</option>
                                    <option value="Female" <?php echo $_SESSION['patientData']['gender']=='Female'?'selected':''; ?>>Female</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="show"><input style="width:40%;height: 40px;" type="submit" name="submit" value="submit" class="btn btn-success-custom"></td>
                            <td class="hide"><a href="javascript:void(0);" class="btn btn-success-custom" onclick="showEditMode();" style="float: right">Edit</a></td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
        <?php

        include 'footer.php';
        ?>