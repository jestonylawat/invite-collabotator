<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Advanced Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('img/papers.jpg'); 
            background-size: cover;
            width: 100%;
            height: 100vh;
            background-repeat: no-repeat;
            background-position: center;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .top-buttons {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .modal-content {
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
        }

        .modal-header,
        .modal-footer {
            border: none;
        }

        .btn-secondary,
        .btn-primary {
            border: none;
        }

        .btn-secondary {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
        }

        .btn-primary {
            background: linear-gradient(45deg, #f7971e, #ffd200);
        }

        .dropdown-menu {
            background: rgba(0, 0, 0, 0.8);
        }

        .dropdown-item {
            color: #fff;
        }

        .dropdown-item:hover {
            background: #6a11cb;
        }
    </style>
</head>

<body>
    <div class="top-buttons">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Dropdown link
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewProfileModal">Profile</a>
                </li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#receiptModal">Payment
                        Receipt</a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#clearanceModal">Request of
                        Clearance</a></li>
            </ul>
        </div>

        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#logoutModal">Log Out</button>
    </div>

    <!-- Modals for Dropdown Links -->

    <!-- Upload Profile Modal -->
    <div class="modal fade" id="viewProfileModal" tabindex="-1" aria-labelledby="viewProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewProfileModalLabel">View Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profileForm" action="save_profile.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName"
                                placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="purokNo" class="form-label">Purok No.</label>
                            <select class="form-select" id="purokNo" name="purokNo" required>
                                <option selected disabled>Select your Purok number</option>
                                <option value="1">Purok 1</option>
                                <option value="2">Purok 2</option>
                                <option value="3">Purok 3</option>
                                <option value="4">Purok 4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="profilePhoto" class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Request of Clearance Modal -->
    <div class="modal fade" id="clearanceModal" tabindex="-1" aria-labelledby="clearanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clearanceModalLabel">Request Barangay Clearance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="clearanceForm" action="save_clearance_request.php" method="post">
                        <div class="mb-3">
                            <label for="clearanceFullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="clearanceFullName" name="clearanceFullName"
                                placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="clearancePurokNo" class="form-label">Purok No.</label>
                            <select class="form-select" id="clearancePurokNo" name="clearancePurokNo" required>
                                <option selected disabled>Select your Purok number</option>
                                <option value="1">Purok 1</option>
                                <option value="2">Purok 2</option>
                                <option value="3">Purok 3</option>
                                <option value="4">Purok 4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="clearancePurpose" class="form-label">Purpose</label>
                            <textarea class="form-control" id="clearancePurpose" name="clearancePurpose" rows="3"
                                placeholder="State the purpose of the clearance" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptModalLabel">Payment Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="receiptContent">
                    <!-- Receipt content will be loaded here via JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="downloadReceipt">Download Receipt</button>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function () {
    var requestId = 1;

    $('#receiptModal').on('show.bs.modal', function (event) {
        console.log("Modal is shown. Fetching receipt data...");

        $.ajax({
            type: "POST",
            url: "fetch_receipt.php",
            data: { request_id: requestId },
            dataType: 'json',
            success: function (response) {
                console.log("Response received:", response);
                if (response.status === 'success') {
                    var receipt = response.data;
                    var receiptHtml = `
                        <p><strong>Receipt</strong></p>
                        <p>ID: ${receipt.id}</p>
                        <p>Request ID: ${receipt.request_id}</p>
                        <p>User ID: ${receipt.user_id}</p>
                        <p>Amount: $${receipt.amount.toFixed(2)}</p>
                        <p>Payment Date: ${receipt.payment_date}</p>
                        <p>Status: ${receipt.status}</p>
                    `;
                    $('#receiptContent').html(receiptHtml);
                } else {
                    $('#receiptContent').html('<p>Failed to fetch receipt data.</p>');
                }
            },
            error: function (xhr, status, error) {
                console.error("Error occurred:", xhr, status, error);
                $('#receiptContent').html('<p>An error occurred while fetching receipt data.</p>');
            }
        });
    });

    $('#downloadReceipt').click(function () {
        var receiptContent = $('#receiptContent').html();
        var blob = new Blob([receiptContent], { type: 'text/html' });
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'receipt.html';
        link.click();
    });
});

</script>



    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="index.php" class="btn btn-primary">Log Out</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#profileForm").submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Use FormData for file uploads

            $.ajax({
                type: "POST",
                url: "save_profile.php", // URL to the PHP script that will save the data
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json', // Expect a JSON response
                success: function (response) {
                    if (typeof response === 'object') {
                        alert(response.message);
                        if (response.status === 'success') {
                            window.location.href = response.redirect;
                        }
                    } else {
                        alert("An unexpected response was received from the server.");
                    }
                    $("#viewProfileModal").modal('hide');
                },
                error: function (xhr, status, error) {
                    console.error(xhr); // Log the error for debugging
                    alert("An error occurred while saving the profile.");
                }
            });
        });

        $("#clearanceForm").submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = {
                clearanceFullName: $("#clearanceFullName").val(),
                clearancePurokNo: $("#clearancePurokNo").val(),
                clearancePurpose: $("#clearancePurpose").val()
            };

            console.log("Form Data: ", formData); // Log form data for debugging

            $.ajax({
                type: "POST",
                url: "save_clearance_request.php", // URL to the PHP script that will save the data
                data: formData,
                dataType: 'json', // Expect a JSON response
                success: function (response) {
                    if (typeof response === 'object') {
                        alert(response.message);
                        if (response.status === 'success') {
                            $("#clearanceModal").modal('hide');
                        }
                    } else {
                        alert("An unexpected response was received from the server.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr); // Log the error for debugging
                    alert("An error occurred while submitting the request.");
                }
            });
        });
    });
</script>


</body>

</html>
