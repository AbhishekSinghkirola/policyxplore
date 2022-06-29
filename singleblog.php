<?php
require("header.php");


if(isset($_GET['id'])) {
    $id = get_safe_value($con,$_GET['id']);

    $res = mysqli_query($con,"select blog.*,category.* from blog left join category on blog.category=category.cat_id where blog.id=$id") or die("Select Query Failed!!");
    $row =mysqli_fetch_assoc($res);
}
?>

    <!-- single page content section -->

    <div class="container mt-5 pb-5" style="width: 80%;">
        <div class="row">
            <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                <div class="card p-4">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="text">
                                <h4 style="color: #0893ee;"><?php echo $row['blog_title']; ?></h4>
                                <p class="text-secondary"><i class="fa-solid fa-tags"></i> <?php echo $row['cat_title']; ?> &nbsp;&nbsp;
                                    <i class="fa-solid fa-calendar-days"></i> <?php echo date("d F, Y",strtotime($row['added_on'])) ; ?>
                                </p>
                                
                            </div>
    
                            
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <img src="Admin/BlogImages/<?php echo $row['blog_image']; ?>" alt="" class="img-fluid">

                            <div class="text mt-3">
                                <small class="mt-3"><?php echo $row['blog_desc']; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
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
                                <h4 style="color: #0893ee;">Title</h4>
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
                            <a href="singleblog.php?id=<?php echo $row1['id'];?>" class=" text-decoration-none" style="color: #0893ee;font-size:1rem;"><?php echo $row1['blog_title']; ?></a>
                            <p class="text-secondary" style="font-size: 0.8rem;"><i class="fa-solid fa-tags"></i> <?php echo $row1['cat_title']; ?>&nbsp;&nbsp;
                                <i class="fa-solid fa-calendar-days"></i> <?php echo date("dF,Y",strtotime($row1['added_on'])) ; ?>
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
                </div>  -->

            </div>
        </div>

    </div>




    <!-- =======footer section -->

  


    <?php
require("footer.php");
?>