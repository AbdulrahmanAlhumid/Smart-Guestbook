<?php
include "../includes/db.php";
include "auth.php";

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM messages WHERE id = $id";
    mysqli_query($conn, $sql);
}

header("Location: dashboard.php");
exit;
