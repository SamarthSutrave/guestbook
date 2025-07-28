<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Guestbook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Admin Page</h1>
    <?php
    $password = "admin123"; // Change as needed
    session_start();

    if (isset($_POST['admin_pass'])) {
        if ($_POST['admin_pass'] === $password) {
            $_SESSION['admin'] = true;
        } else {
            echo "<p>Incorrect password!</p>";
        }
    }

    if (!isset($_SESSION['admin'])) {
        echo '<form method="POST"><input type="password" name="admin_pass" placeholder="Admin Password"><button type="submit">Login</button></form>';
        exit();
    }

    // Delete message
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $conn->query("DELETE FROM messages WHERE id=$id");
    }

    $result = $conn->query("SELECT * FROM messages ORDER BY timestamp DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row['name']) . "</strong>: " . htmlspecialchars($row['message']) . " <em>(" . $row['timestamp'] . ")</em> <a href='admin.php?delete=" . $row['id'] . "'>Delete</a></p>";
    }
    ?>
</body>
</html>
