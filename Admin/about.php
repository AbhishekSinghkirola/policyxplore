<?php
require("header.php");
require("navbar.php");

$msg='';
if (isset($_POST['submit'])) {
    $h1 = get_safe_value($con, $_POST['h1']);
    $desc1 = get_safe_value($con, $_POST['desc1']);
    $h2 = get_safe_value($con, $_POST['h2']);
    $desc2 = get_safe_value($con, $_POST['desc2']);
    $h3 = get_safe_value($con, $_POST['h3']);
    $desc3 = get_safe_value($con, $_POST['desc3']);
    $alt1 = get_safe_value($con, $_POST['alt1']);
    $alt2 = get_safe_value($con, $_POST['alt2']);
    $old_img1 = get_safe_value($con, $_POST['old_img1']);
    $old_img2 = get_safe_value($con, $_POST['old_img2']);

    $img1 = $_FILES['img1']['name'];
    $image_type1 = $_FILES['img1']['type'];
    $img2 = $_FILES['img2']['name'];
    $image_type2 = $_FILES['img2']['type'];

    if ($img1 != '' && $img2 != '') {
        if ($image_type1 != '' && $image_type2 != '') {
            if ($image_type1 != 'image/png' && $image_type1 != 'image/jpg' && $image_type1 != 'image/jpeg' && $image_type1 != 'image/webp') {
                $msg = "Please select only png,jpg and jpeg image formate";
            }elseif($image_type2 != 'image/png' && $image_type2 != 'image/jpg' && $image_type2 != 'image/jpeg' && $image_type2 != 'image/webp') {
                $msg = "Please select only png,jpg and jpeg image formate";

            } else {
                $data = mysqli_query($con, "update about set h1 = '$h1',desc1 = '$desc1', h2 = '$h2', desc2 = '$desc2', h3 = '$h3', desc3 = '$desc3', img1 = '$img1',img2 = '$img2',alt1 = '$alt1',alt2 = '$alt2'") or die("update Query Failed!!");
                if ($data) {
                    move_uploaded_file($_FILES['img1']['tmp_name'], "AboutImages/$img1");
                    move_uploaded_file($_FILES['img2']['tmp_name'], "AboutImages/$img2");
                    unlink("AboutImages/$old_img1");
                    unlink("AboutImages/$old_img2");
                    header('location: about.php');
                }
            }
        }
    }elseif ($img1 != '') {
        if ($image_type1 != '') {
            if ($image_type1 != 'image/png' && $image_type1 != 'image/jpg' && $image_type1 != 'image/jpeg' && $image_type1 != 'image/webp') {
                $msg = "Please select only png,jpg and jpeg image formate";
            } else {
                $data = mysqli_query($con, "update about set h1 = '$h1',desc1 = '$desc1', h2 = '$h2', desc2 = '$desc2', h3 = '$h3', desc3 = '$desc3', img1 = '$img1',alt1 = '$alt1',alt2 = '$alt2'") or die("update Query Failed!!");
                if ($data) {
                    move_uploaded_file($_FILES['img1']['tmp_name'], "AboutImages/$img1");
                    unlink("AboutImages/$old_img1");
                    header('location: about.php');
                }
            }
        }
    }elseif ($img2 != '') {
        if ($image_type2 != '') {
            if ($image_type2 != 'image/png' && $image_type2 != 'image/jpg' && $image_type2 != 'image/jpeg' && $image_type2 != 'image/webp') {
                $msg = "Please select only png,jpg and jpeg image formate";
            } else {
                $data = mysqli_query($con, "update about set h1 = '$h1',desc1 = '$desc1', h2 = '$h2', desc2 = '$desc2', h3 = '$h3', desc3 = '$desc3', img2 = '$img2',alt1 = '$alt1',alt2 = '$alt2'") or die("update Query Failed!!");
                if ($data) {
                    move_uploaded_file($_FILES['img2']['tmp_name'], "AboutImages/$img2");
                    unlink("AboutImages/$old_img2");
                    header('location: about.php');
                }
            }
        }
    }
     else {
        mysqli_query($con, "update about set h1 = '$h1',desc1 = '$desc1', h2 = '$h2', desc2 = '$desc2', h3 = '$h3', desc3 = '$desc3',alt1 = '$alt1',alt2 = '$alt2'") or die("update Query Failed!!");
        header('location: about.php');
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
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update About Page Details</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <?php
                    $res = mysqli_query($con, "select * from about");
                    $row = mysqli_fetch_assoc($res);
                    ?>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Heading 1</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="h1" value="<?php echo $row['h1']; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="desc1" required><?php echo $row['desc1']; ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Heading 2</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="h2" value="<?php echo $row['h2']; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="desc2" required><?php echo $row['desc2']; ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Heading 3</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="h3" value="<?php echo $row['h3']; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control"  aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="desc3"  required ><?php echo $row['desc3']; ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label align-self-center" for="formFile">Image 1</label>
                        <div class="col-sm-10 ">
                            <img src="AboutImages/<?php echo $row['img1'] ?>" alt="Blog Image" style="width: 125px;">
                        </div>

                    </div>
                    <div class="row justify-content-end">

                        <div class="col-sm-10 pt-2 pb-4">
                                <input class="form-control" type="file" id="formFile" name="img1">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alternative text (Image1)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="alt1" value="<?php echo $row['alt1']; ?>" />
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <label class="col-sm-2 col-form-label align-self-center" for="formFile">Image 2</label>
                        <div class="col-sm-10">
                            <img src="AboutImages/<?php echo $row['img2'] ?>" alt="Blog Image" style="width: 125px;">
                        </div>

                    </div>
                    <div class="row justify-content-end">

<div class="col-sm-10 pt-2 pb-2">
        <input class="form-control" type="file" id="formFile" name="img2">
    </div>
</div>
<div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alternative text (Image2)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="alt2" value="<?php echo $row['alt2']; ?>" />
                        </div>
                    </div>
                    <input type="hidden" name="old_img1" value="<?php echo $row['img1']; ?>">
                    <input type="hidden" name="old_img2" value="<?php echo $row['img2']; ?>">



                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit" style="background-color: #008bd3;">Update</button>
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