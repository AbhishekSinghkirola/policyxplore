<?php
require("header.php");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


?>


<!-- blog content section -->

<div class="container mt-5 pb-5" style="width: 80%;">
    <div class="row">
        <?php
        if (isset($_GET['id'])) {
            $id = get_safe_value($con, $_GET['id']);
            $res4 = mysqli_query($con, "select blog.*,category.* from blog left join category on blog.category=category.cat_id where category = $id order by blog.id desc ");
            if (mysqli_num_rows($res4) > 0) {
                while ($row4 = mysqli_fetch_assoc($res4)) {

                
        
        ?>
        <div class="col-12 col-lg-8 col-md-12 col-sm-12">

            <div class="card p-4">
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                        <img src="Admin/BlogImages/<?php echo $row4['blog_image']; ?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                        <div class="text">
                            <a href="singleblog.php?id=<?php echo $row4['id']; ?>" class="text-decoration-none">
                                <h4 style="color: #0893ee;"><?php echo $row4['blog_title']; ?></h4>
                            </a>
                            <p class="text-secondary"><i class="fa-solid fa-tags"></i> <?php echo $row4['cat_title']; ?> &nbsp;&nbsp;
                                <i class="fa-solid fa-calendar-days"></i> <?php echo date("dF,Y", strtotime($row4['added_on'])); ?>
                            </p>
                            <small>
                                <?php
                                $string = strip_tags($row4['blog_desc']);
                                if (strlen($string) > 50) {

                                    // truncate string
                                    $stringCut = substr($string, 0, 50);
                                    $endPoint = strrpos($stringCut, ' ');

                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '... ';
                                }
                                echo $string;
                                ?>
                            </small>
                        </div>
                        <div class="text-start text-lg-end">
                            <a href="singleblog.php?id=<?php echo $row4['id']; ?>">
                                <button style="border: none; background-color: #0893ee; color: white;" class="p-1 mt-2">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>





        </div>
        <?php
                }
            }
        }else {

        
        ?>



        <div class="col-12 col-lg-8 col-md-12 col-sm-12">
            <?php
            $res = mysqli_query($con, "select blog.*,category.* from blog left join category on blog.category=category.cat_id order by blog.id desc");
            while ($row = mysqli_fetch_assoc($res)) {

            ?>
                <div class="card p-4">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                            <img src="Admin/BlogImages/<?php echo $row['blog_image']; ?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                            <div class="text">
                                <a href="singleblog.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                                    <h4 style="color: #0893ee;"><?php echo $row['blog_title']; ?></h4>
                                </a>
                                <p class="text-secondary"><i class="fa-solid fa-tags"></i> <?php echo $row['cat_title']; ?> &nbsp;&nbsp;
                                    <i class="fa-solid fa-calendar-days"></i> <?php echo date("dF,Y", strtotime($row['added_on'])); ?>
                                </p>
                                <small>
                                    <?php
                                    $string = strip_tags($row['blog_desc']);
                                    if (strlen($string) > 50) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 50);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '... ';
                                    }
                                    echo $string;
                                    ?>
                                </small>
                            </div>
                            <div class="text-start text-lg-end">
                                <a href="singleblog.php?id=<?php echo $row['id']; ?>">
                                    <button style="border: none; background-color: #0893ee; color: white;" class="p-1 mt-2">Read More</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <!-- <div class="card p-4">
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                        <img src="assets/images/banner/aboutvision.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                        <div class="text">
                            <a href="#" class="text-decoration-none">
                                <h4 style="color: #0893ee;">Senior Citizen Health Insurance</h4>
                            </a>
                            <p class="text-secondary"><i class="fa-solid fa-tags"></i> Health Insurance &nbsp;&nbsp;
                                <i class="fa-solid fa-calendar-days"></i> 25 jun, 2022
                            </p>
                            <small>Senior citizen health insurance is a policy that covers the medical costs...</small>
                        </div>
                        <div class="text-start text-lg-end">
                            <a href="#">
                                <button style="border: none; background-color: #0893ee; color: white;" class="p-1 mt-2">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-4">
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                        <img src="assets/images/banner/mainbanner.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                        <div class="text">
                            <h4 style="color: #0893ee;">What is coronavirus?</h4>
                            <p class="text-secondary"><i class="fa-solid fa-tags"></i> Health Insurance &nbsp;&nbsp;
                                <i class="fa-solid fa-calendar-days"></i> 25 jun, 2022
                            </p>
                            <small>In December 2019, Wuhan, China was the source of a group...</small>
                        </div>
                        <div class="text-start text-lg-end">
                            <a href="#">
                                <button style="border: none; background-color: #0893ee; color: white;" class="p-1 mt-2">Read More</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
        <?php }?>
        <div class="col-12 col-lg-4 col-md-12 col-sm-12">
            <form class="card p-3" action="search.php" method="POST">
                <h3 style="border-left: 2px solid #0893ee;">Search</h3>
                <div class="input d-flex mt-3">
                    <input type="text" class="form-control w-75" placeholder="Search...." name="search">
                    <button class="btn btn-info" style="background-color: #0893ee; color: white;" name="submit">search</button>
                </div>
            </form>


            <div class="card mt-3 p-2">
                <div class="card-header">
                    <h4>Recent Post</h4>
                </div>

                <!-- <div class="row mt-2">
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                        <img src="assets/images/cards/claim-image.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                        <div class="text">
                            <a href="#" class="text-decoration-none">
                                <h4 style="color: #0893ee;">Lorem</h4>
                            </a>
                            <p class="text-secondary" style="font-size: 0.8rem;"><i class="fa-solid fa-tags"></i> Term Insurance &nbsp;&nbsp;
                                <i class="fa-solid fa-calendar-days"></i> 25 jun, 2022
                            </p>
                            <small>Lorem ipsum dolor sit amet..</small>
                        </div>
                    </div>
                </div> -->
            </div>

            <?php
            $limit = 3;
            $res1 = mysqli_query($con, "select blog.*,category.* from blog left join category on blog.category=category.cat_id order by blog.id desc LIMIT {$limit}");
            while ($row1 = mysqli_fetch_assoc($res1)) {

            ?>
                <div class="card p-3">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                            <img src="Admin/BlogImages/<?php echo $row1['blog_image']; ?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                            <div class="text">
                                <a href="singleblog.php?id=<?php echo $row1['id']; ?>" class=" text-decoration-none" style="color: #0893ee;font-size:1rem;"><?php echo $row1['blog_title']; ?></a>
                                <p class="text-secondary" style="font-size: 0.8rem;"><i class="fa-solid fa-tags"></i> <?php echo $row1['cat_title']; ?>&nbsp;&nbsp;
                                    <i class="fa-solid fa-calendar-days"></i> <?php echo date("dF,Y", strtotime($row1['added_on'])); ?>
                                </p>
                                <small>

                                    <?php
                                    $string = strip_tags($row1['blog_desc']);
                                    if (strlen($string) > 30) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 30);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '... ';
                                    }
                                    echo $string;
                                    ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- <div class="card p-3">
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12">
                        <img src="assets/images/cards/claim-image.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                        <div class="text">
                            <h4 style="color: #0893ee;">Title</h4>
                            <p class="text-secondary" style="font-size: 0.8rem;"><i class="fa-solid fa-tags"></i> Term Insurance &nbsp;&nbsp;
                                <i class="fa-solid fa-calendar-days"></i> 25 jun, 2022
                            </p>
                            <small>Lorem ipsum dolor sit amet..</small>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>


    <?php
    $post_per_page = 3;
    $q = "SELECT * FROM `blog`";
    $r = mysqli_query($con, $q);
    $total_blog = mysqli_num_rows($r);
    $total_pages = ceil($total_blog / $post_per_page);

    ?>


    <div class="container d-flex justify-content-center mt-5 ">
        <nav aria-label="Page navigation example">
            <ul class="pagination m-auto">
                <?php
                if ($page > 1) {
                    $switch = "";
                } else {
                    $switch = "disabled";
                }
                if ($page >= $total_pages) {
                    $nswitch = "disabled";
                } else {
                    $nswitch = "";
                }
                ?>
                <li class="page-item  <?php echo $switch; ?>">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($kpage = 1; $kpage <= $total_pages; $kpage++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $kpage; ?>"><?php echo $kpage; ?></a></li>
                <?php
                }
                ?>
                <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                <li class="page-item">
                    <a class="page-link <?php echo $nswitch; ?>" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</div>




<!-- =======footer section -->



<?php
require("footer.php");
?>