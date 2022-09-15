<!DOCTYPE html>
<html lang="en">

<head>


    <?php
    include('session.php');
    //session_start();
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link rel="stylesheet" href="style1.css">
    <title>Profile</title>
    <style>
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
            position: absolute;
            top: 1%;
            left: 90%;
        }

        #profile {
            margin-top: 3%;
            text-align: center;
        }

        .detail,
        .person {
            display: inline-block;
            margin-bottom: 2%;
        }



        .sidenav img {
            width: 75%;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        body {
            background-image: linear-gradient(to right, white, #4fb4e4);

            height: 100%;
        }

        .box {
            padding-top: 2%;
            padding-bottom: 1%;
            margin: 0 30% 0 30%;
            border: 2px solid black;
            background-color: white;

        }

        .person {
            font-weight: bold;
        }

        #active {
            color: #feea03;
            font-size: 130%;
            line-height: 120%;
            font-weight: 200;
        }

        .link {
            margin-left: 40%;
            font-size: 110%;
            font-weight: 150;
        }

        .link a:hover {
            color: #EE4B2B;
        }
    </style>

</head>

<body>


    <button class="logout"><a href="logout.php">LOGOUT</a></button>
    <nav class="sidenav">
        <img src="images/bmsce_logo.png" />
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <a href="student_homepage.php">HOME</a>
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <a href="profile.php" id="active">View Profile</a>
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <a href="course.php">Courses</a>
        <hr style="height:2px;border-width:0;background-color:#66fcf1">
        <a href="eligibility.php">View eligibility</a>
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
    <section class="right" id="profile">
        <section class="box"> <img src="<?php echo $_SESSION['profile_url']; ?>" width="150px" height="175px" style="margin-top:-1%;"><br /><br />
            <p class="link1"><a href="profile_photo.php" style="text-decoration:none;"><i class="fas fa-user"></i> Change Profile</a></p>
            <div>

                <span class="person">NAME: </span>

                <span class="detail"><?php print "{$loggedin_name}" ?></span><br />
                <hr style="height:2px;border-width:0;background-color:black;margin: 2% 15% 2% 15%;">
                <span class="person">USN:</span>
                <span class="detail"><?php echo $row['usn']; ?></span><br />
                <hr style="height: 2px;border-width: 0;background-color: black;margin: 2% 15% 2% 15%;">
                <span class="person">SEMESTER:</span>
                <span class="detail"><?php echo $row['current_sem']; ?></span></br>
                <hr style="height: 2px;border-width: 0;background-color: black;margin: 2% 15% 2% 15%;">
                <span class="person">SECTION: </span>
                <span class="detail"><?php echo $row['section']; ?></span></br>
                <hr style="height: 2px;border-width: 0;background-color: black;margin: 2% 15% 2% 15%;">
                <span class="person">EMAIL: </span>
                <span class="detail"><?php echo $row['email']; ?></span></br>
                <hr style="height: 2px;border-width: 0;background-color: black;margin: 2% 15% 2% 15%;">
                <span class="person">PHONE: </span>
                <span class="detail"><?php print "{$loggedin_phone}" ?></span><br />

            </div>

            <p class="link"><a href="password.php" style="text-decoration:none;"><i class="fas fa-key"></i> Change Password</a></p>

        </section>
    </section>

</body>

</html>