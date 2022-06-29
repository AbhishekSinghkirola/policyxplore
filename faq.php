<?php
require("header.php");

?>


    <!-- faq section -->

    <div class="container-fluid" style="background-color: #0893ee; color: white;">
        <h3 class="fs-2 text-center p-4">FAQ'S</h3>

    </div>

    <div class="container mt-5 pb-5" style="width: 80%;">
    <?php 
        $res = mysqli_query($con,"select * from faq order by faq_id") or die("Select Query Failed!!");
        while($row = mysqli_fetch_assoc($res)) {

        
    ?>

        <h4 class="mt-5 text-dark"><i class="fa-solid fa-circle-question"></i> <?php echo $row['question'];?></h4>
        <p class="mt-3"><?php echo $row['solution'];?> </p>
            <?php
        }
            ?>

        <!-- <h4 class="mt-4 text-dark"><i class="fa-solid fa-circle-question"></i> What is a pre-existing condition in
            health insurance?</h4>
        <p class="mt-3">A pre-existing condition exists at the time of the insurance policy acquisition. Diabetes, high
            blood pressure, cancer, depression, asthma, thyroid problems, and so on are all examples of this. </p>

        <h4 class="mt-4 text-dark"><i class="fa-solid fa-circle-question"></i> What does health insurance cover? </h4>
        <p class="mt-3">Hospitalization costs, pre-and post-hospitalization costs, doctor consultation fees, medical
            test costs, ambulance costs, and so on are all covered by health insurance. Also provides compensation in
            the event of a loss of income due to an accident. </p>

        <h4 class="mt-4 text-dark"><i class="fa-solid fa-circle-question"></i> What conditions are not covered by Indian
            health insurance? </h4>
        <p class="mt-3">Pre-existing conditions, consensual abortion, maternity treatment, intentional injury, sexually
            transmitted disease, genetic abnormalities, cosmetic procedures, Embryo transfer and fertility problems
            treatment, health risks associated with alcohol, drugs, and smoking, and permanent denial caused by war,
            riot, strike, or nuclear attack. </p>

        <h4 class="mt-4 text-dark"><i class="fa-solid fa-circle-question"></i> What are the advantages of health
            insurance? </h4>
        <p class="mt-3">Health insurance has several advantages, including the cashless facility, which allows you to
            receive treatment while having the expense reimbursed by your insurance company. Pre- and
            post-hospitalization coverage: The insured will cover expenses incurred before and after your treatment. No
            claim bonus: If you don't claim the term, you'll get a discount on your next premium, free medical exams, a
            tax break, and more </p> -->



    </div>





    <!-- =======footer section -->

  


    <?php
require("footer.php");
?>