<?php
require("header.php");
require("navbar.php");

$msg ='';
if(isset($_POST['submit'])){
	// prx($_POST);

	$cat_title=get_safe_value($con,$_POST['cat_title']);
    $res=mysqli_query($con,"select * from category where cat_title='$cat_title'");
    if(mysqli_num_rows($res) > 0) {
        $msg="Category already Exsist!!";
    }else {
        mysqli_query($con,"insert into category(cat_title) values('$cat_title') ") or die("Insert Query Failed!!");
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
<div class="row ">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add Category Details</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="cat_title" required/>
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