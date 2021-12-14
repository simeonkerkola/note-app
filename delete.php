<?php
$connection = require_once './Connection.php';

$connection->removeNote($_POST['id']);


// Redirect back to homepage
header('Location: index.php');
