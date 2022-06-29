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
    $res=mysqli_query($con,"select * from blog where id = $id");
    $data=mysqli_fetch_assoc($res);
    $image=$data['blog_image'];
    $category=$data['category'];
	mysqli_query($con,"delete from blog where id='$id'");
    unlink("BlogImages/$image");
    $sql=mysqli_query($con,"select * from category where cat_id = $category");
    $res2=mysqli_fetch_assoc($sql);
    $no_of_post = $res2['no_of_posts']-1;
    mysqli_query($con,"update category set no_of_posts = '$no_of_post' where cat_id=$category") or die("update Query Failed!!");
    header('location: blog.php');

}
?>