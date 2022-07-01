<?php
include("Admin/connection.php");
include("Admin/functions.php");

$res_website = mysqli_query($con,"select * from website_settings") or die("select Query Failed!!");
$row_website =mysqli_fetch_assoc($res_website);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3/bootstrap-5.1.3/dist/css/bootstrap.min.css">
    <!-- fontawsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- google fonts cdnj -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle&family=Dynalight&family=Grape+Nuts&family=Inter&family=Josefin+Sans&family=Lato:wght@300&family=Mansalva&family=Marcellus+SC&family=Mitr:wght@300&family=Montserrat:wght@300&family=Mulish:wght@200&family=Nunito+Sans&family=Open+Sans:wght@300&family=Oswald:wght@200;400&family=Poppins&family=Raleway&family=Roboto+Condensed&family=Roboto:wght@300;400&family=Source+Sans+Pro:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- jquery cdnj -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   

    <title>Policyxplore</title>
</head>

<body>
    <!-- =========top header section -->

    <div style="background-color: #333333;">
        <div class="container p-3" style="width: 80%;">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                    <div class="text-white text-lg-start text-center" id="contact">
                        <span style="border-right: 1px solid rgb(130, 130, 130);"><i class="fa-solid fa-phone"></i>
                            <a href="#" style="font-family: sans-serif;"> +91 7678 207 880 </a></span>
                        <span><i class="fa-solid fa-envelope"></i> <a href="#"> info@policyxplore.com </a></span>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                    <div class="text-white text-lg-end text-center" id="contact">
                        <span><i class="fa-solid fa-circle-exclamation"></i> <a href="#"> Have any questions?
                            </a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==========navbar section -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white" id="nav">
        <div class="container p-2" style="width: 80%;">
            <a href="index.php" class="navbar-brand" id="navlogo"><img src="Admin/WebsiteSettings/<?php echo $row_website['logo'];?>" alt="<?php echo $row_website['alt']; ?>" width="60%"></a>
            <div id="navbtn">
                <!-- <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#clps" style="border: none; outline: none;"> 
                    <i class="fa-solid fa-bars"></i>
                </button> -->
                <i class="fa-solid fa-bars navbar-toggler" data-bs-toggle="collapse" data-bs-target="#clps" style="border: none; color: white;"></i>
            </div>
            <div class="collapse navbar-collapse" id="clps">
                <ul class="navbar-nav ms-auto" id="navhover">
                    <li class="nav-item"><a href="index.php" class="nav-link"><b>Home</b></a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link"><b>About</b></a></li>
               <li class="nav-item dropdown"><a href="blog.php" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown" data-bs-target="#drp"><b>Blog</b></a>


                        <ul class="dropdown-menu" id="drp" style="margin-top:2rem">
                            <?php
                                $dropdown = mysqli_query($con,"select * from category");
                                while($dropdown_row = mysqli_fetch_assoc($dropdown)) {
                                    
                            ?>
                            <li><a href="blog.php?cat_id=<?php echo $dropdown_row['cat_id']; ?>" class="dropdown-item text-dark"><?php echo $dropdown_row['cat_title']; ?></a></li>
                            <li class="dropdown-divider"></li>
                            <?php } ?>
                            <!--<li><a href="#" class="dropdown-item text-dark">Life Insurance</a></li>-->
                        </ul>


                    </li>
                    <li class="nav-item"><a href="faq.php" class="nav-link"><b>FAQ</b></a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link"><b>Contact</b></a></li>


                </ul>
            </div>
        </div>
    </nav>