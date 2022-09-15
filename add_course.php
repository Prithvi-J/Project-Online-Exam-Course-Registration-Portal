<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('session_admin.php');
    if (isset($_POST['submit'])) {
        $host = "localhost";
        $username = "root";
        $password = "";
        $db_name = "project";
        $tbl_name = "course";
        $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
        mysqli_select_db($conn, "$db_name") or die("cannot select DB");

        $name = $_POST["name"];
        $cid = $_POST["cid"];
        $credits = $_POST["credits"];
        $sem = $_POST["sem"];

        // $dept = $_POST["dept"];
        // To protect MySQL injection (more detail about MySQL injection)
        $name = stripslashes($name);
        $cid = stripslashes($cid);
        $credits = stripslashes($credits);
        $sem = stripslashes($sem);

        //$dept = stripslashes($dept);

        $name = mysqli_real_escape_string($conn, $name);
        $cid = mysqli_real_escape_string($conn, $cid);
        $credits = mysqli_real_escape_string($conn, $credits);
        $sem = mysqli_real_escape_string($conn, $sem);
        //$dept = mysqli_real_escape_string($conn, $dept);

        $sql = "INSERT INTO course(course_id,name,sem,credits,dept_id)   VALUES ('$cid','$name','$sem' ,'$credits','$loggedin_dept')";
        $result = mysqli_query($conn, $sql);
        echo "Saved Successfully....";
    }
    ?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <title>Add Course</title>
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
            width: 50%;
            padding: 15px;
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
    <p class="back"><a href="department_homepage.php" style="text-decoration:none;"><i class="fas fa-undo-alt"></i> Back to homepage</a></p>
    <section class="right">
        <form method="POST" action="?" name="form2">

            <center>
                <h1> ADD COURSE:</h1>
            </center>
            <hr>
            <div class="container">
                <div class="shift">
                    <label class='field'> Course Name: </label>
                    <input type="text" name="name" placeholder="Course name" pattern="[A-Za-z\s]{1,}" style="text-transform:uppercase" required autocomplete="off">
                </div>
                <div class="shift">
                    <label class="field"> Course ID</label>

                    <input type="text" name="cid" placeholder="Course id" size="10" pattern="[0-9]{2}[a-zA-Z]{2}[0-9]{1}[a-zA-Z]{5}" required autocomplete="off" title="Enter valid cid" style="text-transform:uppercase">
                </div>
                <div class="shift">
                    <label class='field'> Credits: </label>
                    <input type="text" name="credits" placeholder="credits" pattern="[0-9]{1}" required autocomplete="off">
                </div>
                <br>

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