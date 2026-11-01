<?php
include "../db.php";
$msg = "";
if (isset($_POST['username'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE username='$u' AND password='$p'");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['id'];
        header("Location: index.php");
        exit;
    }
    $msg = "Wrong username or password.";
}
$title = "Admin Login";
include "../head.php";
?>
<div class="container my-5"><div class="row justify-content-center"><div class="col-md-4">
  <div class="card p-4">
    <div class="text-center mb-3">
      <span class="logo-pill border"><img src="https://skf.edu.in/images/skf-newlogo-new1.jpg" alt="SKF"></span>
      <h3 class="mt-2">Admin Login</h3>
    </div>
    <?php if ($msg != "") echo "<div class='alert alert-danger'>$msg</div>"; ?>
    <form method="post">
      <input class="form-control mb-3" name="username" placeholder="Username" required>
      <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-forest w-100">Login</button>
    </form>
    <a href="../index.php" class="mt-3 d-block text-center">Back to library</a>
  </div>
</div></div></div>
<?php include "../footer.php"; ?>
