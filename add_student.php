<?php
include('session_admin.php');
if (isset($_POST['submit'])) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "project";
    $tbl_name = "student";
    $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
    mysqli_select_db($conn, "$db_name") or die("cannot select DB");

    $name = $_POST["studentname"];
    $usn = $_POST["usn"];
    $section = $_POST["section"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $sem = $_POST["sem"];
    // $dept = $_POST["dept"];
    // To protect MySQL injection (more detail about MySQL injection)
    $name = stripslashes($name);
    $usn = stripslashes($usn);
    $section = stripslashes($section);
    $email = stripslashes($email);
    $phone = stripslashes($phone);
    $sem = stripslashes($sem);
    //$dept = stripslashes($dept);

    $name = mysqli_real_escape_string($conn, $name);
    $usn = mysqli_real_escape_string($conn, $usn);
    $section = mysqli_real_escape_string($conn, $section);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $sem = mysqli_real_escape_string($conn, $sem);
    //$dept = mysqli_real_escape_string($conn, $dept);

    $sql = "INSERT INTO student(usn,dept_id,name,section,current_sem,email,phone,password,image_url)   VALUES ('$usn','$loggedin_dept','$name' ,'$section','$sem' ,'$email','$phone','password','profilepic.jpg')";
    $result = mysqli_query($conn, $sql);

    $tbl_name1 = "course";

    $sql = "SELECT c.course_id AS cid FROM $tbl_name1 c
                    WHERE c.sem='$sem' and c.dept_id = '$loggedin_dept'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $i = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $array1[$i++] = $row['cid'];
    }

    for ($i = 0; $i < $count; $i++) {
        $sql = "INSERT INTO course_enrolled(usn,course_id,sem,reregistered)   VALUES ('$usn','$array1[$i]','$sem' ,'NO')";
        $result = mysqli_query($conn, $sql);
    }
    echo "Saved Successfully....";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <title>Add Student</title>
    <style>
        body {
            background-color: lightblue;
        }

        .right {
            float: right;
            width: 100%;
            background-color: lightblue;
        }

        form {
            width: 100%;
        }

        .logout {
            position: fixed;
            background-color: black;
            color: white;
            border-color: #ff0000;
            border: 3px solid red;
            top: 1%;
            left: 93%;
            padding: 0.5%;
        }

        .submit {
            color: white;
            background-color: black;
        }

        button a {
            text-decoration: none;
            color: white;
        }


        .container {
            padding-left: 5%;
            background-color: lightblue;
        }

        input[type=text],
        input[type=date],
        select {
            width: 40%;
            padding: 1%;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #f7ef86;
            outline: none;
        }

        .shift {
            margin-left: 1%;
        }

        .shift>label,
        .left {
            display: inline-block;
            width: 10%;
            font-weight: bold;
        }

        input[type=date] {
            width: 25%;
        }

        .right hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .registerbtn {
            display: block;
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin-left: 45%;
            border: none;
            cursor: pointer;
            width: 15%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        label .field {
            display: inline-block;
        }

        div .name {
            display: inline-block;
            width: 28%;
            padding: 1%;
            font-weight: bold;
        }

        div .name>input {
            width: 80%;
        }

        a:hover {
            color: red;
        }

        p a {
            color: navy;
            margin-left: 80%;
            font-size: 110%;
        }
    </style>

</head>

<body>
    <?php
    $tbl_name3 = "department";
    $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
    mysqli_select_db($conn, "$db_name") or die("cannot select DB");

    $sql = "SELECT d.dept_id AS did,d.name as dname FROM $tbl_name3 d
             where dept_id <> 'D000'";

    $res = mysqli_query($conn, $sql);
    $count1 = mysqli_num_rows($res);
    $j = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $i = 0;
        $array[$j][$i++] = $row['did'];
        $array[$j][$i++] = $row['dname'];
        $j++;
    }
    ?>

    <section class="right">
        <p class="back"><a href="department_homepage.php" style="text-decoration:none;"><i class="fas fa-undo-alt"></i> Back to homepage</a></p>
        <form method="POST" action="?" name="form2">

            <center>
                <h1> ADD STUDENT:</h1>
            </center>
            <hr>
            <div class="container">
                <div class="shift">
                    <label class='field'> Student Name: </label>
                    <input type="text" name="studentname" placeholder="Student name" pattern="[A-Za-z\s]{1,}" style="text-transform:uppercase" required autocomplete="off">
                </div>
                <div class="shift">
                    <label class="field"> USN </label>

                    <input type="text" name="usn" placeholder="USN" size="10" pattern="[0-9]{1}[a-zA-Z]{2}[0-9]{2}[a-zA-Z]{2}[0-9]{3}" required autocomplete="off" title="Enter valid USN" style="text-transform:uppercase">
                </div>
                <div class="shift">
                    <label class='field'> Section: </label>
                    <input type="text" name="section" placeholder="Section" pattern="[A-Za-z]{1,}" style="text-transform:uppercase" required autocomplete="off">
                </div>
                <div class="shift">
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required pattern="[a-z0-9.]+@bmsce.ac.in$" title="Enter valid college mail id" autocomplete="off"><br />
                </div>
                <div class="shift">
                    <label class="field">
                        Phone :
                    </label>
                    <input type="text" name="phone" placeholder="phone no." size="10" required pattern="[0-9]{10}" title="Enter a valid phone number" autocomplete="off"><br />
                </div>
                <div class="shift">
                    <label class="field left">
                        Semester:
                    </label>
                    <select name="sem" required>
                        <option value="1"> I </option>
                        <option value="2"> II</option>
                        <option value="3"> III</option>
                        <option value="4"> IV</option>
                        <option value="5"> V</option>
                        <option value="6"> VI</option>
                        <option value="7"> VII</option>
                        <option value="8"> VIII</option>
                    </select>
                </div>


                <input type="submit" class="registerbtn" value="NEXT" name="submit">
        </form>
    </section>
</body>

</html>