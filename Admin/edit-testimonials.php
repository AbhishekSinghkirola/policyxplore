<?php
    require ("header.php");
    require ("navbar.php");

    if(isset($_GET['id'])) {
        $id = get_safe_value($con,$_GET['id']);
        $res = mysqli_query($con,"select * from testimonial where id = $id");
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
        }else {
           echo "<script>window.location.href = 'testimonial.php'; </script>";
        }

    }else  {
        header('loction: testimonial.php');
    }

    if(isset($_POST['submit'])) {
        $testimonial_title=get_safe_value($con,$_POST['testimonial_title']);
        $alt=get_safe_value($con,$_POST['alt']);
        $author=get_safe_value($con,$_POST['author']);
       
        
        
        mysqli_query($con,"update testimonial set testimonial_title='$testimonial_title',author='$author' where id = $id") or die("Update Qquery Failed!!");


        

        header('location: testimonial.php');
    }
   
?>

<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Testimonials</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                         <div class="row mb-3">
                        <label class="col-sm-2 col-form-label align-self-center" for="formFile">Image</label>
                        <div class="col-sm-10">
                            <img src="TestimonialImages/<?php echo $row['testimonial_image']?>" alt="Blog Image" style="width: 125px;">
                            <a href="change-testimonial-image.php?id=<?php echo $id; ?>" class="ms-2">Change Image</a>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alternative Text</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="alt" value='<?php echo $row['alt']; ?>' />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="testimonial_title" value='<?php echo $row['testimonial_title']; ?>' />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="author" value="<?php echo $row['author']; ?>" />
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