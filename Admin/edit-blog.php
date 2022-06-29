<?php
    require ("header.php");
    require ("navbar.php");

    if(isset($_GET['id'])) {
        $id = get_safe_value($con,$_GET['id']);
        $res = mysqli_query($con,"select * from blog where id = $id");
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
        }else {
           echo "<script>window.location.href = 'blog.php'; </script>";
        }

    }else  {
        header('loction: blog.php');
    }

    if(isset($_POST['submit'])) {
        $blog_title=get_safe_value($con,$_POST['blog_title']);
        $blog_desc=get_safe_value($con,$_POST['blog_desc']);
        $added_on=get_safe_value($con,$_POST['added_on']);
        $category=get_safe_value($con,$_POST['category']);
        
        $old_category = get_safe_value($con,$_POST['old_category']);
        
        mysqli_query($con,"update blog set blog_title='$blog_title',blog_desc='$blog_desc',added_on='$added_on',category='$category' where id = $id") or die("Update Qquery Failed!!");

        if($old_category != $category) {
            $sql=mysqli_query($con,"select * from category where cat_id = $category");
        $res2=mysqli_fetch_assoc($sql);
        $no_of_post = $res2['no_of_posts']+1;
        mysqli_query($con,"update category set no_of_posts = '$no_of_post' where cat_id=$category") or die("update Query Failed!!");
            $sql2=mysqli_query($con,"select * from category where cat_id = $old_category");
        $res3=mysqli_fetch_assoc($sql2);
        $no_of_post = $res3['no_of_posts']-1;
        mysqli_query($con,"update category set no_of_posts = '$no_of_post' where cat_id=$old_category") or die("update Query Failed!!");
        }
        

        header('location: blog.php');
    }
   
?>

<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Blog Details</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                         <div class="row mb-3">
                        <label class="col-sm-2 col-form-label align-self-center" for="formFile">Image</label>
                        <div class="col-sm-10">
                            <img src="BlogImages/<?php echo $row['blog_image']?>" alt="Blog Image" style="width: 125px;">
                            <a href="change-blog-image.php?id=<?php echo $id; ?>" class="ms-2">Change Image</a>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="blog_title" value="<?php echo $row['blog_title']; ?>" />
                        </div>
                    </div>
                    <!-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="formFile">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="blog_image" required>
                        </div>

                    </div> -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="blog_desc" required><?php echo $row['blog_desc']; ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Category</label>
                        <div class="col-sm-10">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="category" required>
                                <option selected disabled>Select Category</option>
                                <?php
                                $selected ='';
                                $data = mysqli_query($con,"select * from category");
                                while($row1 = mysqli_fetch_assoc($data)) {
                                    if($row1['cat_id'] == $row['category']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected = '';
                                    }
                            ?>
                                <option <?php echo $selected; ?> value="<?php  echo $row1['cat_id'];?>"><?php  echo $row1['cat_title'];?></option>
                                <?php
                                    }
                                ?>
                                <!-- <option value="2">Two</option>
                                <option value="3">Three</option> -->
                            </select>
                            <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                        <div class="col-md-10">
                          <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input" name="added_on" value="<?php echo $row['added_on']; ?>" >
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