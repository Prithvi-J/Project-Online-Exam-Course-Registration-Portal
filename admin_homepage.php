﻿<!doctype html>
<html lang="en">

<head>
    <?php
    include('session_admin.php');
    // echo "{$loggedin_name}";
    ?>

    <meta charset="UTF-8">
    <title>Admin Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <style>
        body,
        html {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        .container {
            height: 100%;
        }

        #left {
            width: 30%;
            height: 100%;
            background-color: #cae9f5;
            border-collapse: collapse;
            display: inline-block;
        }

        #main {
            width: 40%;
            height: 100%;
            background-color: hsl(193, 100%, 96%);
            border-collapse: collapse;
            margin: auto;
            font-size: 100%;
        }

        #right {
            width: 30%;
            height: 100%;
            background-color: #cae9f5;
            border-collapse: collapse;
            display: inline-block;

        }

        .column {
            float: left;
            height: 100;
            /* padding-top: 5%; */
            text-align: center;
        }

        .list {
            list-style-type: none;
            padding: 2%;
            line-height: 170%;
            text-align: left;
            padding-left: 10%;
            position: relative;
            top: 20%;
        }



        .list a {
            text-decoration: none;
            font-size: 110%;
        }

        h2 {
            font-weight: 130%;
            font-size: 150%;
            display: inline;
            font-family: "Alegreya";
            padding-top: 10%;
            position: relative;
            top: 15%;
        }

        .logout {
            position: fixed;
            background-color: black;
            color: white;
            border-color: #ff0000;
            border: 3px solid red;
            top: 1%;
            left: 88%;
            width: 10%;
            padding: 0.5%;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        #main button {
            background-color: #4CAF50;
            font-size: 120%;
            width: 60%;
            height: 10%;
            color: black;
            margin: 8%;
            border: none;
            cursor: pointer;
            position: relative;
        }

        #main a:hover {
            color: black;
        }

        .quote {
            color: orange;
            font-size: 200%;
            text-align: center;
            position: relative;
            top: 13%;
        }


        #left img {
            width: 75%;
            margin-top: 10%;
            margin-left: 2%;
        }

        a:hover {
            color: aqua;
        }

        input[type=text] {
            display: inline-block;
            width: 80%;
            height: 120%;
            padding: 5%;
            margin: 30% 0 5% 0;
            border: 1px solid black;
            background: #f1f1f1;

        }

        input[type=text]:focus {
            background-color: #a2b9bc;
            outline: none;
        }

        #add {
            padding: 2%;
            width: 40;
        }

        #left img {
            position: relative;
            top: 10%;
        }
    </style>


</head>

<body>
    <div class="container">

        <section class="column side" id="left">


            <img src="images/bmsce_logo.png" />
            <h1 class="quote ">Let us do great things together</h1>

        </section>
        <section class="column" id="main">
            <button type="submit"><a href="add_exam.php">Add Exam and Timetable</a></button>
            <button type="submit"><a href="submission.php">Check Exam Form Submission Status</a> </button>


        </section>


        <section class="column side" id="right">
            <button class="logout"><a href="logout_admin.php">LOGOUT</a></button>
            <h2 style="font-size: 200%;" class="head">Announcements</h2>
            <ul class="list" id="list">
                <?php
                $tbl_name1 = "announcement";
                $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
                mysqli_select_db($conn, "$db_name") or die("cannot select DB");

                $sql = "SELECT msg from $tbl_name1 as a 
            order by a.id desc limit 5";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $i = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $array[$i++] = $row['msg'];
                }
                for ($j = 0; $j < $count; $j++) {
                ?>
                    <li><i class="fas fa-thumbtack"></i><?php echo " {$array[$j]}"; ?></li>
                <?php } ?>
            </ul>
            <form method="POST" action="announcement.php" name="form3">
                <input type='text' id='idea' name="msg" autocomplete="off"><br />
                <input type="submit" value="ADD NEW" value="submit">
            </form>

        </section>
    </div>

</body>

</html>