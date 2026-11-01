<?php
include "../db.php";
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM books WHERE id=$id");
header("Location: index.php");
?>
