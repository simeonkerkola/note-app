<?php
$connection = require_once './Connection.php';

// Create note
$notes = $connection->addNote($_POST);

// Redirect back to homepage
header('Location: index.php');
