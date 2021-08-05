<?php

include_once '../functions.php';
if (isset($_GET['export'])) {
	if ($_GET['export'] == 'doctors' && adminLogin()) {
		$where = ' where 1=1 ';
		if (isset($_GET['search']) && $_GET['search'] != '') {
			$where .= 'and (name like \'%' . $_GET['search'] . '%\' or fname like \'%' . $_GET['search'] . '%\' or email like \'%' . $_GET['search'] . '%\')';
		}
		$data = getData('doctors', '*', $where);
		unset($data['password']);
		exportCSV($data, 'Doctors.csv');
	} elseif ($_GET['export'] == 'nurses' && (adminLogin() || doctorLogin())) {
		$where = ' where 1=1 ';
		if (isset($_GET['search']) && $_GET['search'] != '') {
			$where .= 'and (name like \'%' . $_GET['search'] . '%\' or fname like \'%' . $_GET['search'] . '%\' or email like \'%' . $_GET['search'] . '%\')';
		}
		$data = getData('nurses', '*', $where);
		exportCSV($data, 'Nurses.csv');
	} elseif ($_GET['export'] == 'patients' && (adminLogin() || doctorLogin())) {
		$where = ' where 1=1 ';
		if (isset($_GET['search']) && $_GET['search'] != '') {
			$where .= 'and (name like \'%' . $_GET['search'] . '%\' or fname like \'%' . $_GET['search'] . '%\' or email like \'%' . $_GET['search'] . '%\')';
		}
		$data = getData('patients', '*', $where);
		unset($data['password']);
		exportCSV($data, 'Patients.csv');
	} elseif ($_GET['export'] == 'visits' && (adminLogin() || doctorLogin())) {
		$fields = " p.name as p_name, p.fname as p_fname, d.name as d_name, d.fname as d_fname, v.*";
		$join = " p INNER JOIN `visits` v on p.id=v.patient_id INNER JOIN `doctors` d on d.id=v.doctor_id ";
		$where = "where 1=1 ";

		if (doctorLogin()) {
			$where .= " and d.id = " . $_SESSION['userData']['id'];
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
		$data = getData('patients', $fields, $join, $where);
		exportCSV($data, 'Visits.csv');
	} elseif ($_GET['export'] == 'reports' && (adminLogin() || doctorLogin())) {
		$fields = " p.name as p_name, p.fname as p_fname, d.name as d_name, d.fname as d_fname, v.*";
		$join = " p INNER JOIN `visits` v on p.id=v.patient_id INNER JOIN `doctors` d on d.id=v.doctor_id ";
		$where = "where 1=1 ";

		if (doctorLogin()) {
			$where .= " and d.id = " . $_SESSION['userData']['id'];
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
			$where .= 'and (p.name like \'%' . $_GET['search'] . '%\' or d.name like \'%' . $_GET['search'] . '%\' or p.fname like \'%' . $_GET['search'] . '%\' or d.fname like \'%' . $_GET['search'] . '%\' or d.email like \'%' . $_GET['search'] . '%\' or p.email like \'%' . $_GET['search'] . '%\')';
		}
		$data = getData('patients', $fields, $join, $where);
		exportCSV($data, 'Visits.csv');
	} elseif ($_GET['export'] == 'messages' && (adminLogin() || doctorLogin())) {
		$data = getData('messages');
		exportCSV($data, 'Messages.csv');
	}
	exit;
}