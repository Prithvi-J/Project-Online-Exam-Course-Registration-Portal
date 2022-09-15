<?php
include('session_admin.php');
$msg = $_POST["msg"];
date_default_timezone_set("Asia/Calcutta");
$cur_time = date("Y-m-d h:i:sa");
$tbl_name1 = "announcement";

$conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
mysqli_select_db($conn, "$db_name") or die("cannot select DB");

$sql = "INSERT INTO announcement(id,msg,admin_id,time) VALUES (NULL,'$msg','$loggedin_id','$cur_time')";
$result = mysqli_query($conn, $sql);

header('Location: admin_homepage.php');
