<?php
require_once 'connection.php';
require_once 'classes.php';
options::update();
header('Location: db.php');
?>