<?php

include('session_admin.php');
$cid = $_SESSION["cid"];

$tbl_name3 = "course_enrolled";


$marks = $_POST["marks"];
$attendance = $_POST["attendance"];

for ($i = 0; $i < $_SESSION["count1"]; $i++) {
    $usn = $_SESSION["data"][$i][0];


    $sql = "UPDATE $tbl_name3 set attendance='$attendance[$i]', cie_marks='$marks[$i]'
    where usn='$usn' and course_id='$cid'";
    $result = mysqli_query($conn, $sql);
}
header('Location: submit_eligibility.php');
