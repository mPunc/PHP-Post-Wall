<?php

function getAllPosts($connection, $userFilter = null) {
  $sql = "SELECT p.*, u.username, u.avatar 
          FROM posts p
          JOIN users u ON p.user_id = u.id";

  if ($userFilter !== null) {
    $sql .= " WHERE u.id =" . intval($userFilter);
  }

  $sql .= " ORDER BY p.updated_at DESC";
  $result = $connection->query($sql);

  return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

?>