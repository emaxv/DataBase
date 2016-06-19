<?php
require_once '../Classes/connection.class.php';
require_once '../Classes/option.class.php';
options::send();
header('Location: ../db.php');
?>/