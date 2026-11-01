<?php
include "db.php";
// must be logged in
if (!isset($_SESSION['student_id'])) { header("Location: login.php"); exit; }
$sid = $_SESSION['student_id'];
$bid = $_GET['id'];
$msg = "";
$ok = false;

$result = mysqli_query($conn, "SELECT * FROM books WHERE id=$bid");
$book = mysqli_fetch_assoc($result);
// does this student already have this book?
$dup = mysqli_query($conn, "SELECT * FROM borrowings WHERE student_id=$sid AND book_id=$bid AND return_date IS NULL");

if (!$book) {
    $msg = "Book not found.";
} elseif ($book['available'] <= 0) {
    $msg = "Sorry, no copies are available.";
} elseif (mysqli_num_rows($dup) > 0) {
    $msg = "You have already borrowed this book.";
} else {
    $today = date('Y-m-d');
    $due = date('Y-m-d', strtotime('+14 days'));
    mysqli_query($conn, "INSERT INTO borrowings (student_id, book_id, borrow_date, due_date) VALUES ($sid, $bid, '$today', '$due')");
    mysqli_query($conn, "UPDATE books SET available = available - 1 WHERE id=$bid");
    $ok = true;
    $msg = "You borrowed '" . $book['title'] . "'. Please return it by $due.";
}
$title = "Borrow";
include "header.php";
?>
<div class="alert <?php echo $ok ? 'alert-success' : 'alert-danger'; ?>"><?php echo $msg; ?></div>
<a class="btn btn-forest" href="my_books.php">My Books</a>
<a class="btn btn-outline-secondary" href="index.php">Back to catalogue</a>
<?php include "footer.php"; ?>
