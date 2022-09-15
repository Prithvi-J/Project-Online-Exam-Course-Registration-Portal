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
    <?php
    $tbl_name3 = "course";
    $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
    mysqli_select_db($conn, "$db_name") or die("cannot select DB");

    $sql = "SELECT c.course_id AS cid,c.name as cname  FROM $tbl_name3 c
             where dept_id = '$loggedin_dept'";

    $res = mysqli_query($conn, $sql);
    $count1 = mysqli_num_rows($res);
    $j = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $i = 0;
        $array[$j][$i++] = $row['cid'];
        $array[$j][$i++] = $row['cname'];
        $j++;
    }
    ?>
    <section class="right">
        <form method="POST" action="eligibility_add.php" name="form2">

            <center>
                <h1> ADD ELIGIBILITY:</h1>
            </center>
            <hr>
            <div>
                <div class="shift">
                    <label class="field left">
                        Course:
                    </label>

                    <select name="cid" required>
                        <?php
                        for ($i = 0; $i < $count1; $i++) {  ?>
                            <option value="<?php echo htmlspecialchars($array[$i][0]); ?>"><?php echo "<span> {$array[$i][1]}"; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <input type="submit" class="registerbtn" value="NEXT">

        </form>
    </section>
</body>

</html>