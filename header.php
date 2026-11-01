<?php
// Student pages: head + top navbar. Set $title before including.
include "head.php";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-forest gold-line">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <span class="logo-pill me-2"><img src="https://skf.edu.in/images/skf-newlogo-new1.jpg" alt="SKF"></span>
      <span class="brand text-white">SKF Central Library</span>
    </a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-book"></i> Catalogue</a></li>
        <?php if (isset($_SESSION['student_id'])) { ?>
          <li class="nav-item"><a class="nav-link" href="my_books.php"><i class="bi bi-bookmark-check"></i> My Books</a></li>
          <li class="nav-item"><span class="nav-link text-warning"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['student_name']; ?></span></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php } ?>
        <li class="nav-item"><a class="nav-link" href="admin/login.php"><i class="bi bi-shield-lock"></i> Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-4">
