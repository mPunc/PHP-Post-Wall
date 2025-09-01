<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["username"], $_POST["password"], $_POST["password_repeat"], $_POST["role"])) {
    require_once "db_connection.php";

    
    $username = htmlentities(trim($_POST["username"]));
    $password = htmlentities($_POST["password"]);
    $repeatPassword = htmlentities($_POST["password_repeat"]);
    $role = htmlentities($_POST["role"]);
    $_POST = [];

    #testing echo for variables copy paste
    echo '<script>console.log("' . $role . '");</script>';

    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

    #check matching passwords
    #check existing username
    #other validation

    $query = "INSERT INTO users(username, password, role) VALUES (?, ?, ?)";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("sss", $username, $encryptedPassword, $role);
    $prepare_query->execute();
    $prepare_query->close();

    $connection->close();

    #maybe insta login, change later
    header("Location: ../index.php");
    exit;
  }
}
else {
  header("Location: ../error.php");
  exit;
}
?>