<?php
include "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = mysqli_real_escape_string($conn, trim($_POST["name"]));
    $comment = mysqli_real_escape_string($conn, trim($_POST["comment"]));
    $mood = $_POST["mood"];

    if ($name && $comment && in_array($mood, ['happy', 'neutral', 'angry'])) {
        $sql = "INSERT INTO messages (name, comment, mood) VALUES ('$name', '$comment', '$mood')";
        mysqli_query($conn, $sql);
    }
}

header("Location: index.php");
exit;
