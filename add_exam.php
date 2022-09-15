<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('session_admin.php');
    //session_start();
    ?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <title>Add Exam</title>
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
    </style>

</head>

<body>

    <section class="right">
        <form method="POST" action="add_timetable.php" name="form2">

            <center>
                <h1> ADD EXAM:</h1>
            </center>
            <hr>
            <div>
                <label class=" field left">
                    Exam Name :
                </label>

                <select required name="name">
                    <option value="">Exam Name</option>
                    <option value="SEMESTER END EXAMINATION">SEMESTER END EXAMINATION</option>
                    <option value="IMPROVEMENT EXAMINATION">IMPROVEMENT EXAMINATION</option>
                </select>
            </div>
            <div>
                <label class="field left">
                    Semester:
                </label>

                <select name="sem" required>
                    <option value="">Semester</option>
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
            <br>
            <div>
                <label class="field left">
                    Start Date:
                </label>
                <input type="date" id="Date" name="start_date" required>
                <input type="submit" class="registerbtn" value="NEXT">

        </form>
    </section>
</body>

</html>