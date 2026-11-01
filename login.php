<?php
include "db.php";
$msg = "";
if (isset($_POST['roll_no'])) {
    $roll = $_POST['roll_no'];
    $pass = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE roll_no='$roll' AND password='$pass'");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['student_id'] = $row['id'];
        $_SESSION['student_name'] = $row['name'];
        header("Location: index.php");
        exit;
    }
    $msg = "Wrong roll number or password.";
}
$title = "Student Login";
include "header.php";
?>
<div class="row justify-content-center"><div class="col-md-5">
  <div class="card p-4">
    <h3 class="mb-3">Student Login</h3>
    <?php if ($msg != "") echo "<div class='alert alert-danger'>$msg</div>"; ?>
    <form method="post">
      <input class="form-control mb-3" name="roll_no" placeholder="Roll number" required>
      <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-forest w-100">Login</button>
    </form>
    <p class="mt-3 mb-0">New here? <a href="register.php">Register</a></p>
  </div>
</div></div>
<?php include "footer.php"; ?>
