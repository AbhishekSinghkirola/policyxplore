<?php
require("header.php");

?>



<!-- ==========about us banner -->

<div id="aboutus">
</div>

<!-- content -->
<?php 
    $res = mysqli_query($con,"select * from about");
    $row = mysqli_fetch_assoc($res);
?>

<div class="container mt-5 pb-5" style="width: 80%;">
    <h4><b><?php echo $row['h1']; ?></b></h4>
    <p class="mt-4" style="color: grey;">
    <?php echo $row['desc1']; ?>
    </p>

    <div class="row mt-2">
        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mt-4">
            <img src="Admin/AboutImages/<?php echo $row['img1']; ?>" alt="<?php echo $row['alt1']; ?>" class="img-fluid">


        </div>
        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mt-4">
            <h4><b><?php echo $row['h2']; ?></b></h4>
            <p class="mt-4" style="color: grey;">
            <?php echo $row['desc2']; ?>
            </p>

        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mt-4">

            <h4><b><?php echo $row['h3']; ?></b></h4>
            <p class="mt-4" style="color: grey;">
            <?php echo $row['desc3']; ?>
            </p>



        </div>
        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mt-4">
            <img src="Admin/AboutImages/<?php echo $row['img2']; ?>" alt="<?php echo $row['alt2']; ?>" class="img-fluid">

        </div>
    </div>
</div>



<!-- =======footer section -->



<?php
require("footer.php");
?>