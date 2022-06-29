<?php

function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function check_login_deatils($con,$username,$password) {
	$check_login_sql = mysqli_query($con,"SELECT * FROM admin_user");
	$data_login = mysqli_fetch_assoc($check_login_sql);
	if($data_login['username'] == $username && $data_login['password'] == $password) {

	}else {
		header("location: logout.php");
	}
}

?>