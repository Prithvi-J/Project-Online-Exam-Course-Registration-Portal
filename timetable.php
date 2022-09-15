<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include('session.php');
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link rel="stylesheet" href="table.css">
    <title>Timetable</title>
    <style>
        .sidenav {
            height: 100%;
            width: 22%;
            padding-top: 1%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #000000;
            overflow-x: hidden;
            text-align: center;
        }

        .sidenav a,
        .dropdown-btn {
            padding: 2%;
            width: 100%;
            text-decoration: none;
            font-size: 18px;
            color: #ffffff;
            display: inline-block;
            border: none;
            background: none;
            text-align: center;
            cursor: pointer;
            outline: none;
        }

        .dropdown-container {
            display: none;
            background-color: #0a0a0a;
        }

        .sidenav a:hover,
        .dropdown-btn:hover {
            color: #e27464;
        }

        hr {
            background-color: #09f4e2;
            margin-left: 5%;
            margin-right: 5%;
        }

        .active {
            background-color: #020202;
            color: white;
        }

        .dropdown-container {
            width: 22%;
            display: none;
            background-color: #0a0a0a;
            padding-left: 8px;
            margin-left: 35%;
        }

        .sidenav img {
            background-color: #000000;
            width: 75%;
            margin-top: 24%;
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

        button a {
            text-decoration: none;
            color: white;
        }

        p {
            font-family: 'Alegreya';
            color: orangered;
        }

        .sidenav img {
            width: 75%;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        #active {
            color: #feea03;
            font-size: 130%;
            line-height: 120%;
            font-weight: 200;
        }

        #active1 {
            color: #feea03;
            font-weight: 200;
        }
    </style>

</head>

<body>
    <button class="logout"><a href="student_login.php">LOGOUT</a></button>
    <nav class="sidenav">
        <img src="images/bmsce_logo.png" />
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <a href="student_homepage.php">HOME</a>
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <a href="profile.php">View Profile</a>
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <a href="course.php">Courses</a>
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <a href="eligibility.php">View eligibility</a>
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <button class="dropdown-btn" id="active">
            Exam
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="timetable.php" id="active1">Timetable</a>
            <a href="instruction.php">Instructions</a>
            <a href="exam.php">Registration</a>
        </div>
        <hr style="height:2px;border-width:0;background-color:#66fcf1">

    </nav>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
    <section class="right">
        <h2>TIME TABLE</h2>
        <?php
        $tbl_name1 = "exam";
        $tbl_name2 = "exam_registration";
        $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
        mysqli_select_db($conn, "$db_name") or die("cannot select DB");
        date_default_timezone_set("Asia/Calcutta");
        $cur_date = date("Y-m-d");
        // SELECT e.exam_id AS eid,e.name as ename, e.sem as esem, e.start_date as edate FROM $tbl_name1 e,$tbl_name2 er,$tbl_name s
        //WHERE s.email='$loggedin_email'and s.usn = er.usn  and er.exam_id = e.exam_id and e.start_date > '$cur_date'

        $sql1 = "SELECT er.exam_id AS eid,e.name as ename, e.sem as esem, e.start_date as edate FROM $tbl_name1 e,$tbl_name2 er,$tbl_name s
        WHERE s.usn='$loggedin_usn'and s.usn = er.usn  and er.exam_id = e.exam_id and e.start_date > '$cur_date'";
        $result = mysqli_query($conn, $sql1);
        $c = mysqli_num_rows($result);
        if ($c == 0) {
            echo '<span style="font-size:120%";>NO TIMETABLE FOUND<br>';
        } else {

            $j = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $i = 0;
                $exam[$j][$i++] = $row['eid'];
                $exam[$j][$i++] = $row['ename'];
                $exam[$j][$i++] = $row['esem'];
                $time = strtotime($row['edate']);
                $exam[$j][$i++] = date("F", $time);
                $exam[$j][$i++] = date("Y", $time);
                $j++;
            }
        }
        if ($c != 0) {
            for ($k = 0; $k < $c; $k++) {
                $tbl_name3 = "timetable";
                $tbl_name4 = "exam";
                $tbl_name1 = "course";
                $tbl_name2 = "course_enrolled";
                $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
                mysqli_select_db($conn, "$db_name") or die("cannot select DB");
                $eid = $exam[$k][0];
                $sql = "SELECT distinct ce.course_id AS cid,c.name as name,t.exam_date as date,t.start_time as time  FROM $tbl_name3 t,$tbl_name4 e,$tbl_name1 c ,$tbl_name s,$tbl_name2 ce
            WHERE s.email='$usermail'and ce.sem=s.current_sem and s.usn=ce.usn and t.course_id=ce.course_id and t.exam_id='$eid'
             and c.course_id = ce.course_id and  ce.attendance>= 85 and ce.cie_marks >= 20";
                $res = mysqli_query($conn, $sql);
                $_SESSION["count1"] = mysqli_num_rows($res);
                $j = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $i = 0;

                    $array[$j][$i++] = $row['cid'];
                    $array[$j][$i++] = $row['name'];
                    $array[$j][$i++] = $row['date'];
                    $array[$j][$i++] = $row['time'];
                    $j++;
                }
        ?>

                <table>
                    <p> <?php echo "<span> SEM:{$exam[$k][2]} {$exam[$k][1]} {$exam[$k][3]}-{$exam[$k][4]}</span> "; ?></p>
                    <tr>
                        <th>COURSE CODE</th>
                        <th>COURSE TITLE</th>
                        <th>DATE</th>
                        <th>TIME</th>
                    </tr>
            <?php
                $count = $_SESSION["count1"];
                for ($j = 0; $j < $count; $j++) {
                    echo "<tr><td>{$array[$j][0]}</td><td> {$array[$j][1]}</td><td>{$array[$j][2]}</td><td>{$array[$j][3]}</td></tr>";
                }
            }
        }
            ?>
                </table>
    </section>
</body>

</html>