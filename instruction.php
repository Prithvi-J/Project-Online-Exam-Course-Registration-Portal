<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <title>Instruction</title>
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

            .sidenav a, .dropdown-btn {
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

        .sidenav a:hover, .dropdown-btn:hover {
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

        section #special {
            background-color: #66fcf1;
            margin-right: 2%;
            margin-left: 2%;
        }

        ul li {
            padding: 1.10%;
        }

        .list li {
            padding: 0.70%;
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
<button class="logout"><a href="student_login.php">LOGOUT</a></button>
<nav class="sidenav">
    <img src="images/bmsce_logo.png" />
    <hr style="height:2px;border-width:0;background-color:#66fcf1">
    <a href="student_homepage.php">HOME</a><hr style="height:2px;border-width:0;background-color:#66fcf1">
    <a href="profile.php">View Profile</a><hr style="height:2px;border-width:0;background-color:#66fcf1">
    <a href="course.php">Courses</a><hr style="height:2px;border-width:0;background-color:#66fcf1">
    <a href="eligibility.php">View eligibility</a><hr style="height:2px;border-width:0;background-color:#66fcf1">
    <button class="dropdown-btn" id="active">
        Exam
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="timetable.php">Timetable</a>
        <a href="instruction.php" id="active1">Instructions</a>
        <a href="exam.php">Registration</a>
    </div>
    <hr style="height:2px;border-width:0;background-color:#66fcf1">

</nav>

<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
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
    <section class="list">
        <h2 style="font-size: 200%;font-family:'Merriweather';" class="head">Instructions:</h2>
        <p class="p1">
            <ul class="list">
                <li>Use of phones and smart watches strictly prohibited during the examination.</li>
                <li>Any act of malpractice shall not be entertained.</li>
                <li>Incase a student found guilty he/she would be abstained from giving  future examinations.</li>
                <li>Eating is prohibited during the exam .</li>
                <li>All students to maintain silence till the end of exam</li>
                <li>Students are strictly advised to bring their own stationary and avoid borrowing from fellow class mates.</li>
                <ul>
        </p>
    </section>
    <section id="special">
        <i class="fas fa-cross fa-2x" style="padding:2% 0% 0% 4% " ;></i>
        <h2 style="font-size: 170%;font-family:'Alegreya';">Precautions during Covid-19</h2>
        <p class="p1">
            <ul>
                <li>
                    <i class="fas fa-hands-wash fa-lg"></i><span class="m1">Always carry a sanitizer with you.</span>
                </li>
                <li>
                    <i class="fas fa-people-arrows fa-lg"></i><span class="m1">Follow social distancing and always maintain 6 feet gap</span>
                </li>
                <li>
                    <i class="fas fa-head-side-mask fa-lg"></i><span class="m1">Always wear a mask.</span>
                </li>
                <li>
                    <i class="fas fa-box-tissue fa-lg"></i><span class="m1">Cover coughs and sneezes:</span>
                </li>

            </ul>
        </p>
    </section>
</section>
</body>
</html>