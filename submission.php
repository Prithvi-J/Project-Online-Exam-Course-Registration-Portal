<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('session_admin.php');
    ?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <title>Select Exam</title>
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

        input[type=radio] {
            margin: 5px 2px 22px 5px;
        }



        .shift {
            margin-left: 1%;
        }

        .shift>label,
        .left {
            display: inline-block;
            width: 10%;
            font-weight: bold;
            font-size: larger;
        }

        .right hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .registerbtn {
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

        .link {
            margin-left: 20%;
        }

        .link a:hover {
            color: #EE4B2B;
        }
    </style>

</head>

<body>
    <?php
    $tbl_name3 = "exam";
    $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
    mysqli_select_db($conn, "$db_name") or die("cannot select DB");

    date_default_timezone_set("Asia/Calcutta");
    $cur_date = date("Y-m-d");

    $sql = "SELECT e.exam_id AS eid,e.name as ename, e.sem as esem, e.start_date as edate FROM $tbl_name3 e
            WHERE e.start_date > $cur_date order by e.start_date";

    $res = mysqli_query($conn, $sql);
    $_SESSION['count1'] = mysqli_num_rows($res);
    $j = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $i = 0;
        $array[$j][$i++] = $row['eid'];
        $array[$j][$i++] = $row['ename'];
        $array[$j][$i++] = $row['esem'];
        $time = strtotime($row['edate']);
        $array[$j][$i++] = date("F", $time);
        $array[$j][$i++] = date("Y", $time);
        $j++;
    }
    ?>

    <section class="right">
        <form method="POST" action="student_list.php" name="form2">

            <center>
                <h1> Check exam registration status</h1>
            </center>
            <hr>
            <label class="field left">
                Select Exam:
            </label>
            <br>
            <?php
            if ($_SESSION["count1"] == 0) {
                echo '<span style="font-size:120%";>NO EXAM FOUND<br>';
                echo '<p class="link"><a href="admin_homepage.php" style="text-decoration:none;"><i class="fas fa-undo-alt"></i> Back to homepage</a></p>';
            } else {
                for ($i = 0; $i < $_SESSION["count1"]; $i++) {  ?>
                    <input type="radio" name="eid" required value="<?php echo htmlspecialchars($array[$i][0]); ?>"><?php echo "<span> {$array[$i][1]} (SEM: {$array[$i][2]}) {$array[$i][3]}-{$array[$i][4]}</span> "; ?>
                    <br>

                <?php }
                ?>

                <input type="submit" class="registerbtn" value="NEXT">
            <?php
            } ?>

        </form>
    </section>
</body>

</html>