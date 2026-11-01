<?php
include "db.php";
$title = "Catalogue";
include "header.php";

// read search box and category filter
$q = "";
$cat = "";
if (isset($_GET['q'])) { $q = $_GET['q']; }
if (isset($_GET['category'])) { $cat = $_GET['category']; }

// build the query
$sql = "SELECT * FROM books WHERE (title LIKE '%$q%' OR author LIKE '%$q%')";
if ($cat != "") { $sql = $sql . " AND category='$cat'"; }
$sql = $sql . " ORDER BY title";
$books = mysqli_query($conn, $sql);
$cats = mysqli_query($conn, "SELECT DISTINCT category FROM books ORDER BY category");
$colors = array("#b5332e", "#1f4d3a", "#c9a227", "#2c5f8a", "#7a4a8c", "#d2691e");
?>
<h2 class="mb-3"><i class="bi bi-journal-bookmark"></i> Book Catalogue</h2>
<form class="row g-2 mb-4" method="get">
  <div class="col-md-6"><input class="form-control" name="q" value="<?php echo $q; ?>" placeholder="Search by title or author"></div>
  <div class="col-md-3">
    <select class="form-select" name="category">
      <option value="">All categories</option>
      <?php while ($c = mysqli_fetch_assoc($cats)) {
          $sel = ($c['category'] == $cat) ? "selected" : "";
          echo "<option $sel>" . $c['category'] . "</option>";
      } ?>
    </select>
  </div>
  <div class="col-md-3"><button class="btn btn-forest w-100"><i class="bi bi-search"></i> Search</button></div>
</form>

<div class="table-responsive card">
<table class="table table-hover align-middle mb-0">
  <thead><tr><th></th><th>Title</th><th>Author</th><th>Category</th><th>Status</th><th></th></tr></thead>
  <tbody>
  <?php
  $i = 0;
  while ($b = mysqli_fetch_assoc($books)) {
      $color = $colors[$i % 6];
      $i = $i + 1;
      echo "<tr>";
      echo "<td><i class='bi bi-book-fill fs-3' style='color:$color'></i></td>";
      echo "<td><strong>" . $b['title'] . "</strong><br><small class='text-muted'>ISBN " . $b['isbn'] . "</small></td>";
      echo "<td>" . $b['author'] . "</td>";
      echo "<td>" . $b['category'] . "</td>";
      if ($b['available'] > 0) {
          echo "<td><span class='badge bg-success'>Available (" . $b['available'] . ")</span></td>";
          echo "<td><a class='btn btn-sm btn-gold' href='borrow.php?id=" . $b['id'] . "'>Borrow</a></td>";
      } else {
          echo "<td><span class='badge bg-danger'>Not available</span></td>";
          echo "<td></td>";
      }
      echo "</tr>";
  }
  if ($i == 0) { echo "<tr><td colspan='6' class='text-center text-muted'>No books found.</td></tr>"; }
  ?>
  </tbody>
</table>
</div>
<?php include "footer.php"; ?>
