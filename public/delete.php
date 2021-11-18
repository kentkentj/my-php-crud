<?php

/**
  * Delete a user
  */

require "../config.php";

if (isset($_GET["delete_id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $delete_id = $_GET["delete_id"];

    $sql = "DELETE FROM phone_book_table WHERE id = :delete_id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':delete_id', $delete_id);
    $statement->execute();

    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>