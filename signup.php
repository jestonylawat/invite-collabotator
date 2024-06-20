<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <form class="border shadow p-3 rounded" action="signup_process.php" method="post" style="width: 450px;">
      <h1 class="text-center p-3">SIGN UP</h1>
      <div class="alert alert-danger" role="alert" style="display: none;" id="error-message">
        <!-- Error message will be displayed here -->
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">User name</label>
        <input type="text" class="form-control" name="username" id="username">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <div class="mb-3">
        <label for="confirm-password" class="form-label">Confirm Password</label>
        <input type="password" name="confirm-password" class="form-control" id="confirm-password">
      </div>
      <div class="mb-1">
        <label class="form-label">Sign up as:</label>
      </div>
      <button type="submit" class="btn btn-primary">SIGN UP</button>
      <a href="loginasuser.php" class="btn btn-secondary ms-3">Back</a>
      <div class="text-center mt-3">
        <p>Already have an account? <a href="loginuser.php">Login here</a></p>
      </div>
    </form>
  </div>
</body>
</html>
