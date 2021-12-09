<?php
$connection = require_once './Connection.php';

$id = $_POST['id'] ?? '';
if ($id) {
  $connection->updateNote($id, $_POST);
} else {


  // Create note
  $notes = $connection->addNote($_POST);
}

// Redirect back to homepage
header('Location: index.php');
