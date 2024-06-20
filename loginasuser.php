<!DOCTYPE html>
<html>
<head>
  <title>Clearance System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    @media (max-width: 575.98px) {
      #login-form {
        width: 100% !important;
        padding: 1rem !important;
      }
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <form id="login-form" class="border shadow p-3 rounded" style="width: 100%; max-width: 450px;">
      <?php
        // Check if the success parameter exists in the URL
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo '<div class="alert alert-success" role="alert">Signup successful! You can now login.</div>';
        }
      ?>
      <h1 class="text-center p-3">LOGIN</h1>
      <div class="alert alert-danger" role="alert" style="display: none;" id="error-message">
        Wrong username or password.
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">User name</label>
        <input type="text" class="form-control" name="username" id="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
      <input type="hidden" name="role" id="role" value="user">
      <button type="submit" class="btn btn-primary w-100">LOGIN</button>
      <a href="index.php" class="btn btn-secondary w-100 mt-2">Back</a>
      <div class="text-center mt-3">
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $("#login-form").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
          url: "checklogin.php",
          method: "POST",
          data: $(this).serialize(),
          success: function(response) {
            if (response == "success") {
              window.location.href = "userhome.php";
            } else {
              $("#error-message").show();
            }
          }
        });
      });
    });
  </script>
</body>
</html>
