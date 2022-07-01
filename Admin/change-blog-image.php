<?php
require("header.php");
require("navbar.php");
$msg ='';
if(isset($_GET['id'])) {
    $id = get_safe_value($con,$_GET['id']);
    $res = mysqli_query($con,"select * from blog where id = $id");
    if(mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
    }else {
       echo "<script>window.location.href = 'edit-blog.php'; </script>";
    }

}else  {
    header('loction: edit-blog.php');
}

if(isset($_POST['submit'])) {

    $old_blog_image = get_safe_value($con,$_POST['old_blog_image']);
    $blog_image = $_FILES['blog_image']['name'];
    $image_type = $_FILES['blog_image']['type'];

    if($image_type!='') {
        if($image_type!='image/png' && $image_type!='image/jpg' && $image_type!='image/jpeg' && $image_type!='image/webp'){
            $msg="Please select only png,jpg and jpeg image formate";
        }else{
            if($blog_image != '') {
                $res = mysqli_query($con,"update blog set blog_image='$blog_image' where id=$id");
                if($res) {
                    move_uploaded_file($_FILES['blog_image']['tmp_name'], "BlogImages/$blog_image");
                    unlink("BlogImages/$old_blog_image");
                }
                header('location: blog.php');
        
            }else {

                header('location: blog.php');
            }
    }
    }else{
        $msg="Please Choose an Image";
    }

}

?>

<!-- Error Msg if Username or Password Not matched -->
<?php
    if ($msg != '') {
  ?>

  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <?php echo $msg; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <?php
    }
  ?>


<div class="row ">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Change Blog Image</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                       
                        <div class="col-sm-10 mb-4">
                            <img src="BlogImages/<?php echo $row['blog_image']?>" alt="Blog Image" style="width: 125px;">
                        </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="formFile">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="blog_image">
                        </div>

                    </div>
                    <input type="hidden" name="old_blog_image" value="<?php echo $row['blog_image']; ?>">
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            <a type="button" href="edit-blog.php?id=<?php echo $id; ?>" class="btn btn-secondary" name="submit">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php
    require ("footer.php");
?>