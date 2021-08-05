<?php

define('host', 'localhost');
define('user', 'root');
define('password', '');
define('database', 'cardiology');
session_start();

function db() {
    return mysqli_connect(host, user, password, database);
}

function prnt($data = array(''), $ex = '') {
    echo '<pre>';
    print_r($data);
    if ($ex == '') {
        exit;
    }
}

function insertData($table, $data) {
    $data = arrToFieldsInsert($data);
    $query = "insert into " . $table . "(" . $data['fields'] . ") values(" . $data['values'] . ")";
    $link = db();
    mysqli_query($link, $query);
    return mysqli_insert_id($link);
}

function getData($table = 'options', $fields = "*", $where = '', $join = '', $limit = '') {
    $link = db();
    $data = array();
    $i = 0;
    $query = "select " . $fields . " from " . $table . " " . $where . " " . $join . " " . $limit;
//        echo $query;
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i] = $row;
        $i++;
    }
    return $data;
}

function execute_query($query, $getData = FALSE) {
    $link = db();
    $data = array();
    $i = 0;
    $result = mysqli_query($link, $query);
    if ($getData) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$i] = $row;
            $i++;
        }
        return $data;
    } else {
        return $result;
    }
}

$data = getData();

//prnt($data);

function deleteData($table, $where) {
    $query = "delete from " . $table . " " . $where;
    $link = db();
    return mysqli_query($link, $query);
}

function updateData($table = 'options', $data = array('name' => 'affi', 'value' => 'abc'), $where = 'where id=0') {
    if (is_array($data) && $data) {
        $fields = arrToFieldsUpdate($data);
    }
    $query = "update " . $table . " set " . $fields . " " . $where;
    $link = db();
    return mysqli_query($link, $query);
}

function arrToFieldsUpdate($data) {
    $fields = '';
    foreach ($data as $field => $value) {
        $fields = $fields . $field . "='" . mysql_real_escape_string(trim($value)) . "'" . ", ";
    }
    $fields = trim($fields, ', ');
    return $fields;
}

function arrToFieldsInsert($data) {
    $fields = '';
    $values = '';
    foreach ($data as $field => $value) {
        $fields = $fields . $field . ", ";
        $values = $values . "'" . $value . "', ";
    }
    $res['fields'] = trim($fields, ', ');
    $res['values'] = trim($values, ', ');
    return $res;
}

function getExtension($str) {

    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

function pagination($query, $page = 1, $per_page = 5, $url = '?') {
	if(strpos($url, 'page'))
	$url = substr($url,0,strpos($url, 'page'));
    $conDB = db();
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    $row = mysqli_fetch_array(mysqli_query($conDB, $query));
    $total = $row['num'];
    $adjacents = 1;

    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next";
    $lastlabel = "Last";

    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;

    $lastpage = ceil($total / $per_page);

    $lpm1 = $lastpage - 1; // //last page minus 1

    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<ul class='pagination pagination-sm'>";
//		$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";

        if ($page > 1)
            $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";

        if ($lastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='current_page'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) {

            if ($page < 1 + ($adjacents * 2)) {

                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current_page'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                }
                $pagination.= "<li class='dot'><a href='javascript:void(0);'>. . .</a></li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";
            } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {

                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current_page'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";
            } else {

                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current_page'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                }
            }
        }

        if ($page < $counter - 1) {
            $pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
            $pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
        }

        $pagination.= "</ul>";
    }

    return $pagination;
}

function adminLogin() {
    $res = FALSE;
    if (isset($_SESSION['userData']) && $_SESSION['type'] == 'a') {
        $res = TRUE;
    }
    return $res;
}

function doctorLogin($id = '') {
    $res = FALSE;
    if (isset($_SESSION['userData']) && $_SESSION['type'] == 'd') {
        $res = TRUE;
    }
    if ($id && (isset($_SESSION['userData']) && $_SESSION['userData']['id'] != $id)) {
        $res = FALSE;
    }
    return $res;
}

function login() {
    $res = FALSE;
    if (isset($_SESSION['userData'])) {
        $res = TRUE;
    }
    return $res;
}

function exportCSV($array, $filename = "export.csv", $delimiter = ",") {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    $f = fopen('php://output', 'w');
    $flag = FALSE;
    foreach ($array as $line) {
        if (!$flag) {
            foreach ($line as $key => $value) {
                $heading[] = $key;
            }
            fputcsv($f, $heading, $delimiter);
            $flag = TRUE;
        }
        fputcsv($f, $line, $delimiter);
    }
    fclose($f);
}

function valid_email($email='', $table='',$id=''){
	$is_valid = TRUE;
	$email = trim($email);
	$query = "select email from ".$table." where email = '".$email."' ";
	if($id != ''){
		$query .= " and id != ".$id;
	}
	$link = db();
	$res = mysqli_query($link, $query);
	if($res->num_rows || $email == ''){
		$is_valid = FALSE;
	}
//	var_dump($is_valid); exit;
	return $is_valid;
}
