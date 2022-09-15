<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <?php
session_start();
?>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #e9eaea;
            font-family: roboto;
            user-select: none;
        }

        .container {
            width: 450px;
            margin-left:60%;
            margin-top:10%;
        }

        .signup,
        .login {
            width: 50%;
            background: #fff;
            float: left;
            height: 60px;
            line-height: 60px;
            text-align: center;
            cursor: pointer;
            text-transform: uppercase;
        }

        .signup-form,
        .login-form {
            background: #ccf5f2;
            padding: 40px;
            clear: both;
            width: 100%;
            box-sizing: border-box;
            height: 400px;
        }
        .login {
            background: #ccf5f2;
        }

        .input {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            margin-bottom: 25px;
            border: 2px solid #e9eaea;
            color: #3e3e40;
            font-size: 14px;
            outline: none;
            transform: all 0.5s ease;
        }

            .input:focus {
                border: 2px solid #34b3a0;
            }

        .btn {
            width: 100%;
            background: #34b3a0;
            height: 60px;
            text-align: center;
            line-height: 60px;
            text-transform: uppercase;
            color: #fff;
            font-weight: bold;
            letter-spacing: 1px;
            cursor: pointer;
            margin-bottom: 30px;
        }

         a {
            text-decoration: none;
            color: #000;
        }
        body{
            background-image:url('images/bmsce.jpg');
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-size:100% 100%;
        }
        #text{
            color:red;
        }
    </style>
    <script>
        function visible() {
            var x = document.getElementById("input");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>
<body>
   
    <form name="myform"  method="POST" action="login_admin.php">
    <div class="container">

        <div class="signup"><a href="student_login.php">STUDENT LOGIN</a></div>

        <div class="login">ADMIN LOGIN</div><br />

                                            <div class="signup-form">
                                            <?php
                    if(isset($_SESSION["msg"])){
                       $er1 = $_SESSION["msg"];
                        print "<span id='text'>{$er1}</span>";
                        unset($_SESSION["msg"]);
                    }
                ?>
                                                <input type="text" name="mail" placeholder="Email" class="input" required autocomplete="off"><br>
                                                <input type="password" name="password" placeholder="Password" class="input" id="input" required>
                                                <input type="checkbox" onclick="visible()" autocomplete="off"> Show Password<br/><br /><br/>
                                                <input type="submit" class="btn" value="LOGIN">

                                            </div>


    </div>
    </form>
    </body>
</html>
