<?php
require("header.php");
require("navbar.php");
$msg ='';
if(isset($_GET['id'])) {
    $id = get_safe_value($con,$_GET['id']);
    $res = mysqli_query($con,"select * from testimonial where id = $id");
    if(mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
    }else {
       echo "<script>window.location.href = 'edit-testimonials.php'; </script>";
    }

}else  {
    header('loction: edit-testimonials.php');
}

if(isset($_POST['submit'])) {

    $old_testimonial_image = get_safe_value($con,$_POST['old_testimonial_image']);
    $testimonial_image = $_FILES['testimonial_image']['name'];
    $image_type = $_FILES['testimonial_image']['type'];

    if($image_type!='') {
        if($image_type!='image/png' && $image_type!='image/jpg' && $image_type!='image/jpeg' && $image_type!='image/webp'){
            $msg="Please select only png,jpg and jpeg image formate";
        }else{
            if($testimonial_image != '') {
                $res = mysqli_query($con,"update testimonial set testimonial_image='$testimonial_image' where id=$id");
                if($res) {
                    move_uploaded_file($_FILES['testimonial_image']['tmp_name'], "TestimonialImages/$testimonial_image");
                    unlink("TestimonialImages/$old_testimonial_image");
                }
                header('location: testimonial.php');
        
            }else {

                header('location: testimonial.php');
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
                <h5 class="mb-0">Change Testimonial Image</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                       
                        <div class="col-sm-10 mb-4">
                            <img src="TestimonialImages/<?php echo $row['testimonial_image']?>" alt="Blog Image" style="width: 125px;">
                        </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="formFile">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="testimonial_image">
                        </div>

                    </div>
                    <input type="hidden" name="old_testimonial_image" value="<?php echo $row['testimonial_image']; ?>">
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            <a type="button" href="edit-testimonials.php?id=<?php echo $id; ?>" class="btn btn-secondary" name="submit">Back</a>
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