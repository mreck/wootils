<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $now = time();
    $db = new SQLite3('../../bookmarks.db');
    $stmt = $db->prepare("INSERT INTO bookmarks (link, title, tags, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["link"]);
    $stmt->bindParam(2, $_POST["title"]);
    $stmt->bindParam(3, $_POST["tags"]);
    $stmt->bindParam(4, $now);
    $stmt->bindParam(5, $now);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/bookmarks/bookmarks.css">
    <title>wootils | bookmarks | add</title>
</head>
<body class="content">
    <nav>
        <ul>
            <li>
                <a href="/bookmarks/">Bookmarks</a>
            </li>
        </ul>
    </nav>
    <form method="post" autocomplete="off">
        <div>
            <label for="link">Link</label>
            <input type="text" id="link" name="link" autofocus>
        </div>
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="tags">Tags</label>
            <input type="text" id="tags" name="tags">
        </div>
        <div>
            <input type="submit" value="save">
        </div>
    </form>
</body>
</html>
