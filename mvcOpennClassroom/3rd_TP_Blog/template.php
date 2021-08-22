<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?= $title?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../Bootstrap3/css/bootstrap.css">
    <link rel="stylesheet" href="../Bootstrap3/css/basescss.css">
    <link rel="stylesheet" href="../Bootstrap3/font-awesome/css/font-awesome.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../Bootstrap3/css/bootstrap-theme.min.css">
    <!-- Loader -->
    <!-- <link rel="stylesheet" href="css/loader.css"> -->
    <link rel="stylesheet" href="../Bootstrap3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../Bootstrap3/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../Bootstrap3/css/responsive.bootstrap.min.css">
    <script src="../Bootstrap3/js/jquery-1.12.4.js"></script>
    <script src="../Bootstrap3/js/bootstrap.min.js"></script>
    <script src="../Bootstrap3/js/jquery.dataTables.min.js"></script>

</head>

<body>

<?php
require("../includes/navbar.php");
?>
<div class="container-fluid">
    <div class="jumbotron">

        <h1>TP Blog</h1>
        <p>Aujourd'hui, nous sommes le <?= date('D-d-M-Y h:i:s'); ?>. </p>

        <p><a class="btn btn-success btn-lg" href="#" role="button">Learn more</a></p>
 
    </div>
    <h2 style="text-align:center; font-size:40px; letter-spacing: 4px;">Mon Super blog!</h2>
<?= $content?>

</body>

</html>


