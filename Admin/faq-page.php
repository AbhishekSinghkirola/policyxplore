<?php
require("header.php");
require("navbar.php");

$sql = "select faq_page.*,faq_category.* from faq_page left join faq_category on faq_page.faq_category=faq_category.faq_cat_id";
$res = mysqli_query($con, $sql);

?>

<div class="card">
    <div class="d-block d-md-flex justify-content-between align-items-center w-100">
        <h5 class="card-header">Blog Posts</h5>
        <a href="add-faq-page.php" class="btn btn-primary ms-3 me-md-2" style="background-color: #008bd3;">Add New FAQ</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.NO.</th>
                    <th>Question</th>
                    <th>solution</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php
                if (mysqli_num_rows($res) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <tr>
                            <td style="width: 10%;"><?php echo $count; ?></td>
                           
                            <td style="width: 10%;"><i class=" text-danger me-3"></i> <strong><?php echo $row['faqp_question']; ?></strong></td>
                            <td style="white-space: normal; width:50%;">
                                <?php

                                // echo $row['blog_desc'];
                                $string = strip_tags($row['faqp_solution']);
                                // if (strlen($string) > 50) {

                                //     // truncate string
                                //     $stringCut = substr($string, 0, 50);
                                //     $endPoint = strrpos($stringCut, ' ');

                                //     //if the string doesn't contain any space then it will cut without word basis.
                                //     $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                //     $string .= '... <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd" style= "color: #008bd3;">Read More</a>';
                                // }
                                echo $string;

                                ?>
                                
                            </td>
                            <td ><?php echo $row['faq_cat_name']; ?></td>
                      
                            <td >
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="edit-faq-page.php?id=<?php echo $row['id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="delete-faq-page.php?id=<?php echo $row['id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php
                        $count++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="8" class="text-danger text-center h3">No Record found</td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<?php
require("footer.php");
?>