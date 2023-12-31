<?php
session_start();
$error = "";
$connection = new mysqli('localhost', 'root', '', 'feedback_db');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $userType = $_POST['userType'];

    // Sanitize user input to prevent SQL injection
    $username = $connection->real_escape_string($_POST['username']);
    $password = $connection->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $connection->query($sql);

    if ($result) {
        $total_rows = $result->num_rows;

        if ($total_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row["user_id"];

            if ($userType == 'student') {
                header('location: studentForm.php');
            } elseif ($userType == 'teacher') {
                header('location: teacherForm.php');
            } else {
                // Add a default redirect or error message if the user type is neither 'student' nor 'teacher'
                header('location: index.php');
            }

            // Unset and destroy the session
            unset($_SESSION['username']);
            unset($_SESSION['user_id']);
            session_destroy();
        } else {
            $error = "Login Failed!";
            // Add a script to display a JavaScript alert
            echo '<script>';
            echo 'alert("Incorrect username or password!");';
            echo '</script>';
        }
    } else {
        $error = "Database query error: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FEEDBACK FORM</title>
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
                                <h3 class="mb-5 text-uppercase">FEEDBACK PORTAL</h3>
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
                            <div class="form-outline mb-4">
                                <select id="userType" name="userType" class="form-control form-control-lg">
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                </select>
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
