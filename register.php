<?php
include "db.php";
$msg = "";
if (isset($_POST['roll_no'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll_no'];
    $dept = $_POST['department'];
    $sem = $_POST['semester'];
    $pass = $_POST['password'];
    // is the roll number already used?
    $check = mysqli_query($conn, "SELECT * FROM students WHERE roll_no='$roll'");
    if (mysqli_num_rows($check) > 0) {
        $msg = "This roll number is already registered.";
    } else {
        mysqli_query($conn, "INSERT INTO students (name, roll_no, department, semester, password) VALUES ('$name','$roll','$dept','$sem','$pass')");
        header("Location: login.php");
        exit;
    }
}
$title = "Register";
include "header.php";
?>
<div class="row justify-content-center"><div class="col-md-6">
  <div class="card p-4">
    <h3 class="mb-3">Student Registration</h3>
    <?php if ($msg != "") echo "<div class='alert alert-danger'>$msg</div>"; ?>
    <form method="post">
      <input class="form-control mb-3" name="name" placeholder="Full name" required>
      <input class="form-control mb-3" name="roll_no" placeholder="Roll number" required>
      <select class="form-select mb-3" name="department">
        <option>BCA</option><option>BBA</option><option>BSc</option>
      </select>
      <input class="form-control mb-3" type="number" name="semester" placeholder="Semester" min="1" max="8" required>
      <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
      <button class="btn btn-forest w-100">Register</button>
    </form>
    <p class="mt-3 mb-0">Already registered? <a href="login.php">Login</a></p>
  </div>
</div></div>
<?php include "footer.php"; ?>
