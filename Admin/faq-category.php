<?php
require("header.php");
require("navbar.php");

$sql = "select * from faq_category";
$res = mysqli_query($con, $sql);

?>

<div class="card">
    <div class="d-block d-md-flex justify-content-between align-items-center w-100">
        <h5 class="card-header">Faq Category</h5>
        <a href="add-faq-category.php" class="btn btn-primary ms-3 me-md-2" style="background-color: #008bd3;">Add New Category</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.NO.</th>
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
                            <td><?php echo $count; ?></td>

                            <td><i class="text-danger me-3"></i> <strong><?php echo $row['faq_cat_name']; ?></strong></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="edit-faq-category.php?id=<?php echo $row['faq_cat_id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="delete-faq-category.php?id=<?php echo $row['faq_cat_id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
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
                        <td colspan="4" class="h3 text-danger text-center">No Record Found</td>
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