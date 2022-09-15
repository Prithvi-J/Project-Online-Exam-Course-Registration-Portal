<?php
include('session_admin.php');
$eid = $_POST["eid"];
$_SESSION["exam_id"] = $eid;

$tbl_name1 = "exam_registration";
$tbl_name2 = "student";
$tbl_name3 = "exam";
$conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
mysqli_select_db($conn, "$db_name") or die("cannot select DB");

$sql = "SELECT e.name as ename,e.sem as esem ,e.start_date as edate  FROM $tbl_name3 e
                 WHERE e.exam_id ='$eid'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$ename = $row['ename'];
$esem = $row['esem'];
$time = strtotime($row['edate']);
$emonth = date("F", $time);
$eyear = date("Y", $time);

$sql = "SELECT e.usn AS usn,s.name as name,s.current_sem as sem FROM $tbl_name1 e,$tbl_name2 s
            WHERE e.exam_id = '$eid' and e.usn = s.usn";

$res = mysqli_query($conn, $sql);
$count1 = mysqli_num_rows($res);
//echo "{$count1}";
$j = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $i = 0;
    $array[$j][$i++] = $row['usn'];
    $array[$j][$i++] = $row['name'];
    $array[$j][$i++] = $row['sem'];
    $j++;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <link rel="stylesheet" href="table.css">
    <title>Student List</title>
    <style>
        .table {
            margin: 5% auto;
            width: 70%;
        }

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

        .back {
            font-size: 1.25rem;
            margin-left: 80%;
            font-size: 1.5rem;
            line-height: 1.4;
            margin-top: -3.5%;
        }

        a:hover {
            color: #4cf352;
        }

        p a {
            color: navy;
        }

        h2 {
            text-align: center;
            font-size: 220%;
            color: black;
        }
    </style>

</head>

<body>
    <button class="logout"><a href="admin_login.php">LOGOUT</a></button>



    <section class="table">
        <h2>EXAM REGISTRATION STATUS</h2>
        <p>(LIST OF STUDENTS REGISTERED FOR<?php echo "  {$ename} (SEM: {$esem}) {$emonth}-{$eyear} "; ?>)</p>
        <?php
        if ($count1 == 0) {
            echo '<span style="font-size:120%";>NO STUDENT FOUND';
        } else {
        ?>
            <table>
                <tr>
                    <th>USN</th>
                    <th>STUDENT NAME</th>
                    <th>SEM</th>
                </tr>
            <?php
            for ($j = 0; $j < $count1; $j++) {
                echo "<tr><td>{$array[$j][0]}</td><td> {$array[$j][1]}</td><td>{$array[$j][2]}</td></tr>";
            }
        }
            ?>
            </table>
    </section>
    <p class="back"><a href="admin_homepage.php" style="text-decoration:none;"><i class="fas fa-undo-alt"></i> Back to homepage</a></p>
</body>

</html>