<?php
session_start();
unset($_SESSION['festival_admin']);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: ../login.php?msg=4");