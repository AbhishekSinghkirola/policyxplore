<?php
require('connection.php');
require('functions.php');
session_start();

if(isset($_SESSION['admin_login']) && $_SESSION['admin_login']!=''){
  check_login_deatils($con,$_SESSION['username'],$_SESSION['password']);
}else{
  header('location:login.php');
  die();
}

if(isset($_GET['id'])){
	$id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from testimonial where id = $id");
    $data=mysqli_fetch_assoc($res);
    $image=$data['testimonial_image'];
	mysqli_query($con,"delete from testimonial where id='$id'");
    unlink("TestimonialImages/$image");
    header('location: testimonial.php');

}
?>