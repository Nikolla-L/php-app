<?php
    include('includes/functions.php');
    $allEmployees = selectAll();
    $singleGuy = selectSingle(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NL</title>
    <?php include('theme/header-scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="container-fluid">
        <h1>
            <em class="fa fa-check-circle"></em>
            Welcome to NL-s page
        </h1>
        <table class="table datatable table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
    <?php include('theme/footer-scripts.php'); ?>
</body>
</html>