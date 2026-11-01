<?php
include "../db.php";
$title = "Dashboard";
include "sidebar.php";   // also checks admin login
$today = date('Y-m-d');

// the four counts
$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM books"));
$total_books = $r['c'];
$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM students"));
$total_students = $r['c'];
$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM borrowings WHERE return_date IS NULL"));
$issued = $r['c'];
$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM borrowings WHERE return_date IS NULL AND due_date < '$today'"));
$overdue = $r['c'];

$books = mysqli_query($conn, "SELECT * FROM books ORDER BY id");
?>
<h2 class="mb-4">Dashboard</h2>
<div class="row g-3 mb-4">
  <div class="col-md-3"><div class="card p-3 text-center"><h2><?php echo $total_books; ?></h2><span>Total Books</span></div></div>
  <div class="col-md-3"><div class="card p-3 text-center"><h2><?php echo $total_students; ?></h2><span>Students</span></div></div>
  <div class="col-md-3"><div class="card p-3 text-center"><h2><?php echo $issued; ?></h2><span>Books Issued</span></div></div>
  <div class="col-md-3"><div class="card p-3 text-center"><h2 class="text-danger"><?php echo $overdue; ?></h2><span>Overdue</span></div></div>
</div>

<div class="d-flex justify-content-between mb-2">
  <h4>All Books</h4>
  <a class="btn btn-gold btn-sm" href="add_book.php"><i class="bi bi-plus-lg"></i> Add Book</a>
</div>
<div class="table-responsive card">
<table class="table align-middle mb-0">
  <thead><tr><th>ID</th><th>Title</th><th>Author</th><th>Category</th><th>Copies</th><th>Available</th><th>Actions</th></tr></thead>
  <tbody>
  <?php while ($b = mysqli_fetch_assoc($books)) { ?>
    <tr>
      <td><?php echo $b['id']; ?></td>
      <td><?php echo $b['title']; ?></td>
      <td><?php echo $b['author']; ?></td>
      <td><?php echo $b['category']; ?></td>
      <td><?php echo $b['copies']; ?></td>
      <td><?php echo $b['available']; ?></td>
      <td>
        <a class="btn btn-sm btn-forest" href="edit_book.php?id=<?php echo $b['id']; ?>">Edit</a>
        <a class="btn btn-sm btn-danger" href="delete_book.php?id=<?php echo $b['id']; ?>" onclick="return confirm('Delete this book?')">Delete</a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
<?php include "../footer.php"; ?>
