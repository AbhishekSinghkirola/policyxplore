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
?>

<div class="row">
<div class="col-md-8 col-xl-8 m-auto">
                  <div class="card shadow-none fs-5 text-dark bg-white mb-3" style="background-color: #008bd3;line-height: 35px;">
                    <div class="card-body">
                      <h5 class="card-title h3 text-center text-uppercase" style="color: #008bd3;"><?php echo $row['blog_title']?></h5>
                      <p class="card-text"><?php echo $row['blog_desc'];?></p>
                    </div>
                  </div>
                </div>
</div>

<?php
    require ("footer.php");
?>