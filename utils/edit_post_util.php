<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
  header("Location: ../index.php");
  exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["user_id"] == $_SESSION["user_id"]) {
  require_once "db_connection.php";

  $id = $_POST['id'];
  $title = trim($_POST["title"]);
  $content = trim($_POST["content"]);
  $image = null;

  if (!empty($_FILES["image"]["name"])) {
    $uploadDir = "../images/";
    $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    $filename = uniqid("image_") . "." . $ext;
    $targetFile = $uploadDir . $filename;

    $allowedExt = ["jpg", "jpeg", "png"];
    if (in_array($ext, $allowedExt) && $_FILES["image"]["size"] < 3 * 1024 * 1024) {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $image = $filename;
      }
      else {
        $_SESSION["error_message"] = "Internal error while storing image. :(";
        $connection->close();
        header("Location: ../edit_post.php");
        exit;
      }
    }
    else {
      $_SESSION["error_message"] = "Bad file type or file too large. (Please upload .jpg, .jpeg or .png, less than 3 MB)";
      $connection->close();
      header("Location: ../edit_post.php");
      exit;
    }
    $query = "UPDATE posts 
            SET title = ?, content = ?, image = ? 
            WHERE id = ?";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("sssi", $title, $content, $image, $id);
    $prepare_query->execute();
    $prepare_query->close();

    $connection->close();
    header("Location: ../index.php");
    exit;
  }

  $query = "UPDATE posts 
          SET title = ?, content = ?
          WHERE id = ?";
  $prepare_query = $connection->prepare($query);
  $prepare_query->bind_param("ssi", $title, $content, $id);
  $prepare_query->execute();
  $prepare_query->close();

  $connection->close();

  header("Location: ../index.php");
  exit;
}
else {
  header("Location: ../error.php");
  exit;
}
?>