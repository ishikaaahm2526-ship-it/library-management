<?php
// Admin pages: session check + head + dark green sidebar. Set $title before including.
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }
$is_admin = 1;
include "../head.php";
?>
<div class="sidebar">
  <div class="text-center mb-4">
    <span class="logo-pill"><img src="https://skf.edu.in/images/skf-newlogo-new1.jpg" alt="SKF"></span>
    <h5 class="brand text-white mt-2 mb-0">SKF Central Library</h5>
    <small style="color:#c9a227">Admin Panel</small>
  </div>
  <a href="index.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
  <a href="add_book.php"><i class="bi bi-plus-circle"></i> Add Book</a>
  <a href="borrowings.php"><i class="bi bi-arrow-left-right"></i> Borrowings</a>
  <a href="../index.php"><i class="bi bi-house"></i> Student Site</a>
  <a href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a>
</div>
<div class="main-admin">
