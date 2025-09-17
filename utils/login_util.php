<?php
session_start();
if (isset($_SESSION["logged_in"])) {
  header("Location: ../index.php");
  exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["username"], $_POST["password"])) {
    require_once "db_connection.php";

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = ?";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("s", $username);
    $prepare_query->execute();
    $result = $prepare_query->get_result();

    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      # verify password, set username and role
      if (password_verify($password, $user["password"])) {
        # if everything's ok:
        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];
        $_SESSION["profile_created_at"] = $user["created_at"];
        $_SESSION["user_id"] = $user["id"];
        if ($user["avatar"] == null) $_SESSION["user_avatar"] = "default.png";
        else $_SESSION["user_avatar"] = $user["avatar"];
        $_SESSION["logged_in"] = "yes";
      }
      else {
        # bad password
        $_SESSION["error_message"] = "Invalid password.";
        $connection->close();
        header("Location: ../login.php");
        exit;
      }
    }
    else {
      $_SESSION["error_message"] = "Invalid username or user doesn't exist.";
      $connection->close();
      header("Location: ../login.php");
      exit;
    }
    $connection->close();
  }

  header("Location: ../index.php");
  exit;
}
else {
  $_SESSION["error_message"] = "Critical error, try again. :(";
  header("Location: ../error.php");
  exit;
}
?>