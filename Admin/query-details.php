<?php
require("header.php");
require("navbar.php");

$sql = "select query_details.*,faq_category.* from query_details left join faq_category on query_details.type_of_insurance=faq_category.faq_cat_id";
$res = mysqli_query($con, $sql);

?>

<div class="card">
    <div class="d-block d-md-flex justify-content-between align-items-center w-100">
        <h5 class="card-header">Query Details</h5>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.NO.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Type Of Insurance</th>
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

                            <td><i class=" text-danger me-3"></i> <strong><?php echo $row['fname']; ?></strong></td>
                            
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['contact']; ?></td>
                            <td><?php echo $row['faq_cat_name']; ?></td>
                            <td>
                                <a class="dropdown-item" href="delete-query-details.php?id=<?php echo $row['id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>

                            </td>
                        </tr>

                    <?php
                        $count++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="8" class="text-danger text-center">No Record Found</td>
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