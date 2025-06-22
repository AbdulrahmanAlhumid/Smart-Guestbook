<?php
include "../includes/db.php";
include "auth.php";

// get statistics
$stats = ['happy' => 0, 'neutral' => 0, 'angry' => 0];
$sql = "SELECT mood, COUNT(*) AS count FROM messages GROUP BY mood";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $stats[$row['mood']] = $row['count'];
}

// Most frequently repeated words
$word_counts = [];
$sql = "SELECT comment FROM messages";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $words = preg_split('/\s+/', strtolower(strip_tags($row['comment'])));
    foreach ($words as $word) {
        $word = preg_replace('/[^a-z0-9]/', '', $word);
        if (strlen($word) > 2) {
            $word_counts[$word] = ($word_counts[$word] ?? 0) + 1;
        }
    }
}
arsort($word_counts);
$top_words = array_slice($word_counts, 0, 10);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <h2>Statistics</h2>
    <ul>
        <li>😄 Happy: <?= $stats['happy'] ?></li>
        <li>😐 Neutral: <?= $stats['neutral'] ?></li>
        <li>😠 Angry: <?= $stats['angry'] ?></li>
    </ul>

    <h2>Top Words</h2>
    <ol>
        <?php foreach ($top_words as $word => $count): ?>
            <li><?= htmlspecialchars($word) ?> (<?= $count ?>)</li>
        <?php endforeach; ?>
    </ol>

    <h2>All Messages</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Name</th>
            <th>Comment</th>
            <th>Mood</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM messages ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['comment'])) ?></td>
            <td><?= $row['mood'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td><a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
