<!DOCTYPE html>
<html>
<head>
  <title>multi-user role-based-login-system</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <form id="admin-login-form" class="border shadow p-3 rounded" style="width: 450px;">
      <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo '<div class="alert alert-success" role="alert">Signup successful! You can now login.</div>';
        }
      ?>
      <h1 class="text-center p-3">ADMIN</h1>
      <div class="alert alert-danger" role="alert" style="display: none;" id="error-message">
        Wrong username or password.
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">User name</label>
        <input type="text" class="form-control" name="adminusername" id="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="adminpassword" class="form-control" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary">LOGIN</button>
      <a href="index.php" class="btn btn-secondary ms-3">Back</a>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $("#admin-login-form").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
          url: "admincheck-login.php",
          method: "POST",
          data: $(this).serialize(),
          success: function(response) {
            console.log("Response from server: ", response); // Add this line for debugging
            if (response.trim() == "success") {
              window.location.href = "adminhome.php";
            } else {
              $("#error-message").show();
            }
          },
          error: function() {
            $("#error-message").show();
          }
        });
      });
    });
  </script>
</body>
</html>
