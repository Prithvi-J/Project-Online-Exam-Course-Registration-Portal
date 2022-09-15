<!DOCTYPE php>
<php lang="en">

    <head>

        <?php
        include('session.php');
        ?>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
        <link rel="stylesheet" href="table.css">
        <title>Eligibility</title>
        <style>
            table tr th {
                border: solid rgb(6, 24, 107);
                border-width: 1px 1px 3px 1px;
                width: 250px;
                margin: 20px;
                line-height: 100%;
                color: #ffffff;
                font-size: 100%;
                font-weight: bold;
                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
                background: linear-gradient(to right, #000000, #130e0e);
                padding: 2%;
            }

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

            .not {
                color: red;
                opacity: 1;
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
            <a href="eligibility.php" id="active">View eligibility</a>
            <hr style="height:2px;border-width:0;background-color:#66fcf1">
            <button class="dropdown-btn">
                Exam
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="timetable.php">Timetable</a>
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

            <?php
            $tbl_name1 = "course";
            $tbl_name2 = "course_enrolled";
            $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
            mysqli_select_db($conn, "$db_name") or die("cannot select DB");

            $sql = "SELECT c.course_id AS cid,c.name as name,ce.attendance as attendance, ce.cie_marks as cie_marks FROM $tbl_name2 ce,$tbl_name1 c,$tbl_name s 
    WHERE s.email='$usermail'and ce.sem=s.current_sem and s.usn=ce.usn and ce.course_id=c.course_id ";
            $res = mysqli_query($conn, $sql);
            $_SESSION["count1"] = mysqli_num_rows($res);
            $j = 0;
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                $i = 0;

                $array[$j][$i++] = $row['cid'];
                $array[$j][$i++] = $row['name'];
                $array[$j][$i++] = (int)$row['attendance'];
                $array[$j][$i++] = (int)$row['cie_marks'];

                if ($array[$j][2] < 85 || $array[$j][3] < 20) {
                    $array[$j][$i] = "NO";
                } else {
                    $array[$j][$i] = "YES";
                }


                $j++;
            }

            ?>

            <h2>ELIGIBILITY TABLE</h2>
            <p>(TO CHECK IF YOU ARE ELIGIBLE FOR EXAM OR NOT)</p>
            <?php
            if ($_SESSION["count1"] == 0) {
                echo '<span style="font-size:120%";>NO COURSE FOUND<br>';
            } else {
            ?>
                <table>
                    <tr>
                        <th>COURSE CODE</th>
                        <th>COURSE TITLE</th>
                        <th>ATTENDANCE</th>
                        <th>CIE MARKS</th>
                        <th>ELIGIBILITY</th>
                    </tr>

                    <?php
                    $count = $_SESSION["count1"];
                    for ($j = 0; $j < $count; $j++) {
                        echo "<tr><td>{$array[$j][0]}</td><td> {$array[$j][1]}</td><td>{$array[$j][2]}</td><td>{$array[$j][3]}</td><td>{$array[$j][4]}</td></tr>";
                    }
                    ?>
                </table>
            <?php } ?>
        </section>

    </body>
</php>