<?php

class Connection
{
  public PDO $pdo;

  public function __construct()
  {
    // Connect to database
    $this->pdo = new PDO('mysql:server=localhost;dbname=noteapp', 'root', '');

    // Whenever there's and error with the database, throw error
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getNotes()
  {
    // Query from database
    $statement = $this->pdo->prepare('SELECT * FROM notes ORDER BY create_date DESC');

    // Execute query
    $statement->execute();

    // Return an array of results
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}
