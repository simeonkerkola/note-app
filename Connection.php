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

    // Bind variables to be used in the query
    // Binding values protects from sql injections
    $statement->bindValue('title', $note['title']);
    $statement->bindValue('description', $note['description']);
    $statement->bindValue('date', date('Y-m-d H:i:s'));
    return $statement->execute();
  }

  public function getNoteById($id)
  {
    $statement = $this->pdo->prepare("SELECT * FROM notes WHERE id = :id");
    $statement->bindValue('id', $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function updateNote($id, $note)
  {
    $statement = $this->pdo->prepare("UPDATE notes SET title = :title,
                                      description = :description WHERE id = :id");

    $statement->bindValue('title', $note['title']);
    $statement->bindValue('description', $note['description']);
    $statement->bindValue('id', $id);
    return $statement->execute();
  }

  public function removeNote($id)
  {
    $statement = $this->pdo->prepare("DELETE FROM notes WHERE id = :id");

    $statement->bindValue('id', $id);
    return $statement->execute();
  }
}
return new Connection();
