<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Admin Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url(img/hdblue.jpg);
      background-color: #f8f9fa; 
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background-color: #343a40;
      padding-top: 1rem;
    }
    .sidebar a {
      color: #fff;
      padding: 15px;
      text-decoration: none;
      display: block; 
    }
    .sidebar a:hover {
      background-color: #007bff;
    }
    .main-content {
      margin-left: 250px;
      padding: 1rem;
    }
    .navbar {
      margin-left: 250px;
    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    .navbar-brand {
      background-color: lightblue;
      font-family: 'YourFont', sans-serif;
    }
    @media (max-width: 767.98px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {
        float: left;
      }
      .main-content {
        margin-left: 0;
      }
      .navbar {
        margin-left: 0; 
      }
    }
    @media (max-width: 575.98px) {
      .card-img-top {
        height: 150px;
      }
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2 class="text-center text-white">Admin Panel</h2>
    <a href="resident_records.php">Resident's Record</a>
    <a href="clearance_requests.php">Clearance Request</a>
    <a href="payment.php">Payment</a>
    <a href="index.php">Log Out</a>
  </div>

  <div class="main-content">
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <span class="navbar-brand">Admin Things</span>
      </div>
    </nav>

    <div class="container mt-4">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <img src="img/Residentrecord.png" class="card-img-top" alt="Resident's Record">
            <div class="card-body">
              <h5 class="card-title">Resident's Record</h5>
              <p class="card-text">Manage and view all resident records.</p>
              <a href="resident_records.php" class="btn btn-primary">Go to Resident's Record</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <img src="img/clear.jpg" class="card-img-top" alt="Clearance Request">
            <div class="card-body">
              <h5 class="card-title">Clearance Request</h5>
              <p class="card-text">Handle all clearance requests efficiently.</p>
              <a href="clearance_requests.php" class="btn btn-primary">Go to Clearance Request</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <img src="img/pay.jpg" class="card-img-top" alt="Payment">
            <div class="card-body">
              <h5 class="card-title">Payment</h5>
              <p class="card-text">Manage all payments and transactions.</p>
              <a href="payment.php" class="btn btn-primary">Go to Payment</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
