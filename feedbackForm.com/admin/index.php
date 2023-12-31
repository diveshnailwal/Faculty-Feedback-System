<?php
// Step 1: Establish a connection to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve the entered username and password from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Step 3: Check if the entered username and password match the values stored in your database
    $sql = "SELECT * FROM admins WHERE username = '$enteredUsername' AND password = '$enteredPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Step 4: If the credentials are correct, redirect the user to the dashboard.php page
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>  
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .feedBackForm {
            height: 100vh;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="feedBackForm d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-4">
                    <div class="card-body p-md-5 text-black border rounded">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="formHeading text-warning text-center">
                                <h3 class="mb-5 text-uppercase">ADMIN PANEL</h3>
                            </div>
                            <div class="form-outline mb-4">
                                <input name="username" required type="text" id="form3Example97"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example97">Username</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input name="password" required type="text" id="form3Example8"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example8">Password</label>
                            </div>
                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" name="submit" class="btn btn-warning btn-lg ms-2">Submit
                                    form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
