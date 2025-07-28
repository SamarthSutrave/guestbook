<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Guestbook</h1>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $conn->real_escape_string($_POST['name']);
        $message = $conn->real_escape_string($_POST['message']);
        $sql = "INSERT INTO messages (name, message) VALUES ('$name', '$message')";
        $conn->query($sql);
    }

    $result = $conn->query("SELECT * FROM messages ORDER BY timestamp DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row['name']) . "</strong>: " . htmlspecialchars($row['message']) . " <em>(" . $row['timestamp'] . ")</em></p>";
    }
    ?>
</body>
</html>
