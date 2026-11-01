<?php
include "db.php";
unset($_SESSION['student_id']);
unset($_SESSION['student_name']);
header("Location: index.php");
?>
