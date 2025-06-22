<?php include "includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Guestbook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Smart Guestbook</h1>

        <form action="insert.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <textarea name="comment" placeholder="Leave a comment..." required></textarea>
            <label>Select your mood:</label><br>
            <label><input type="radio" name="mood" value="happy" required> 😄</label>
            <label><input type="radio" name="mood" value="neutral"> 😐</label>
            <label><input type="radio" name="mood" value="angry"> 😠</label><br>
            <button type="submit">Submit</button>
        </form>

        <hr>

        <h2>Recent Messages</h2>

        <?php
        $sql = "SELECT * FROM messages ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)):
        ?>
            <div class="message">
                <p><strong><?= htmlspecialchars($row['name']) ?></strong> (<?= $row['created_at'] ?>)</p>
                <p><?= nl2br(htmlspecialchars($row['comment'])) ?></p>
                <p>Mood: 
                    <?php
                    echo $row['mood'] === 'happy' ? '😄' : ($row['mood'] === 'neutral' ? '😐' : '😠');
                    ?>
                </p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
