<?php
    require ("header.php");
    require ("navbar.php");

    $msg = "";
    if(isset($_GET['id'])) {
        $id = get_safe_value($con,$_GET['id']);
        $res = mysqli_query($con,"select * from category where cat_id = $id");
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
        }else {
           echo "<script>window.location.href = 'category.php'; </script>";
        }

    }else  {
        header('loction: category.php');
    }

    if(isset($_POST['submit'])) {
        $cat_title=get_safe_value($con,$_POST['cat_title']);
        $data = mysqli_query($con,"select * from category where cat_title = '$cat_title'");
        if(mysqli_num_rows($data) > 0) {
            $row2 = mysqli_fetch_assoc($data);
            // echo $row['cat_title'];die();
            if($row['cat_title'] == $cat_title) {
                header('location: category.php');
                
            }else {
                $msg = "Category Already Exsist!!";
            }
        }else {
            mysqli_query($con,"update category set cat_title = '$cat_title' where cat_id =$id") or die("Update Query Failed!!");
            header('location: category.php');

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
                <h5 class="mb-0">Update Category Details</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                 
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="cat_title" value="<?php echo $row['cat_title']; ?>" />
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