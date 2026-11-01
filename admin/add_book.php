<?php
include "../db.php";
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
if (isset($_POST['title'])) {
    $t = $_POST['title'];
    $a = $_POST['author'];
    $c = $_POST['category'];
    $i = $_POST['isbn'];
    $n = $_POST['copies'];
    // a new book has all copies available
    mysqli_query($conn, "INSERT INTO books (title, author, category, isbn, copies, available) VALUES ('$t','$a','$c','$i',$n,$n)");
    header("Location: index.php");
    exit;
}
$title = "Add Book";
include "sidebar.php";
?>
<h2 class="mb-4">Add Book</h2>
<div class="card p-4" style="max-width:600px">
  <form method="post">
    <input class="form-control mb-3" name="title" placeholder="Title" required>
    <input class="form-control mb-3" name="author" placeholder="Author" required>
    <input class="form-control mb-3" name="category" placeholder="Category" required>
    <input class="form-control mb-3" name="isbn" placeholder="ISBN">
    <input class="form-control mb-3" type="number" name="copies" placeholder="Number of copies" min="1" required>
    <button class="btn btn-forest">Save Book</button>
    <a class="btn btn-outline-secondary" href="index.php">Cancel</a>
  </form>
</div>
<?php include "../footer.php"; ?>
