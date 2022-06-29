<?php
require("header.php");
require("navbar.php");

$msg = '';
$no_of_post = '';
if (isset($_POST['submit'])) {
    // prx($_POST);
    $question = get_safe_value($con, $_POST['question']);
    $solution = get_safe_value($con, $_POST['solution']);
    $faq_category = get_safe_value($con, $_POST['faq_category']);

    mysqli_query($con, "insert into faq(question,solution,faq_category) values('$question','$solution','$faq_category') ") or die("Insert Query Failed!!");
    header('location: faq.php');

}

?>

<div class="row ">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add FAQ's</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Question</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="question" required />
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Solution</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control"  aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="solution" required></textarea>
                        </div>
                    </div>





                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Category</label>
                        <div class="col-sm-10">

                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="faq_category" required>
                                <option selected disabled>Select Category</option>
                                <?php
                                $data = mysqli_query($con, "select * from faq_category");
                                while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                    <option value="<?php echo $row['faq_cat_id']; ?>"><?php echo $row['faq_cat_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                   

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit" style="background-color: #008bd3;">Add</button>
                        </div>
                    </div>





                </form>
            </div>
        </div>
    </div>
</div>
<?php
require("footer.php");
?>