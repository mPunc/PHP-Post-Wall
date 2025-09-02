<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["username"], $_POST["password"])) {
    require_once "db_connection.php";

    $username = htmlentities(trim($_POST["username"]));
    $password = htmlentities($_POST["password"]);
    $_POST = [];

    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

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
        header("Location: ../error.php");
        exit;
      }
    }
    else {
      # send an error message or something, you gotta unset it somewhere
      # bad username
      $_SESSION["error_message"] = "Invalid username or user doesn't exist.";
      $connection->close();
      header("Location: ../error.php");
      exit;
    }
    $connection->close();
  }

  header("Location: ../index.php");
  exit;
}
else {
  header("Location: ../error.php");
  exit;
}
?>