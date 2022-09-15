//check commit
<?php
include('session_admin.php');

$host = "localhost";
$username = "root";
$password = "";
$db_name = "project";
$tbl_name = "student";
$conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
mysqli_select_db($conn, "$db_name") or die("cannot select DB");


if (isset($_POST['submit'])) {
    $dep = $_POST['fname'];
    $sql2 = "delete from course where course_id='$dep';";
    if ($conn->query($sql2) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$sql = "select course_id as cid,name as cname,sem as sem,credits as credits from course where dept_id = '$loggedin_dept';";
$res = mysqli_query($conn, $sql);
$count1 = mysqli_num_rows($res);
$j = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $i = 0;
    $array[$j][$i++] = $row['cid'];
    $array[$j][$i++] = $row['cname'];
    $array[$j][$i++] = $row['sem'];
    $array[$j][$i++] = $row['credits'];
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
    <title>Delete Course</title>
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

        a:hover {
            color: red;
        }

        p a {
            color: navy;
           
            font-size: 90%;
        }
    </style>

</head>

<body>
    <p class="back"><a href="department_homepage.php" style="text-decoration:none;"><i class="fas fa-undo-alt"></i> Back to homepage</a></p>

    <h2>Courses</h2>
    <p>Select the course you want to delete</p>
        <form id="myform" action="?" method="post">
        <span>Are you sure you want to delete this course?</span>
        <input name='fname' id='fname'>
        <input type="submit" class="registerbtn" value="DELETE" name="submit">
    </form>
    <section class="table">
      
    
        <?php
        if ($count1 == 0) {
            echo '<span style="font-size:120%";>NO STUDENT FOUND';
        } else {
        ?>
            <table id="table">
                <tr>
                    <th>Course_id</th>
                    <th>Course name</th>
                    <th>Sem</th>
                    <th>Credits</th>
                </tr>
            <?php
            for ($j = 0; $j < $count1; $j++) {
                echo "<tr><td>{$array[$j][0]}</td><td>{$array[$j][1]}</td><td>{$array[$j][2]}</td><td>{$array[$j][3]}</td></tr>";
            }
        }
            ?>
            </table>
    </section>

    
</body>

<script>
    var table = document.getElementById("table");
    for (var i = 0; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            //rIndex = this.rowIndex;

            document.getElementById("fname").value = this.cells[0].innerHTML;

            console.log(document.getElementById("fname").value);
            if (document.getElementById("fname").value != '') {
                submitform();
            }


        };
    }



    function submitform() {
        if (validate()) {

            document.getElementById("myform").submit();
            document.getElementById("fname").value = "";
        }
    };



    function validate() {

        var fname = document.getElementById("fname").value;


        if (fname != '') {
            return true;
        } else {
            alert("There is no value");
            return false;
        }

    }
</script>

</html>