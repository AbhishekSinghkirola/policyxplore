<?php
require("header.php");
require("navbar.php");

$msg ='';
if(isset($_POST['submit'])){
	// prx($_POST);

	$faq_cat_name=get_safe_value($con,$_POST['faq_cat_name']);
    $res=mysqli_query($con,"select * from faq_category where faq_cat_name='$faq_cat_name'");
    if(mysqli_num_rows($res) > 0) {
        $msg="Category already Exsist!!";
    }else {
        mysqli_query($con,"insert into faq_category(faq_cat_name) values('$faq_cat_name') ") or die("Insert Query Failed!!");
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
<div class="row ">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add Faq Category</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="faq_cat_name" required/>
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