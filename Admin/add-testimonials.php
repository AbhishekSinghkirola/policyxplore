<?php
require("header.php");
require("navbar.php");

$msg = '';
$no_of_post = '';
if (isset($_POST['submit'])) {
    // prx($_POST);
    $testimonial_title = get_safe_value($con, $_POST['testimonial_title']);
    $alt = get_safe_value($con, $_POST['alt']);
    $author = get_safe_value($con, $_POST['author']);

    // prx($_FILES);
    $testimonial_image = $_FILES['testimonial_image']['name'];
    $image_type = $_FILES['testimonial_image']['type'];

    if ($image_type != '') {
        if ($image_type != 'image/png' && $image_type != 'image/jpg' && $image_type != 'image/jpeg' && $image_type != 'image/webp') {
            $msg = "Please select only png,jpg and jpeg image formate";
        } else {
            $res = mysqli_query($con, "insert into testimonial(`testimonial_title`, `testimonial_image`, `author`, `alt`) values('$testimonial_title','$testimonial_image','$author','$alt') ") or die("Insert Query Failed!!");
            if ($res) {
                move_uploaded_file($_FILES['testimonial_image']['tmp_name'], "TestimonialImages/$testimonial_image");

               
            }
            header('location: testimonial.php');
        }
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
                <h5 class="mb-0">Add Blog Details</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="testimonial_title" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="formFile">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="testimonial_image" required>
                        </div>

                    </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alternative Text</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="alt" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="author" required />
                        </div>
                    </div>





               


                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit" style="background-color: #008bd3;">Add</button>
                        </div>
                    </div>





                </form>
            </div>
        </div>
    </div>
</div>
<?php
require("footer.php");
?>