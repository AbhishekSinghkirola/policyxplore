<?php
require("header.php");
require("navbar.php");

$msg = '';
$no_of_post = '';
if (isset($_POST['submit'])) {
    // prx($_POST);
    $blog_title = get_safe_value($con, $_POST['blog_title']);
    $blog_desc = get_safe_value($con, $_POST['blog_desc']);
    $added_on = get_safe_value($con, $_POST['added_on']);
    $category = get_safe_value($con, $_POST['category']);

    // prx($_FILES);
    $blog_image = $_FILES['blog_image']['name'];
    $image_type = $_FILES['blog_image']['type'];

    if ($image_type != '') {
        if ($image_type != 'image/png' && $image_type != 'image/jpg' && $image_type != 'image/jpeg') {
            $msg = "Please select only png,jpg and jpeg image formate";
        } else {
            $res = mysqli_query($con, "insert into blog(blog_title,blog_desc,added_on,blog_image,category) values('$blog_title','$blog_desc','$added_on','$blog_image','$category') ") or die("Insert Query Failed!!");
            if ($res) {
                move_uploaded_file($_FILES['blog_image']['tmp_name'], "BlogImages/$blog_image");

                $sql = mysqli_query($con, "select * from category where cat_id = $category");
                $res2 = mysqli_fetch_assoc($sql);
                $no_of_post = $res2['no_of_posts'] + 1;
                mysqli_query($con, "update category set no_of_posts = '$no_of_post' where cat_id=$category") or die("update Query Failed!!");
            }
            header('location: blog.php');
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
                            <input type="text" class="form-control" id="basic-default-name" name="blog_title" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="formFile">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="blog_image" required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="blog_desc" required></textarea>
                        </div>
                    </div>





                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Category</label>
                        <div class="col-sm-10">

                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="category" required>
                                <option selected disabled>Select Category</option>
                                <?php
                                $data = mysqli_query($con, "select * from category");
                                while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></option>
                                <?php
                                }
                                ?>
                                <!-- <option value="2">Two</option>
                                <option value="3">Three</option> -->
                            </select>
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                        <div class="col-md-10">
                            <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input" name="added_on" required>
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