<?php
session_start();
$_SESSION["login"]=false;
header("Location: ./index1.php?action=empty");
header("Location: ../index.php");
?>