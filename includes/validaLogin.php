<?php
$login="aa";
$pass="xx";
if(isset($_POST["login"]))
	$login=$_POST["login"];
else
	return header("Location: ../login.php?msg=1");

if(isset($_POST["pass"]))
	$pass=$_POST["pass"];
else
	return header("Location: ../login.php?msg=2");
	
require "../classes/loginClass.php";
$l=new Login($login, $pass);
if($l->doLogin()){
	return header("Location: ../index.php");
}
header("Location: ../login.php?msg=0");	