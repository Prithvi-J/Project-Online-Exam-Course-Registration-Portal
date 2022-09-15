<html>

<head>
    
    <?php
    include('session.php');
    //session_start();
    ?>
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f293a21338.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />

    <style>
        body {
            font-family: Arial;
        }

        input {
            font-family: Arial;
            font-size: 14px;
        }

        label {
            font-family: Arial;
            font-size: 16px;
            color: black;
        }

        .tblSaveForm {
            background-color: aliceblue;
        }

        .tableheader {
            background-color: #4682B4;
            color: aliceblue;
            text-align: center;
            font-weight: 120%;
            font-size: larger;
        }

        .btnSubmit {
            padding: 5px;
            border-color: #FF6600;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            padding: 2%;
            margin-left: 75%;
            border: none;
            cursor: pointer;
            width: 20%;
            opacity: 0.9;
        }

        .btnSubmit:hover {
            opacity: 2;
            border: 1px solid black;
        }

        .full {
            display: inline-block;
            width: 50%;
            margin-left: 30%;
            margin-top: 13%;
        }

        .message {
            color: #FF0000;
            text-align: left;
            width: 100%;
        }

        .txtField {
            padding: 5px;
            border: #fedc4d 1px solid;
            border-radius: 4px;
        }

        .required {
            color: #FF0000;
            font-size: 11px;
            font-weight: italic;
            padding-left: 10px;
        }

        .link {
            margin-left: 40%;
            font-size: larger;
        }

        a:hover {
            color: #EE4B2B;
        }
    </style>
    <script>
        function validatePassword() {
            var currentPassword, newPassword, confirmPassword, output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if (!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "REQUIRED";
                output = false;
            } else if (!newPassword.value) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = "REQUIRED";
                output = false;
            } else if (!confirmPassword.value) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "REQUIRED";
                output = false;
            }
            if (newPassword.value != confirmPassword.value) {
                newPassword.value = "";
                confirmPassword.value = "";
                newPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "NOT SAME";
                output = false;
            }
            return output;
        }
    </script>
</head>

<body>

    <?php
    $_SESSION["usn"] = "$loggedin_usn ";
    $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect");
    mysqli_select_db($conn, "$db_name") or die("cannot select DB");

    if (count($_POST) > 0) {
        $result = mysqli_query($conn, "SELECT *from student WHERE usn='" . $_SESSION["usn"] . "'");
        $row = mysqli_fetch_array($result);
        if ($_POST["currentPassword"] == $row['password']) {
            mysqli_query($conn, "UPDATE student set password='" . $_POST["newPassword"] . "' WHERE usn='" . $_SESSION["usn"] . "'");
            $message = "Password Changed";
        } else
            $message = "Current Password is not correct";
    }
    ?>
    <div class="full">
        <form class="form" name="frmChange" method="post" action="" onSubmit="return validatePassword()">
            <div style="width:500px;">
                <div class="message"><?php if (isset($message)) {
                                            echo "<span>$message<span>";
                                        } ?></div>
                <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
                    <tr class="tableheader">
                        <td colspan="2">Change Password</td>
                    </tr>
                    <tr>
                        <td width="40%"><label>Current Password</label></td>
                        <td width="60%"><input type="password" name="currentPassword" class="txtField" /><span id="currentPassword" class="required"></span></td>
                    </tr>
                    <tr>
                        <td><label>New Password</label></td>
                        <td><input type="password" name="newPassword" class="txtField" /><span id="newPassword" class="required"></span></td>
                    </tr>
                    <td><label>Confirm Password</label></td>
                    <td><input type="password" name="confirmPassword" class="txtField" /><span id="confirmPassword" class="required"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
                    </tr>
                </table>
            </div>
        </form>

        <a class="link" href="profile.php" style="text-decoration:none;"><i class="fas fa-undo-alt"></i> Back to Profile</a>
    </div>

</body>

</html>