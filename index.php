<!DOCTYPE html>
<html>
<head>
  <title>Role Selection</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <div class="border shadow p-3 rounded text-center" style="width: 450px;">
      <div class="mb-1">
        <label class="form-label">Login as:</label>
      </div>
      <div class="d-flex justify-content-around mb-3">
        <a href="loginasuser.php?role=user" class="btn btn-outline-primary" id="user-button" style="color: white;">User</a>
        <a href="loginasadmin.php?role=admin" class="btn btn-outline-secondary" id="admin-button" style="color: white;">Admin</a>
      </div>
      <input type="hidden" name="role" id="role" value="user">
    </div>
  </div>
</body>
</html>

