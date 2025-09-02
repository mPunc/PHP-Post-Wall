<?php
  session_start();
  $title = "Post Wall";
  $_SESSION['currentSite'] = "home";
  require_once 'partials/top_html.php';
?>

<?php
  require_once "utils/posts_util.php";
  require_once "utils/db_connection.php";

  $posts = getAllPosts($connection);
  $connection->close();

  foreach ($posts as $post) {
    include "partials/post_card.php";
  }
?>

<?php
  require_once 'partials/bottom_html.php';
?>
