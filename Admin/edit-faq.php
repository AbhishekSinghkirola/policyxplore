<?php
    require ("header.php");
    require ("navbar.php");

    if(isset($_GET['id'])) {
        $id = get_safe_value($con,$_GET['id']);
        $res = mysqli_query($con,"select * from faq where faq_id = $id");
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
        }else {
           echo "<script>window.location.href = 'faq.php'; </script>";
        }

    }else  {
        header('loction: faq.php');
    }

    if(isset($_POST['submit'])) {
        $question=get_safe_value($con,$_POST['question']);
        $solution=get_safe_value($con,$_POST['solution']);
        $faq_category=get_safe_value($con,$_POST['faq_category']);

        
        $old_faq_category = get_safe_value($con,$_POST['old_faq_category']);
        
        mysqli_query($con,"update faq set question='$question',solution='$solution',faq_category='$faq_category' where faq_id = $id") or die("Update Qquery Failed!!");

       

        header('location: faq.php');
    }
   
?>

<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update FAQ</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                        
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Question</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="question" value="<?php echo $row['question']; ?>" />
                        </div>
                    </div>
                 
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Solution</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="solution" required><?php echo $row['solution']; ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Category</label>
                        <div class="col-sm-10">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="faq_category" required>
                                <option selected disabled>Select Category</option>
                                <?php
                                $selected ='';
                                $data = mysqli_query($con,"select * from faq_category");
                                while($row1 = mysqli_fetch_assoc($data)) {
                                    if($row1['faq_cat_id'] == $row['faq_category']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected = '';
                                    }
                            ?>
                                <option <?php echo $selected; ?> value="<?php  echo $row1['faq_cat_id'];?>"><?php  echo $row1['faq_cat_name'];?></option>
                                <?php
                                    }
                                ?>
                            
                            </select>
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