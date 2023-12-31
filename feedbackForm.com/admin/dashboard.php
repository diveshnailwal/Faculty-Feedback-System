<?php $connection = new mysqli('localhost', 'root', '', 'feedback_db'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container my-3">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-dark rounded">
                    <thead>
                        <tr>
                            <th scope="col">SubmissionDate</th>
                            <th scope="col">teacher Name</th>
                            <th scope="col">Course</th>
                            <th scope="col">Query</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select * from teacher";
                        $result = $connection->query($sql);

                        while ($row = $result->fetch_assoc()) {

                            ?>
                            <tr>
                                <td>
                                    <?= $row["submissionDate"] ?>
                                </td>
                                <th scope="row">
                                    <?= $row["teacherName"] ?>
                                </th>
                                <td>
                                    <?= $row["course"] ?>
                                </td>
                                <td>
                                    <?= $row["query"] ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>