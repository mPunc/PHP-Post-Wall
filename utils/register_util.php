<?php
session_start();
if (isset($_SESSION["logged_in"])) {
  header("Location: ../index.php");
  exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["username"], $_POST["password"], $_POST["password_repeat"], $_POST["role"])) {
    require_once "db_connection.php";
    
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $repeatPassword = $_POST["password_repeat"];
    $role = $_POST["role"];

    #testing echo for variables copy paste
    echo '<script>console.log("' . $role . '");</script>';

    #check lenght
    if (strlen($username) < 4 || strlen($username) > 36) {
      $_SESSION["error_message"] = "Username must be between 4 and 36 characters.";
      header("Location: ../register.php");
      exit;
    }
    if (strlen($password) < 4 || strlen($password) > 64) {
      $_SESSION["error_message"] = "Password must be between 4 and 64 characters.";
      header("Location: ../register.php");
      exit;
    }
    #check matching passwords
    if ($password != $repeatPassword) {
      $_SESSION["error_message"] = "Passwords must match.";
      header("Location: ../register.php");
      exit;
    }
    #check username format
    if (!preg_match('/^[A-Za-z0-9_]{4,36}$/', $username)) {
      $_SESSION["error_message"] = "Invalid username format.";
      header("Location: ../register.php");
      exit;
    }
    #check valid role
    if (!in_array($role, ["user", "admin"])) {
      $_SESSION["error_message"] = "Invalid role.";
      header("Location: ../register.php");
      exit;
    }
    #check existing username
    $query = "SELECT * FROM users WHERE username=?";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("s", $username);
    $prepare_query->execute();
    $result = $prepare_query->get_result();
    if ($result->num_rows > 0) {
      $_SESSION["error_message"] = "User with the same username already exists.";
      header("Location: ../register.php");
      exit;
    }

    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users(username, password, role) VALUES (?, ?, ?)";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("sss", $username, $encryptedPassword, $role);
    $prepare_query->execute();
    $prepare_query->close();

    $connection->close();
  }

  #maybe insta login, change later
  header("Location: ../index.php");
  exit;
}
else {
  $_SESSION["error_message"] = "Critical error, try again. :(";
  header("Location: ../error.php");
  exit;
}
?>