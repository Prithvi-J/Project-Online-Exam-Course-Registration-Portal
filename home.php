<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .ml3 {
            font-weight: 900;
            font-size: 7em;
            color: black;
            font-family: "Oswald";
            margin-top: -2%;
            text-shadow: 3px 3px #c1c8e4;
        }

        .navbar-custom {
            background-color: black;
        }

        body {
            background-color: white;
        }

        .full {
            display: block;
            width: 100%;
            height: 670px;
            background-color: #3aafa9;
            text-align: center;
            padding-top: 10%;
            background-image: linear-gradient(to right top, rgba(136, 96, 208, 0.3), rgba(193, 200, 228, 0.5), rgba(86, 128, 233, 0.6), rgba(90, 185, 234, 0.4), rgba(193, 200, 228, 0.5), rgba(132, 206, 235, 0.6), rgba(193, 200, 228, 0.5), rgba(136, 96, 208, 0.4)), url(images/img2.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .full img {
            width: 40%;
            margin-top: 3%;
        }

        .ml14 {
            font-weight: 400;
            font-family: "Acme";
            font-size: 3em;
            color: white;
            opacity: 1;
            margin-left: 48%;
            text-shadow: 3px 3px rgba(26, 41, 247, 1);
        }

        .ml14 .text-wrapper {
            position: relative;
            display: inline-block;
            padding-top: 0.1em;
            padding-right: 0.05em;
            padding-bottom: 0.15em;
        }

        .ml14 .line {
            opacity: 0;
            position: absolute;
            left: 0;
            height: 2px;
            width: 100%;
            background-color: #fff;
            transform-origin: 100% 100%;
            bottom: 0;
        }

        .ml14 .letter {
            display: inline-block;
            line-height: 1em;
        }

        .full img {
            width: 40%;
            position: relative;
            animation-duration: 4s;
            animation: mymove 4s infinite;
            animation-iteration-count: 1;
        }

        @keyframes mymove {
            from {
                top: -250px;
                width: 80%;
            }

            to {
                top: 0px;
                width: 40%;
            }
        }


        .right {
            width: 40%;
            height: 600px;
            display: inline-block;
        }

        .left {
            width: 59%;
            height: 650px;
            float: left;
        }

        video {
            width: 90%;
            height: 580px;
            margin: 5%;
        }

        .container {
            clear: both;
        }

        .navbar ul li a {
            color: white !important;
            opacity: 1 !important;
        }

        .navbar ul li a:hover {
            color: #c1c8e4 !important;
        }

        .para {
            margin-top: 20%;
        }

        footer {
            background-color: black;
            display: inline-block;
            width: 100%;
            padding: 2%;
        }

        .div {
            display: inline-block;
            width: 33%;
            color: #c1c8e4;
            margin: auto;
            padding: auto;
            text-align: center;
            align-content: space-around;
        }

        div .img {
            display: inline-block;
            width: 50%;
        }
    </style>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top navbar-custom">
            <a class="navbar-brand" href="#">BMSCE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto" style="font-size:120%;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="student_login.php" style="color:white; text-decoration:none;">LOGIN</a></button>
                </form>
            </div>
        </nav>
    </header>
    <div class="full">

        <h1 class="ml3">BMS College of Engineering</h1>
        <script>
            var textWrapper = document.querySelector('.ml3');
            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

            anime.timeline({
                    loop: false
                })
                .add({

                    targets: '.ml3 .letter',
                    opacity: [0, 1],
                    easing: "easeInOutQuad",
                    duration: 2000,
                    delay: (el, i) => 150 * (i + 1)
                })
        </script>
        <h1 class="ml14">
            <span class="text-wrapper">
                <span class="letters">Let us do great things together</span>
                <span class="line"></span>
            </span>
        </h1>
        <script>
            var textWrapper = document.querySelector('.ml14 .letters');
            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

            anime.timeline({
                    loop: false
                })
                .add({
                    targets: '.ml14 .line',
                    scaleX: [0, 1],
                    opacity: [0.5, 1],
                    easing: "easeInOutExpo",
                    duration: 3000
                }).add({
                    targets: '.ml14 .line',
                    opacity: 0,
                    duration: 1000,
                    easing: "easeOutExpo",
                    delay: 2000
                });

            anime.timeline({
                    loop: true
                })
                .add({
                    delay: 2000,
                    targets: '.ml14 .letter',
                    opacity: [0, 1],
                    translateX: [40, 0],
                    translateZ: 0,
                    scaleX: [0.3, 1],
                    easing: "easeInOutExpo",
                    duration: 4000,
                    offset: '-=600',
                    delay: (el, i) => 150 + 25 * i
                }).add({
                    targets: '.ml14 .letter',
                    opacity: 0,
                    duration: 1000,
                    easing: "easeOutExpo",
                    delay: 1000
                });
        </script>
        <img src="images/bms_logo.png" />

    </div>


    <div class="left">
        <video autoplay muted loop id="myVideo">
            <source src="images/bms_video.mov" type="video/mp4">
        </video>
    </div>

    <div class="right" id="about">
        <div class="para">
            <p class="lead">B.M.S. College of Engineering (BMSCE) is an autonomous engineering college in Basavangudi, Bangalore, India. It was started in 1946 by Bhusanayana Mukundadas Sreenivasaiah and is run by the B.M.S. Educational Trust.It is affiliated with Visvesvaraya Technological University and became autonomous in 2008. BMSCE is located on Bull Temple Road, Basavanagudi, diagonally opposite to the famous Bull Temple. Though a private engineering college, it is partially funded by the Government of Karnataka.</p>
            <p class="lead" style="font-family: 'Roboto Condensed'; font-size:160%; ">
                Rankings
            <ul style="font-family: 'Roboto Condensed'; font-size:130%; ">
                <li>
                    NIRF (2019) 69</li>
                <li>Outlook India (2019) 40</li>
                <li>India Today (2020) 24</li>
            </ul>

            </p>
        </div>
    </div>

    <footer id="contact">
        <div class="div">
            <img class="img" src="images/bmsce_logo.png">
        </div>
        <div class="div second">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497699.9974198194!2d77.35072903896105!3d12.953847709359573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1596180539411!5m2!1sen!2sin" width="180" height="100" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <p><i class="fas fa-map-marker-alt"></i><span class="glyphicon glyphicon-map-marker"></span> Bangalore,India</p>
        </div>
        <div class="div third">
            <p><i class="fas fa-phone-square"></i><span class="glyphicon glyphicon-phone"></span> Phone: +91 1111111111</p>
            <p><i class="fas fa-envelope"></i><span class="glyphicon glyphicon-envelope"></span> Email: bmsce@bmsce.ac.in</p>
        </div>
    </footer>
</body>

</html>