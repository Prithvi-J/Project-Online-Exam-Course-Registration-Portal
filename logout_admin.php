<?php
session_start();
unset($_SESSION['email']);
header('Location: admin_login.php');
session_destroy();