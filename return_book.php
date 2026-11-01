<?php
include "db.php";
if (!isset($_SESSION['student_id'])) { header("Location: login.php"); exit; }
$sid = $_SESSION['student_id'];
$id = $_GET['id'];   // borrowing id
$today = date('Y-m-d');

// find this borrowing (must be yours and not returned yet)
$result = mysqli_query($conn, "SELECT * FROM borrowings WHERE id=$id AND student_id=$sid AND return_date IS NULL");
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $bid = $row['book_id'];
    mysqli_query($conn, "UPDATE borrowings SET return_date='$today' WHERE id=$id");
    mysqli_query($conn, "UPDATE books SET available = available + 1 WHERE id=$bid");
}
header("Location: my_books.php");
?>
