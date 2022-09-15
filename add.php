<?php

include('session_admin.php');
$ename = $_SESSION["ename"];
$esem = $_SESSION["esem"];
$edate = $_SESSION["edate"];

$ename = stripslashes($ename);
$esem = stripslashes($esem);
$edate = stripslashes($edate);

$ename = mysqli_real_escape_string($conn, $ename);
$esem = mysqli_real_escape_string($conn, $esem);
$edate = mysqli_real_escape_string($conn, $edate);

$sql = "INSERT INTO exam(exam_id,name,sem,start_date,admin_id) VALUES (NULL,'$ename','$esem' ,'$edate','$loggedin_id')";
$result = mysqli_query($conn, $sql);

$tbl_name3 = "exam";
$sql = "SELECT e.exam_id as id FROM $tbl_name3 e
        WHERE e.name='$ename' and e.sem= '$esem' and e.start_date='$edate' ";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$id = $row['id'];

$stime = $_POST["time"];
$date = $_POST["date"];

$time = "03:00:00";
$secs = strtotime($time) - strtotime("00:00:00");
//echo "{$array[1][2]}";
for ($i = 0; $i < $_SESSION["count1"]; $i++) {
    $cid = $_SESSION["data"][$i][0];
    // echo $cid;
    $etime = "00:00:00";


    $sql = "INSERT INTO timetable(exam_id,course_id,admin_id,start_time,end_time,exam_date) VALUES ('$id','$cid','$loggedin_id','$stime[$i]','$etime','$date[$i]')";
    $result = mysqli_query($conn, $sql);
}
header('Location: submit.php');
