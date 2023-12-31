<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teacher Feedback & Query</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: grey;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .query-container {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        label {
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="text"],
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

        textarea {
            resize: vertical;
        }

        textarea:focus {
            border-color: #007BFF;
        }

        .tf {
            border: 2px solid blue;
            background: blue;
            border-radius: 4px;
            text-align: center;
        }

        .tf h2 {
            color: #f9f9f9;
            padding: 5px;
            font-size: xx-large;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="tf"><h2>Teachers Feedback</h2></div>
    <div class="query-container">

        <form id="teacherQueryForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="teacherName">Teacher Name:</label>
                <input type="text" class="form-control" id="teacherName" name="teacherName" required>
            </div>

            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" class="form-control" id="course" name="course" required>
            </div>

            <div class="form-group">
                <label for="query">Feedback/Query:</label>
                <textarea class="form-control" id="query" name="query" rows="4" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit Query</button>
        </form>
    </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
  <?php 
    $con = mysqli_connect('localhost','root','','feedback_db');



if(isset($_POST['submit'])){
    $teacherName = $_POST['teacherName'];
    $course = $_POST['course'];
    $query    = $_POST['query'];
     
    mysqli_query($con, "INSERT INTO `teacher`(`teacherName`,`course`,`query`)
     VALUES ('$teacherName','$course','$query')");

echo"
<script> 
alert('Form Submit');
window.location.href= 'index.php';
</script>
";

     

}
 ?>
