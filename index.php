<?php
require("header.php");


if (isset($_POST['submit_quote'])) {
    $fname = get_safe_value($con, $_POST['fname']);
    $email = get_safe_value($con, $_POST['email']);
    $contact = get_safe_value($con, $_POST['contact']);
    $type_of_insurance = get_safe_value($con, $_POST['type_of_insurance']);

    mysqli_query($con, "insert into query_details(fname,email,contact,type_of_insurance) values ('$fname','$email','$contact','$type_of_insurance')") or die("Insert Query Failed!!");
}
if (isset($_POST['submit_help'])) {
    $help_name = get_safe_value($con, $_POST['help_name']);
    $help_email = get_safe_value($con, $_POST['help_email']);
    $help_contact = get_safe_value($con, $_POST['help_contact']);


    mysqli_query($con, "insert into help(help_name,help_email,help_contact) values ('$help_name','$help_email','$help_contact')") or die("Insert Query Failed!!");
}
?>

<!-- banner with form page -->

<div id="banner">
    <div class="container pt-5 pb-5">

        <div class="row ">
            <div class="col-12 col-lg-5 col-md-12 col-sm-12">
                <form action="" class="p-5 w-100 m-auto" id="form" method="POST">
                    <h4><b>Compare and Save Money</b></h4>
                    <input type="text" name="fname" id="" placeholder="Full Name" required>
                    <br>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <br>
                    <input type="number" name="contact" placeholder="Contact Number" required>
                    <br>
                    <select name="type_of_insurance" required>
                        <option selected>Type of Insurance</option>
                        <?php
                        $data = mysqli_query($con, "select * from faq_category");
                        while ($row = mysqli_fetch_assoc($data)) {
                        ?>
                            <option value="<?php echo $row['faq_cat_id']; ?>"><?php echo $row['faq_cat_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <input type="checkbox" id="checkbox">
                    <label for="">I authorize Policyxplore to contact me and I understand that this will override the DND status on my mobile number</label>
                    <br>
                    <input type="submit" value="GET A QUOTE" id="formbtn" name="submit_quote">
                </form>
            </div>
            <div class="col-12 col-lg-7 col-md-12 col-sm-12 text-start text-lg-end">
                <img src="assets/images/banner/Hospital motion.gif" alt="" class="w-100" id="bannergif">
            </div>
        </div>



        <!-- <form action="" class="p-5 w-100 m-auto" id="form">
                <h4>REQUEST A QUOTE</h4>
                <input type="text" name="" id="" placeholder="Full Name">
                <br>
                <input type="email" placeholder="E-mail">
                <br>
                <input type="number" placeholder="Contact Number">
                <br>
                <select name="" id="">
                    <option value="Type of Insurance" selected>Type of Insurance</option>
                    <option value="Auto Insurance">Auto Insurance</option>
                    <option value="Life Insurance">Life Insurance</option>
                    <option value="Medical Insurance">Medical Insurance</option>
                </select>
                <br>
                <input type="checkbox" id="checkbox">
                <label for="">Check this box if you'd like to receive information from business
                    schools or other service provider.</label>
                <br>
                <input type="submit" value="GET A QUOTE" id="formbtn">
            </form> -->
    </div>
</div>

<!-- =======services section -->

<div class="container mt-5 pb-5" style="width: 80%;">
    <div class="row">
        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
            <div class="box text-center">
                <div class="img">
                    <img src="assets/images/logo/services-image1@2x.png" width="162" height="157" alt="hover effect">
                    <img src="assets/images/logo/services-image1-hover@2x.png" width="162" height="157" alt="hover effect">
                </div>
                <div class="text mt-3" id="text">
                    <h5 style="color: #fdc210;"><b>HEALTH INSURANCE</b></h5>
                    <p class="mt-4" style="color: grey;">Health insurance is a type of insurance contract that is known.... <a href="healthinsurance.php"><b>Read More</b></a></p>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
            <div class="box text-center">
                <div class="img">
                    <img src="assets/images/logo/services-image2@2x.png" width="162" height="157" alt="hover effect">
                    <img src="assets/images/logo/services-image2-hover@2x.png" width="162" height="157" alt="hover effect">
                </div>
                <div class="text mt-3" id="text">
                    <h5 style="color: #015c89;"><b>LIFE INSURANCE</b></h5>
                    <p class="mt-4" style="color: grey;">life insurance offers financial security to the beneficiary.... <a href="lifeinsurance.php"><b>Read More</b></a></p>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
            <div class="box text-center">
                <div class="img">
                    <img src="assets/images/logo/services-image3@2x.png" width="162" height="157" alt="hover effect">
                    <img src="assets/images/logo/services-image3-hover@2x.png" width="162" height="157" alt="hover effect">
                </div>
                <div class="text mt-3" id="text">
                    <h5 style="color: #f78848;"><b>MOTOR INSURANCE</b></h5>
                    <p class="mt-4" style="color: grey;">According to the Motor Vehicles Act of 1988,vehicles operating.... <a href="motorinsurance.php"><b>Read More</b></a></p>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
            <div class="box text-center">
                <div class="img">
                    <img src="assets/images/logo/services-image4@2x.png" width="162" height="157" alt="hover effect">
                    <img src="assets/images/logo/services-image4-hover@2x.png" width="162" height="157" alt="hover effect">
                </div>
                <div class="text mt-3" id="text">
                    <h5 style="color: #7faa4c;"><b>TRAVEL INSURANCE</b></h5>
                    <p class="mt-4" style="color: grey;">Travel insurance is not as crucial to many people as .... <a href="travelinsurance.php"><b>Read More</b></a></p>

                </div>
            </div>
        </div>
    </div>
    <hr class="mt-5">
</div>

<!-- =========== chart section -->

<div class="container mt-3 pb-5" style="width: 80%;">
    <div class="row">
        <div class="col-12 col-lg-6 col-md-12 col-sm-12">
            <small class="text-secondary">WHY POLICYXPLORE IS THE BEST</small>
            <h5 style="color: #0893ee;"><b>We assist clients in making wiser judgments when choosing a budget-friendly insurance plan.
                </b></h5>
            <p class="mt-4 text-secondary">Service provider Policyxplore, which focuses on the insurance industry, has been active in the market for more than 12 years. We provide a clear and fair comparison of the policies, prices, and extra advantages that insurance providers provide. At policyxplore, we help our customers from beginning to end, whether they are buying a policy or filing a claim for a settlement. With us, online policy issuance is additionally speedy and hassle-free.

            </p>

            <a href="about.php"> <button id="btn1" class="p-2 mt-4" style="padding: 10px 10px;"><i class="fa-solid fa-thumbs-up" style="border-right: 1px solid rgb(141, 141, 141);"></i> CLICK
                    HERE</button></a>


        </div>
        <div class="col-12 col-lg-6 col-md-12 col-sm-12 text-center">
            <img src="assets/images/banner/why1.png" alt="" class="img-fluid">
        </div>
    </div>
</div>

<!-- ==========FAQ section -->

<div class="container mt-5 pb-5">
    <h3>FAQ'S</h3>

    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <?php
        $sqlf = "SELECT * FROM faq_category";
        $queryf = mysqli_query($con, $sqlf);
        $i = 1;
        while ($rowf = mysqli_fetch_assoc($queryf)) {

            if ($i == 1) {
        ?>

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#<?php echo substr($rowf['faq_cat_name'], 0, 2); ?>" type="button" role="tab" aria-controls="home" aria-selected="true"><?php echo $rowf['faq_cat_name']; ?></button>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#<?php echo substr($rowf['faq_cat_name'], 0, 2); ?>" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php echo $rowf['faq_cat_name']; ?></button>
                </li>
        <?php
            }
            $i++;
        }
        ?>







    </ul>
    <div class="tab-content" id="myTabContent">
        <?php
        $sqlf1 = "SELECT * FROM faq_category";
        $queryf1 = mysqli_query($con, $sqlf1);
        $x = 1;
        while ($rowf1 = mysqli_fetch_assoc($queryf1)) {

            if ($x == 1) {


        ?>

                <div class="tab-pane fade show active" id="<?php echo substr($rowf1['faq_cat_name'], 0, 2); ?>" role="tabpanel" aria-labelledby="home-tab">


                    <div class="row">

                        <?php
                            $faqs = "SELECT * FROM faq WHERE faq_category = '".$rowf1['faq_cat_id']."' LIMIT 0,4";
                            $fquery = mysqli_query($con, $faqs);
                            $y=1;
                            while($rows = mysqli_fetch_assoc($fquery)){
                            if($y==1){
                        ?>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="row mt-5">
                                <div class="col-2">
                                    <svg class="message-icon1" xmlns="http://www.w3.org/2000/svg" height="48" width="48" style="fill: grey;">
                                        <path d="M12 28.05H27.65V25.05H12ZM12 21.55H36V18.55H12ZM12 15.05H36V12.05H12ZM4 44V7Q4 5.85 4.9 4.925Q5.8 4 7 4H41Q42.15 4 43.075 4.925Q44 5.85 44 7V33Q44 34.15 43.075 35.075Q42.15 36 41 36H12ZM7 36.75 10.75 33H41Q41 33 41 33Q41 33 41 33V7Q41 7 41 7Q41 7 41 7H7Q7 7 7 7Q7 7 7 7ZM7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7V33Q7 33 7 33Q7 33 7 33V36.75Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="col-10">
                                    <p><?=$rows['question'];?></p>
                                    <small style="color: grey; font-size: 0.8rem;">
                                    <?=$rows['solution'];?>
                                    </small>
                                </div>
                            </div>

                        </div>
                        <?php
                        $y=2;
                            }
                            else{
                        ?>

                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="row mt-5">
                                <div class="col-2">
                                    <svg class="message-icon1" xmlns="http://www.w3.org/2000/svg" height="48" width="48" style="fill: grey;">
                                        <path d="M12 28.05H27.65V25.05H12ZM12 21.55H36V18.55H12ZM12 15.05H36V12.05H12ZM4 44V7Q4 5.85 4.9 4.925Q5.8 4 7 4H41Q42.15 4 43.075 4.925Q44 5.85 44 7V33Q44 34.15 43.075 35.075Q42.15 36 41 36H12ZM7 36.75 10.75 33H41Q41 33 41 33Q41 33 41 33V7Q41 7 41 7Q41 7 41 7H7Q7 7 7 7Q7 7 7 7ZM7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7V33Q7 33 7 33Q7 33 7 33V36.75Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="col-10">
                                    <p><?=$rows['question'];?></p>
                                    <small style="color: grey; font-size: 0.8rem;"><?=$rows['solution'];?></small>
                                </div>
                            </div>

                        </div>
                        <?php
                        $y=1;
                            }
                        }
                        ?>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="row mt-5">
                                <div class="col-2">
                                    <svg class="message-icon1" xmlns="http://www.w3.org/2000/svg" height="48" width="48" style="fill: grey;">
                                        <path d="M12 28.05H27.65V25.05H12ZM12 21.55H36V18.55H12ZM12 15.05H36V12.05H12ZM4 44V7Q4 5.85 4.9 4.925Q5.8 4 7 4H41Q42.15 4 43.075 4.925Q44 5.85 44 7V33Q44 34.15 43.075 35.075Q42.15 36 41 36H12ZM7 36.75 10.75 33H41Q41 33 41 33Q41 33 41 33V7Q41 7 41 7Q41 7 41 7H7Q7 7 7 7Q7 7 7 7ZM7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7V33Q7 33 7 33Q7 33 7 33V36.75Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="col-10">
                                    <p>What are the advantages of health insurance?</p>
                                    <small style="color: grey; font-size: 0.8rem;">Health insurance has several advantages, including the cashless facility, which allows you to receive treatment while having the expense reimbursed by your insurance company. Pre- and post-hospitalization coverage: The insured will cover expenses incurred before and after your treatment. No claim bonus: If you don't claim the term, you'll get a discount on your next premium, free medical exams, a tax break, and more</small>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="row mt-5">
                                <div class="col-2">
                                    <svg class="message-icon1" xmlns="http://www.w3.org/2000/svg" height="48" width="48" style="fill: grey;">
                                        <path d="M12 28.05H27.65V25.05H12ZM12 21.55H36V18.55H12ZM12 15.05H36V12.05H12ZM4 44V7Q4 5.85 4.9 4.925Q5.8 4 7 4H41Q42.15 4 43.075 4.925Q44 5.85 44 7V33Q44 34.15 43.075 35.075Q42.15 36 41 36H12ZM7 36.75 10.75 33H41Q41 33 41 33Q41 33 41 33V7Q41 7 41 7Q41 7 41 7H7Q7 7 7 7Q7 7 7 7ZM7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7V33Q7 33 7 33Q7 33 7 33V36.75Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="col-10">
                                    <p>What is cashless hospitalization, and how does it work?</p>
                                    <small style="color: grey; font-size: 0.8rem;">You can avoid paying for hospitalization if you have a health insurance plan. As the term implies, cashless hospitalization allows you to receive care without having to spend cash. How? Insurance companies have several network hospitals, and if a policyholder is admitted to one of them, the expense is reimbursed by the insurer. One of the most important factors we evaluate when choosing an insurance policy is whether or not the provider has a network hospital in your area.</small>
                                </div>
                            </div>

                        </div>
                    </div> -->


                </div>
            <?php

            } else {

            ?>
                <div class="tab-pane fade" id="<?php echo substr($rowf1['faq_cat_name'], 0, 2); ?>" role="tabpanel" aria-labelledby="profile-tab">


                    <div class="row">
                    <?php
                            $faqs = "SELECT * FROM faq WHERE faq_category = '".$rowf1['faq_cat_id']."' LIMIT 0,4";
                            $fquery = mysqli_query($con, $faqs);
                            $y=1;
                            while($rows = mysqli_fetch_assoc($fquery)){
                            if($y==1){
                        ?>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="row mt-5">
                                <div class="col-2">
                                    <svg class="message-icon1" xmlns="http://www.w3.org/2000/svg" height="48" width="48" style="fill: grey;">
                                        <path d="M12 28.05H27.65V25.05H12ZM12 21.55H36V18.55H12ZM12 15.05H36V12.05H12ZM4 44V7Q4 5.85 4.9 4.925Q5.8 4 7 4H41Q42.15 4 43.075 4.925Q44 5.85 44 7V33Q44 34.15 43.075 35.075Q42.15 36 41 36H12ZM7 36.75 10.75 33H41Q41 33 41 33Q41 33 41 33V7Q41 7 41 7Q41 7 41 7H7Q7 7 7 7Q7 7 7 7ZM7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7V33Q7 33 7 33Q7 33 7 33V36.75Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="col-10">
                                    <p><?=$rows['question'];?></p>
                                    <small style="color: grey; font-size: 0.8rem;">
                                    <?=$rows['solution'];?>
                                    </small>
                                </div>
                            </div>

                        </div>
                        <?php
                        $y=2;
                            }
                            else{
                        ?>

                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="row mt-5">
                                <div class="col-2">
                                    <svg class="message-icon1" xmlns="http://www.w3.org/2000/svg" height="48" width="48" style="fill: grey;">
                                        <path d="M12 28.05H27.65V25.05H12ZM12 21.55H36V18.55H12ZM12 15.05H36V12.05H12ZM4 44V7Q4 5.85 4.9 4.925Q5.8 4 7 4H41Q42.15 4 43.075 4.925Q44 5.85 44 7V33Q44 34.15 43.075 35.075Q42.15 36 41 36H12ZM7 36.75 10.75 33H41Q41 33 41 33Q41 33 41 33V7Q41 7 41 7Q41 7 41 7H7Q7 7 7 7Q7 7 7 7ZM7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7Q7 7 7 7V33Q7 33 7 33Q7 33 7 33V36.75Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="col-10">
                                    <p><?=$rows['question'];?></p>
                                    <small style="color: grey; font-size: 0.8rem;"><?=$rows['solution'];?></small>
                                </div>
                            </div>

                        </div>
                        <?php
                        $y=1;
                            }
                        }
                        ?>
                    </div>
                    



                </div>
        <?php

            }
            $x++;
        }
        ?>



















    </div>


</div>
</div>

<!-- =====services clamins -->

<div id="claims">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-12 col-sm-12 text-center">
                <img src="assets/images/cards/claim-image.png" alt="" class="img-fluid" width="575" height="541">
            </div>
            <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                <div class="row mt-5" id="claimicon">
                    <div class="col-2 col-lg-1 col-md-2 col-sm-2">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    <div class="col-10 col-lg-11 col-md-10 col-sm-10">
                        <h4>- Trusted over 40K people</h4>
                        <!--<p>The name that people trust</p>-->
                    </div>
                    <div class="col-2 col-lg-1 col-md-2 col-sm-2">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div class="col-10 col-lg-11 col-md-10 col-sm-10">
                        <h4>- End-to-end assistance on claims</h4>
                        <!--<p>Direct Claim Settlement without intervention of TPA</p>-->
                    </div>
                    <div class="col-2 col-lg-1 col-md-2 col-sm-2">
                        <i class="fa-brands fa-hire-a-helper"></i>
                    </div>
                    <div class="col-10 col-lg-11 col-md-10 col-sm-10">
                        <h4>- Instant Online policy</h4>
                        <!--<p>Comprehensive Support through our dedicated team</p>-->
                    </div>
                    <div class="col-2 col-lg-1 col-md-2 col-sm-2">
                        <i class="fa-solid fa-piggy-bank"></i>
                    </div>
                    <div class="col-10 col-lg-11 col-md-10 col-sm-10">
                        <h4>- Direct Claim settlement</h4>
                        <!--<p>-->
                        <!--Easy claim procedures with no hassle-->
                        <!--    </p>-->
                    </div>
                    <div class="col-2 col-lg-1 col-md-2 col-sm-2">
                        <i class="fa-solid fa-earth-africa"></i>
                    </div>
                    <div class="col-10 col-lg-11 col-md-10 col-sm-10">
                        <h4>-Transparent and unbiased comparison</h4>
                        <!--<p>Host of discounts – No claim bonus, Discount for Automobile</p>-->
                    </div>
                    <div class="col-2 col-lg-1 col-md-2 col-sm-2">
                        <i class="fa-solid fa-hourglass"></i>
                    </div>
                    <div class="col-10 col-lg-11 col-md-10 col-sm-10">
                        <h4>- save your money</h4>
                        <!--<p>Host of discounts – No claim bonus, Discount for Automobile</p>-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- ========recent blog section -->

<div class="container mt-5 pb-5" style="width: 80%;">
    <h3><b>RECENT BLOG</b></h3>
    <div class="row mt-5">
        <?php
        $limit = 3;
        $res_blog = mysqli_query($con, "select blog.*,category.* from blog left join category on blog.category=category.cat_id order by blog.id desc LIMIT {$limit}");
        while ($row_blog = mysqli_fetch_assoc($res_blog)) {

        ?>
            <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                <div class="height" style="height: 233px; overflow:hidden;">
                    <a href="singleblog.php?id=<?php echo $row_blog['id']; ?>">
                        <img src="Admin/BlogImages/<?php echo $row_blog['blog_image']; ?>" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="row mt-4">
                    <div class="col-2 text-center">
                        <h1 style="border-bottom: 2px solid #008bd3; font-family: sans-serif; font-size: 1.6rem;"><?php echo date("d", strtotime($row_blog['added_on'])); ?>
                        </h1>
                        <h5 style="border-bottom: 2px solid #008bd3;  font-family: sans-serif;"><?php echo date("F", strtotime($row_blog['added_on'])); ?></h5>
                        
                    </div>
                    <div class="col-10">
                        <h6><b><?php echo $row_blog['blog_title']; ?></b></h6>
                        <p class="mt-3" style="font-size: 0.8rem; color: grey;">
                            <?php
                            $string = strip_tags($row_blog['blog_desc']);
                            if (strlen($string) > 100) {

                                // truncate string
                                $stringCut = substr($string, 0, 100);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '... ';
                            }
                            echo $string;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- <div class="col-12 col-lg-4 col-md-4 col-sm-12">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/blog/blog3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/blog/blog6.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/blog/blog5.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="row mt-4">
                <div class="col-2 ">
                    <h1 style="border-bottom: 2px solid #008bd3;font-family: sans-serif; font-size: 1.6rem;">18</h1>
                    <h5 style="border-bottom: 2px solid #008bd3;">JUN</h5>
                    <p><i class="fa-solid fa-comment"></i> 1</p>
                </div>
                <div class="col-10">
                    <h6 class="mt-1"><b>DONEC QUIS EX VEL TINCIDUNT</b></h6>
                    <p class="mt-4" style="font-size: 0.8rem; color: grey;">Lorem ipsum dolor sit amet, consectetur
                    </p>
                    <p style="font-size: 0.8rem; color: grey;">adipiscing elit. Proin tincidunt nunc...</p>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-4 col-md-4 col-sm-12">
            <a href="#">
                <img src="assets/images/blog/blog1.jpg" alt="" class="img-fluid">
            </a>
            <div class="row mt-4">
                <div class="col-2">
                    <h1 style="border-bottom: 2px solid #008bd3;font-family: sans-serif; font-size: 1.6rem;">18</h1>
                    <h5 style="border-bottom: 2px solid #008bd3;">JUN</h5>
                    <p><i class="fa-solid fa-comment"></i> 1</p>
                </div>
                <div class="col-10">
                    <h6 class="mt-1"><b>DONEC QUIS EX VEL TINCIDUNT</b></h6>
                    <p class="mt-4" style="font-size: 0.8rem; color: grey;">Lorem ipsum dolor sit amet, consectetur
                    </p>
                    <p style="font-size: 0.8rem; color: grey;">adipiscing elit. Proin tincidunt nunc...</p>
                </div>
            </div>
        </div> -->
    </div>
</div>

<!-- ========review section -->

<div class=" mt-5 pb-5" style=" background-color: #0893ee; min-height: 261px; height: auto;">

    <div id="crsl" class="carousel slide pt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $count = 1;
            $res = mysqli_query($con, "select * from testimonial");
            while ($row1 = mysqli_fetch_assoc($res)) {
                if ($count == 1) {


            ?>
                    <div class="carousel-item active">
                        <div class="text-center">
                           
                            <img src="Admin/TestimonialImages/<?php echo $row1['testimonial_image']; ?>" alt="<?php echo $row1['alt']; ?>" style="border-radius: 50%;" width="180px" height="180px">
                            
                            <div class="star mt-3">
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8 m-auto">
                                <p class="text-white mt-3"><?php echo $row1['testimonial_title']; ?></p>
                                </div>
                                </div>
                            </div>

                            <p class="text-white"><b><?php echo $row1['author']; ?></b></p>
                        </div>
                    </div>
                <?php
                } else {


                ?>
                    <div class="carousel-item">
                        <div class="text-center">
                           
                            <img src="Admin/TestimonialImages/<?php echo $row1['testimonial_image']; ?>" alt="<?php echo $row1['alt']; ?>" style="border-radius: 50%;" width="180px" height="180px">
                           
                            <div class="star mt-3">
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                            </div>
                            <div class="container">
                              <div class="row">
                                    <div class="col-12 col-lg-8 col-md-8 m-auto">
                                <p class="text-white mt-3"><?php echo $row1['testimonial_title']; ?></p>
                                </div>
                                </div>
                            </div>

                            <p class="text-white"><b><?php echo $row1['author']; ?></b></p>
                        </div>
                    </div>
            <?php  }
                $count++;
            }
            ?>
            <!-- <div class="carousel-item">
                <div class="text-center">
                    <img src="assets/images/reviews/4-image.jpg" alt="" style="border-radius: 50%;" width="10%">
                    <div class="star mt-3">
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                    </div>
                    <div class="container">
                        <p class="text-white mt-3">“Policyxplore.com helped me quickly to take decision ”</p>
                    </div>

                    <p class="text-white"><b>Bipinchandra Desai</b></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="text-center">
                    <img src="assets/images/reviews/1-image-1200x1600.jpg" alt="" style="border-radius: 50%;" width="10%">
                    <div class="star mt-3">
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                    </div>
                    <div class="container">
                        <p class="text-white mt-3">“Executive was very good in guiding for the best plan according to my requirements ”</p>
                    </div>

                    <p class="text-white"><b>PARSHURAM KADAM</b></p>
                </div>
            </div>  -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#crsl" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#crsl" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>



<!-- ======== stats start -->
<?php
$data_stats = mysqli_query($con, "select * from website_settings");
$row_stats = mysqli_fetch_assoc($data_stats);
?>
<div style="padding-bottom: 5rem;" id="stats" class="banner-section">
    <div class="container pt-2" style="width: 80%;">
        <div class="row" style="margin-top: 4rem;">
            <div class="col-12 col-lg-6 col-md-6 col-sm-12" style="margin-top: 4rem;">
                <div class="text-center">
                    <div class="circle position-relative" id="count1">
                        <h2 data-target="<?php echo $row_stats['visitor_count']; ?>" class="count">0 <span>+</span></h2>
                        <span class="position-absolute top-0 start-0 translate-middle p-4 rounded-circle" style="background-color: #f27935; border: 8px solid white;">
                            <i class="fa-solid fa-newspaper p-2" style="font-size: 1.3rem; color: white;"></i>
                        </span>
                    </div>
                    <p class="mt-3 text-white"><b>Visitors</b></p>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-md-6 col-sm-12" style="margin-top: 4rem;">
                <div class="text-center">
                    <div class="circle position-relative" id="count2">
                        <h2 data-target="<?php echo $row_stats['customer_count']; ?>" class="count">0</h2>
                        <span class="position-absolute top-0 start-0 translate-middle p-4 rounded-circle" style="background-color: #6ca04a; border: 8px solid white;">
                            <i class="fa-solid fa-graduation-cap" style="font-size: 1.3rem; color: white;"></i>
                        </span>
                    </div>
                    <p class="mt-3 text-white"><b>HAPPY CUSTOMERS</b></p>
                </div>

            </div>
            <!--<div class="col-12 col-lg-4 col-md-4 col-sm-12" style="margin-top: 4rem;">-->

            <!--        <img src="assets/images/cards/1.png" alt="" class="img-fluid">-->

            <!--</div>-->

        </div>
    </div>
</div>




<!-- ======= news latter section -->


<div id="news">
    <div class="container pt-5 ">
        <div class="text-center">
            <p style="font-size: 1.5rem; padding-bottom: 2rem;">For More Help</p>
        </div>
        <!-- <div class="form w-50"
                    style="background-color: #edeef2; padding: 2rem; position: absolute; left: 25%; filter: drop-shadow(2px 4px 2px grey);"
                    id="formcontainer">
                    
                </div> -->

        <form action="" id="formcontainer" class="mb-5" method="POST">
            <div class="row gx-2">
                <div class="col-12 col-lg-3 col-md-3 col-sm-12 mt-3">
                    <input type="text" name="help_name" id="" placeholder="Your Name">

                </div>
                <div class="col-12 col-lg-3 col-md-3 col-sm-12 mt-3">
                    <input type="text" name="help_email" id="" placeholder="Email Address">

                </div>
                <div class="col-12 col-lg-3 col-md-3 col-sm-12 mt-3">
                    <input type="text" name="help_contact" id="" placeholder="Contact number">

                </div>
                <div class="col-12 col-lg-3 col-md-3 col-sm-12 mt-3">
                    <input type="submit" name="submit_help" id="formbtn" value="SUBMIT">

                </div>
            </div>
        </form>

    </div>
</div>


<!-- ======= last section before the footer -->


<div id="beforefooter" class="pb-5 pt-5">
    <div class="container pb-3" style="width: 80%;">
        <h3 style="color: grey;"><b>OUR PARTNERS</b></h3>
    </div>
    <div id="partners" class="carousel carousel-dark slide " data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="container" style="width: 80%;">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-3">
                            <img src="assets/images/partners/1.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-3">
                            <img src="assets/images/partners/2.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-3">
                            <img src="assets/images/partners/3.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-3">
                            <img src="assets/images/partners/4.jpg" alt="" class="img-fluid">
                        </div>
                    </div>

                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3">
                            <img src="assets/images/partners/5.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-3">
                            <img src="assets/images/partners/6.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-3">
                            <img src="assets/images/partners/7.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-3">
                            <img src="assets/images/partners/8.jpg" alt="" class="img-fluid">
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#partners" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#partners" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>





<!-- =======footer section -->



<?php
require("footer.php");
?>
