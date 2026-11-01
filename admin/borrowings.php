<?php
include "../db.php";
$title = "Borrowings";
include "sidebar.php";
$today = date('Y-m-d');
$rows = mysqli_query($conn, "SELECT borrowings.*, students.name, students.roll_no, books.title FROM borrowings JOIN students ON borrowings.student_id = students.id JOIN books ON borrowings.book_id = books.id ORDER BY borrowings.id DESC");
?>
<h2 class="mb-4">All Borrowings</h2>
<div class="table-responsive card">
<table class="table align-middle mb-0">
  <thead><tr><th>#</th><th>Student</th><th>Roll No</th><th>Book</th><th>Borrowed</th><th>Due</th><th>Returned</th><th>Status</th></tr></thead>
  <tbody>
  <?php while ($r = mysqli_fetch_assoc($rows)) {
      if ($r['return_date'] != "") {
          $status = "<span class='badge bg-secondary'>Returned</span>";
      } elseif ($r['due_date'] < $today) {
          $status = "<span class='badge bg-danger'>Overdue</span>";
      } else {
          $status = "<span class='badge bg-primary'>Issued</span>";
      }
      echo "<tr><td>" . $r['id'] . "</td><td>" . $r['name'] . "</td><td>" . $r['roll_no'] . "</td><td>" . $r['title'] . "</td>";
      echo "<td>" . $r['borrow_date'] . "</td><td>" . $r['due_date'] . "</td><td>" . $r['return_date'] . "</td><td>$status</td></tr>";
  } ?>
  </tbody>
</table>
</div>
<?php include "../footer.php"; ?>
