<?php
include "db.php";
if (!isset($_SESSION['student_id'])) { header("Location: login.php"); exit; }
$sid = $_SESSION['student_id'];
$today = date('Y-m-d');
$title = "My Books";
include "header.php";
$rows = mysqli_query($conn, "SELECT borrowings.*, books.title, books.author FROM borrowings JOIN books ON borrowings.book_id = books.id WHERE borrowings.student_id=$sid ORDER BY borrowings.borrow_date DESC");
?>
<h2 class="mb-3"><i class="bi bi-bookmark-check"></i> My Borrowed Books</h2>
<div class="table-responsive card">
<table class="table align-middle mb-0">
  <thead><tr><th>Title</th><th>Borrowed</th><th>Due</th><th>Status</th><th></th></tr></thead>
  <tbody>
  <?php
  $n = 0;
  while ($r = mysqli_fetch_assoc($rows)) {
      $n = $n + 1;
      echo "<tr><td><strong>" . $r['title'] . "</strong><br><small>" . $r['author'] . "</small></td>";
      echo "<td>" . $r['borrow_date'] . "</td><td>" . $r['due_date'] . "</td>";
      if ($r['return_date'] != "") {
          echo "<td><span class='badge bg-secondary'>Returned " . $r['return_date'] . "</span></td><td></td>";
      } else {
          if ($r['due_date'] < $today) {
              echo "<td><span class='badge bg-danger'>Overdue</span></td>";
          } else {
              echo "<td><span class='badge bg-primary'>Borrowed</span></td>";
          }
          echo "<td><a class='btn btn-sm btn-forest' href='return_book.php?id=" . $r['id'] . "'>Return</a></td>";
      }
      echo "</tr>";
  }
  if ($n == 0) { echo "<tr><td colspan='5' class='text-center text-muted'>You have not borrowed any books yet.</td></tr>"; }
  ?>
  </tbody>
</table>
</div>
<?php include "footer.php"; ?>
