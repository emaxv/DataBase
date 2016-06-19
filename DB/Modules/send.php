<?php
require '../connect.php';
require_once '../Classes/option.class.php';
options::send();
header('Location: ../db.php');
?>/