<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('session_admin.php');
    $_SESSION['cid'] = $_POST["cid"];
    $cid = $_SESSION['cid'];

    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <title>Add Eligibility</title>
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
        input[type=password],
        input[type=time],
        input[type=date],
        select {
            width: 80%;
            font-size: small;
            padding: 5%;
            margin: 5% 0 10% 10%;
            height: 10%;
            border: none;
            background: #f1f1f1;
        }

        .heading{
            display: inline-block;
            width:20%;
            margin-left: 3%;
        }
        span {
            display: inline-block;
            width: 80%;
            height: 10%;
            background: #f1f1f1;
            margin: 5% 0 10% 10%;
            padding: 5%;
            font-size: small;
        }

        input[type=time]:focus,
        input[type=date]:focus {
            background-color: #f7ef86;
            outline: none;
        }


        .shift>label,
        .left {
            display: block;
            font-weight: bold;
        }

        .right hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }



        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin-left: 80%;
            border: none;
            cursor: pointer;
            width: 15%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        div .div {
            display: inline-block;
            width: 22%;
        }

        div .left {
            display: block;
            margin-left: 10%;
        }
    </style>

</head>

<body>
    <section class="right">
        <form method="POST" action="add_next.php" name="form2">

            <center>
                <h1> Add Eligibility</h1>
            </center>
            <hr>
            <?php
            $tbl_name1 = "course_enrolled";
            $tbl_name2 = "student";
            $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
            mysqli_select_db($conn, "$db_name") or die("cannot select DB");

            $sql = "SELECT s.usn AS usn,s.name as sname FROM $tbl_name2 s,$tbl_name1 ce
                    WHERE ce.course_id='$cid' and s.usn=ce.usn and ce.sem=s.current_sem";
            $res = mysqli_query($conn, $sql);
            $_SESSION["count1"] = mysqli_num_rows($res);
            $j = 0;
            while ($row = mysqli_fetch_assoc($res)) {
                $i = 0;
                $array[$j][$i++] = $row['usn'];
                $array[$j][$i++] = $row['sname'];
                $j++;
            }
            ?>

            <div class="left">
                <P class="heading">USN </p>
                <p class="heading">NAME </p>
                <p class="heading">MARKS </p>
                <p class="heading">ATTENDANCE </p>
                <?php
                for ($i = 0; $i < $_SESSION["count1"]; $i++) {  ?>
                    <div class="div">
                    
                        <?php echo "<span>{$array[$i][0]}</span>"; ?>
                    </div>
                    <div class="div">
              
                        <?php echo "<span>{$array[$i][1]}</span>"; ?>
                    </div>

                    <div class="div">
                        <input type="text" id="marks" name="marks[]">
                    </div>
                    <div class="div">

                        <input type="text" id="attendance" name="attendance[]">
                    </div>
                <?php }
                $_SESSION["data"] = $array;
                //  print_r($_SESSION); 
                ?>
            </div>
            <input type="submit" class="registerbtn" value="NEXT">

        </form>
    </section>
</body>

</html>