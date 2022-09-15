<?php

include('session.php');
if (isset($_POST['but_upload'])) {

    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        $conv = explode('.', $name);
        $ext = $conv['1'];
        // $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
        if (move_uploaded_file($_FILES['file']['tmp_name'], "upload/" . $loggedin_usn . "." . $imageFileType)) {
            // Insert record
            $url = $loggedin_usn . "." . $imageFileType;
            //echo "{$url}";
            $ans = 0;
            $sql = "UPDATE student SET image_url='$url' WHERE usn='$loggedin_usn'";
            if (mysqli_query($conn, $sql)) {
                $ans = 1;
                $_SESSION['profile_url'] = "upload/" . $url;
                //echo $_SESSION['profile_url'];
            } else {
                echo "Error updating Profile: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <title>Student Homepage</title>
    <style>
        body {
            background-color: lightblue;
        }

        input[type=file] {
            margin: 5px 2px 22px 5px;
            display: inline-block;
            height: 20%;
            font-size: larger;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .registerbtn {
            font-size: larger;
            background-color: #4CAF50;
            color: white;
            padding: 10px 12px;
            border: none;
            cursor: pointer;
            width: 15%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 2;
            border: 1px solid black;
        }

        .link {
            font-size: larger;
        }

        .link a:hover {
            color: #EE4B2B;
        }
    </style>

<body>
    <form method="post" action="" enctype='multipart/form-data'>
        <center>
            <h1> Change Profile Picture</h1>
        </center>
        <hr>
        <input type='file' name='file' />
        <input type='submit' class='registerbtn' value='Change' name='but_upload'>
    </form>
    <?php
    if (isset($ans)) {
        if ($ans == 1) {
            $ans == 0;
            echo "<span>Profile updated successfully<span>";
        }
    }
    ?>
    <p class="link"><a href="profile.php" style="text-decoration:none;"><i class="fas fa-undo-alt"></i> Back to profile</a></p>
</body>

</html>