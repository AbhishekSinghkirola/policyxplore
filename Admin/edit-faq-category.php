<?php
    require ("header.php");
    require ("navbar.php");

    $msg = "";
    if(isset($_GET['id'])) {
        $id = get_safe_value($con,$_GET['id']);
        $res = mysqli_query($con,"select * from faq_category where faq_cat_id = $id");
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
        }else {
           echo "<script>window.location.href = 'faq-category.php'; </script>";
        }

    }else  {
        header('loction: faq-category.php');
    }

    if(isset($_POST['submit'])) {
        $faq_cat_name=get_safe_value($con,$_POST['faq_cat_name']);
        $data = mysqli_query($con,"select * from faq_category where faq_cat_name = '$faq_cat_name'");
        if(mysqli_num_rows($data) > 0) {
            $row2 = mysqli_fetch_assoc($data);
            if($row['faq_cat_name'] == $faq_cat_name) {
                header('location: faq-category.php');
                
            }else {
                $msg = "Category Already Exsist!!";
            }
        }else {
            mysqli_query($con,"update faq_category set faq_cat_name = '$faq_cat_name' where faq_cat_id =$id") or die("Update Query Failed!!");
            header('location: faq-category.php');

        }


    }
   
?>
<!-- Error Msg  -->
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
                <h5 class="mb-0">Update FAQ Category</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                 
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="faq_cat_name" value="<?php echo $row['faq_cat_name']; ?>" />
                        </div>
                    </div>

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
    require ("footer.php");
?>