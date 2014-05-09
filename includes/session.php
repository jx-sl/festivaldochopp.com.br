<?php
session_start();
ob_start();
if(!isset($_SESSION['festival_admin'])){
	header("Location: login.php");
}