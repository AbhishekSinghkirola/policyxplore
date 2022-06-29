<?php
include("Admin/connection.php");
include("Admin/functions.php");

if (isset($_POST['submit'])) {
    $search = get_safe_value($con, $_POST['search']);

    $sql = "select * from category where cat_title 
	like '%$search%'";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            header('location: blog.php?id=' . $row['cat_id']);
            // echo "<a href='blog.php?id=" . $row['id']. "'>" . $row['cat_title'] . "</a>";
            // echo "<br/>";
        }
    } else {
        echo "No data found";
    }
}
