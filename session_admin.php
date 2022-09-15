<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "project";
$tbl_name = "admin";
$conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
mysqli_select_db($conn, "$db_name") or die("cannot select DB");
session_start();
$usermail = $_SESSION["email"];
$sql = "SELECT * FROM $tbl_name WHERE email='$usermail'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$loggedin_email = $row['email'];
$loggedin_id = $row['admin_id'];
$loggedin_name = $row['name'];
$loggedin_dept = $row['dept_id'];

if (!isset($loggedin_email) || $loggedin_email == NULL) {
    echo "Go back";
    header("Location:admin_login.php");
}
