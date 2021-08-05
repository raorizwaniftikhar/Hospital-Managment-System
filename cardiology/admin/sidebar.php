<div class="sidebar-nav">
    <ul>
        <li><a  class="nav-header" ><i class="fa fa-fw fa-hospital-o"></i><b>System Management</b></a></li>
        <?php if ($_SESSION['type'] == 'a') { ?>
            <li><ul id="management" class="dashboard-menu nav nav-list ">
                    
                    <li id="view_doctors"><a href="view_doctors.php"><span class="fa fa-caret-right"></span> Doctors</a></li>
                    <li id="view_nurses"><a href="view_nurses.php"><span class="fa fa-caret-right"></span> Nurses</a></li>
                    <li id="view_patients"><a href="view_patients.php"><span class="fa fa-caret-right"></span> Patients</a></li>
                    <li id="view_visits"><a href="view_visits.php"><span class="fa fa-caret-right"></span> Appointments and Visits</a></li>
                    <li id="view_services"><a  href="view_services.php"><span class="fa fa-caret-right"></span> Services</a></li>
                    <li id="view_departments"><a  href="view_departments.php"><span class="fa fa-caret-right"></span> Departments</a></li>
                    <li id="view_diseases"><a  href="view_diseases.php"><span class="fa fa-caret-right"></span> diseases</a></li>
                    <li id="messages"><a  href="view_messages.php"><span class="fa fa-caret-right"></span> Messages</a></li>
                    <li id="profile"><a href="profile.php"><span class="fa fa-caret-right"></span> Change Password</a></li>
                    <li id="reports"><a href="reports.php"><span class="fa fa-caret-right"></span> Reports</a></li>
                </ul></li>

				<li><a  class="nav-header" ><i class="fa fa-fw fa-globe"></i><b> Website Contents</b></a></li>
            <li><ul id="site" class="dashboard-menu nav nav-list ">
                    <li id="home"><a  href="index.php"><span class="fa fa-caret-right"></span> Home Page</a></li>
                    <li id="about" ><a href="about.php"><span class="fa fa-caret-right"></span> About Page</a></li>
                    <li id="doctors" ><a href="doctors.php"><span class="fa fa-caret-right"></span> Our Doctors Page</a></li>
                    <li  id="services"><a href="services.php"><span class="fa fa-caret-right"></span> Services Page</a></li>
                    <li id="departments" ><a href="departments.php"><span class="fa fa-caret-right"></span> Departments Page</a></li>
                    <li id="diseases" ><a href="diseases.php"><span class="fa fa-caret-right"></span> Diseases Page</a></li>
                    <li id="contactus"><a  href="contact.php"><span class="fa fa-caret-right"></span> Contact Us Page</a></li>
                </ul></li>
        <?php } else { ?>
            <li><ul id="management" class="dashboard-menu nav nav-list ">
                    <li id="view_visits"><a href="view_visits.php?doc_id=<?php echo $_SESSION['userData']['id']; ?>"><span class="fa fa-caret-right"></span> Appointments and Visits</a></li>
                    <li id="view_patients"><a href="view_patients.php?doc_id=<?php echo $_SESSION['userData']['id']; ?>"><span class="fa fa-caret-right"></span> Patients</a></li>
                    <li id="view_doctors"><a href="add_doctors.php?id=<?php echo $_SESSION['userData']['id']; ?>"><span class="fa fa-caret-right"></span> Edit Profile</a></li>
                    <li id="profile"><a href="profile.php?doc_id=<?php echo $_SESSION['userData']['id']; ?>"><span class="fa fa-caret-right"></span> Change Password</a></li>
					<li id="reports"><a href="reports.php"><span class="fa fa-caret-right"></span> Reports</a></li>
                </ul></li>
        <?php } ?>
</div>