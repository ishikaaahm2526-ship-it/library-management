<?php
include "../db.php";
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
$id = $_GET['id'];
if (isset($_POST['title'])) {
    $t = $_POST['title'];
    $a = $_POST['author'];
    $c = $_POST['category'];
    $i = $_POST['isbn'];
    $n = $_POST['copies'];
    // keep "available" correct: new copies minus books currently issued
    $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM borrowings WHERE book_id=$id AND return_date IS NULL"));
    $avail = $n - $r['c'];
    mysqli_query($conn, "UPDATE books SET title='$t', author='$a', category='$c', isbn='$i', copies=$n, available=$avail WHERE id=$id");
    header("Location: index.php");
    exit;
}
$b = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM books WHERE id=$id"));
$title = "Edit Book";
include "sidebar.php";
?>
<h2 class="mb-4">Edit Book</h2>
<div class="card p-4" style="max-width:600px">
  <form method="post">
    <input class="form-control mb-3" name="title" value="<?php echo $b['title']; ?>" required>
    <input class="form-control mb-3" name="author" value="<?php echo $b['author']; ?>" required>
    <input class="form-control mb-3" name="category" value="<?php echo $b['category']; ?>" required>
    <input class="form-control mb-3" name="isbn" value="<?php echo $b['isbn']; ?>">
    <input class="form-control mb-3" type="number" name="copies" value="<?php echo $b['copies']; ?>" min="1" required>
    <button class="btn btn-forest">Update Book</button>
    <a class="btn btn-outline-secondary" href="index.php">Cancel</a>
  </form>
</div>
<?php include "../footer.php"; ?>
