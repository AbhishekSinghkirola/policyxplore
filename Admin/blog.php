<?php
require("header.php");
require("navbar.php");

$sql = "select blog.*,category.* from blog left join category on blog.category=category.cat_id order by blog.id desc";
$res = mysqli_query($con, $sql);

?>

<div class="card">
    <div class="d-block d-md-flex justify-content-between align-items-center w-100">
        <h5 class="card-header">Blog Posts</h5>
        <a href="add-blog.php" class="btn btn-primary ms-3 me-md-2" style="background-color: #008bd3;">Add New Blog Post</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.NO.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Added On</th>
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
                            <td><?php echo $count; ?></td>
                            <td style="width: 5%;">
                                <img src="BlogImages/<?php echo $row['blog_image']; ?>" alt="Blog Image" class="img-fluid" />
                            </td>
                            <td><i class=" text-danger me-3"></i> <strong><?php echo $row['blog_title']; ?></strong></td>
                            <td style="white-space: normal;">
                                <?php

                                // echo $row['blog_desc'];
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
                                
                            </td>
                            <td><?php echo $row['cat_title']; ?></td>
                            <td><?php echo $row['added_on']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="edit-blog.php?id=<?php echo $row['id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="delete-blog.php?id=<?php echo $row['id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
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
                        <td colspan="8" class="text-center text-danger"> No record Found</td>
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