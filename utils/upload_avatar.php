<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["avatar_upload"])) {
  require_once "db_connection.php";

  $uploadDir = "../avatars/";
  $ext = strtolower(pathinfo($_FILES["avatar_upload"]["name"], PATHINFO_EXTENSION));
  $filename = uniqid("avatar_") . "." . $ext;
  $targetFile = $uploadDir . $filename;

  $allowedExt = ["jpg", "jpeg", "png"];
  if (in_array($ext, $allowedExt) && $_FILES["avatar_upload"]["size"] < 2 * 1024 * 1024) {
    if (move_uploaded_file($_FILES["avatar_upload"]["tmp_name"], $targetFile)) {
      $stmt = $connection->prepare("UPDATE users SET avatar = ? WHERE id = ?");
      $stmt->bind_param("si", $filename, $_SESSION["user_id"]);
      $stmt->execute();
      $stmt->close();

      $_SESSION["user_avatar"] = $filename;
    }
    else {
      $_SESSION["error_message"] = "Internal error while storing file. :(";
      $connection->close();
      header("Location: ../error.php");
      exit;
    }
  }
  else {
    $_SESSION["error_message"] = "Bad file type or file too large. (Please upload .jpg, .jpeg or .png)";
    $connection->close();
    header("Location: ../error.php");
    exit;
  }

  $connection->close();
  header("Location: ../my_profile.php");
  exit;
}

?>