<?php
require("header.php");
require("navbar.php");

// Website Layout Section
if (isset($_POST['layout_submit'])) {
    $website_name = get_safe_value($con, $_POST['website_name']);
    $alt = get_safe_value($con, $_POST['alt']);
    $id = get_safe_value($con, $_POST['id']);
    $visitor_count = get_safe_value($con, $_POST['visitor_count']);
    $customer_count = get_safe_value($con, $_POST['customer_count']);
    $old_logo = get_safe_value($con, $_POST['old_logo']);
    $logo = $_FILES['logo']['name'];
    $image_type = $_FILES['logo']['type'];
    if ($logo != '') {
        if ($image_type != '') {
            if ($image_type != 'image/png' && $image_type != 'image/jpg' && $image_type != 'image/jpeg'  && $image_type != 'image/webp') {
                $msg = "Please select only png,jpg and jpeg image formate";
            } else {
                $data = mysqli_query($con, "update website_settings set website_name = '$website_name',logo = '$logo', visitor_count = '$visitor_count', customer_count = '$customer_count',alt = '$alt'  where id=$id") or die("update Query Failed!!");
                if ($data) {
                    move_uploaded_file($_FILES['logo']['tmp_name'], "WebsiteSettings/$logo");
                    unlink("WebsiteSettings/$old_logo");
                    header('location: website-settings.php');
                }
            }
        }
    } else {
        mysqli_query($con, "update website_settings set website_name = '$website_name', visitor_count = '$visitor_count', customer_count = '$customer_count',alt = '$alt'  where id=$id") or die("update Query Failed!!");
        header('location: website-settings.php');
    }
}

// Social Links Section
if (isset($_POST['social_submit'])) {
    echo $id = get_safe_value($con, $_POST['id']);
    echo $instagram = get_safe_value($con, $_POST['instagram']);
    echo $facebook = get_safe_value($con, $_POST['facebook']);
    echo $twitter = get_safe_value($con, $_POST['twitter']);
    echo $linkedin = get_safe_value($con, $_POST['linkedin']);
    echo $youtube = get_safe_value($con, $_POST['youtube']);


    mysqli_query($con, "update social_links set instagram='$instagram',facebook='$facebook',twitter='$twitter',linkedin='$linkedin',youtube='$youtube' where id=$id") or die("Update Query Failed!!");
    header('location: website-settings.php');
}




?>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0 text-dark ">Website Layout</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <?php
                    $res = mysqli_query($con, "select * from website_settings");
                    $row = mysqli_fetch_assoc($res);
                    ?>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Website Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="website_name" value="<?php echo $row['website_name']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="formFile">Website Logo</label>
                        <div class="col-sm-10">
                            <img src="WebsiteSettings/<?php echo $row['logo']; ?>" alt="" height="100px" width="auto" class="overflow-hidden">
                        </div>
 

                        <div class="col-sm-12 pt-4">
                            <input class="form-control" type="file" id="formFile" name="logo">
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alternative Text (Logo)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="alt" value="<?php echo $row['alt']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Visitor Count</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="basic-default-name" name="visitor_count" value="<?php echo $row['visitor_count']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Count</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="basic-default-name" name="customer_count" value="<?php echo $row['customer_count']; ?>">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="old_logo" value="<?php echo $row['logo']; ?>">
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="layout_submit" style="background-color: #008bd3;">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Social Links</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                <?php
                    $res1 = mysqli_query($con,"select * from social_links") ;
                    $row1 = mysqli_fetch_assoc($res1);
                ?>
               
                
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="instagram" value="<?php echo $row1['instagram']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Facebook</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="facebook" value="<?php echo $row1['facebook']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Twitter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="twitter" value="<?php echo $row1['twitter']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">LinkedIn</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="linkedin" value="<?php echo $row1['linkedin']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Youtube</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" name="youtube" value="<?php echo $row1['youtube']; ?>">
                        </div>
                    </div>
<input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
                    

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="social_submit" style="background-color: #008bd3;">Save</button>
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