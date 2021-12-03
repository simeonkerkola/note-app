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

  public function addNote($note)
  {
    $statement = $this->pdo->prepare("INSERT INTO notes (title, description, create_date) 
                                      VALUES (:title, :description, :date)");
    $statement->bindValue('title', $note['title']);
    $statement->bindValue('description', $note['description']);
    $statement->bindValue('date', date('Y-m-d H:i:s'));
    return $statement->execute();
  }
}
return new Connection();
