<?php
//hello
$host = "localhost";
$username = "root";
$password = "";
$db_name = "project";
$tbl_name = "student";
$conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
mysqli_select_db($conn, "$db_name") or die("cannot select DB");
session_start();
//if (!isset($_SESSION["user"]) || $_SESSION["user"] == NULL) {
//    header("Location:student_login.php");
//}
$usermail = $_SESSION["user"];
$sql = "SELECT * FROM $tbl_name WHERE email='$usermail'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$loggedin_email = $row['email'];
$loggedin_usn = $row['usn'];
$loggedin_name = $row['name'];
$loggedin_sem = $row['current_sem'];
$loggedin_section = $row['section'];
$loggedin_phone = $row['phone'];
$profile = $row['image_url'];
$_SESSION['profile_url'] = "upload/" . $profile;
if (!isset($loggedin_email) || $loggedin_email == NULL) {
    echo "Go back";
    header("Location:student_login.php");
}
