
<!DOCTYPE html>
<html>
<head>
    <title>Student Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
    background-color:grey;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
        }

        .header {
            background: blue;
            
    border: 1px solid blue;
    border-radius: 5px;
        }

        .header h2 {
            color: #f9f9f9;
    padding: 5px;
    font-size:xx-large;

        }

        .feedback-container {
            background-color: #fff;
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #007BFF;
            color: #fff;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div>
    

    <div class="feedback-container">
        <div class="header">
            <h2>Feedback Form</h2>
        </div>
        <form id="studentFeedbackForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" required>

            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required>

            <table>
                <thead>
                    <tr>
                        <th>Aspect</th>
                        <th>Points (1-5)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Teacher's Name</td>
                        <td>
                            <input type="text" name="teacherName" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Teaching</td>
                        <td>
                            <input type="number" name="teachingPoints" min="1" max="5" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Course Material</td>
                        <td>
                            <input type="number" name="materialPoints" min="1" max="5" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Communication</td>
                        <td>
                            <input type="number" name="communicationPoints" min="1" max="5" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Feedback/Query (optional)</td>
                        <td>
                            <textarea id="query" name="query" rows="4"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" name="submit">Submit Feedback</button>

        </form>
    </div>
</div>

</body>
</html>
  <?php 
    $con = mysqli_connect('localhost', 'root', '', 'feedback_db');

    if (isset($_POST['submit'])) {
$studentName = $_POST['studentName'];
$course = $_POST['course'];
$teacherName = $_POST['teacherName'];
$teachingPoints = $_POST['teachingPoints'];
$materialPoints = $_POST['materialPoints'];
$communicationPoints = $_POST['communicationPoints'];
$query = $_POST['query'];


    mysqli_query($con, "INSERT INTO `student`(`studentName`,`course`,`teacherName`,`teachingPoints`,`materialPoints`,`communicationPoints`,`query`)
     VALUES ('$studentName','$course','$teacherName','$teachingPoints','$materialPoints','$communicationPoints','$query')");

    echo "<script> 
            alert('Form Submitted');
            window.location.href= 'index.php';
          </script>";
}

 ?>
