<?php
session_start();
if(empty($_SESSION['username']))
{
    header("Location: Forms/enter.form.php");
}
?>
<html>
<head>
<title>Успеваемость</title>
        <meta name="author" content="Eryomenko Maksim">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <a href="Modules/logout.php" class="btn btn-danger navbar-btn btn-lg pull-right" role="button">Logout</a>
        <div class="page-header" align="center">
            <h1>Геометрия</h1>
        </div>