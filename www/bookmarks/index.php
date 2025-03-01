<?php
$db = new SQLite3("../../bookmarks.db");
$res = [];
$search = '';
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $val = "%" . $search . "%";
    $stmt = $db->prepare("SELECT link, title, tags FROM bookmarks WHERE link LIKE ? OR title LIKE ? OR tags LIKE ?");
    $stmt->bindParam(1, $val);
    $stmt->bindParam(2, $val);
    $stmt->bindParam(3, $val);
    $res = $stmt->execute();
} else {
    $res = $db->query("SELECT link, title, tags FROM bookmarks");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bookmarks.css">
    <title>wootils | bookmarks</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="add.php">Add Link</a>
            </li>
        </ul>
    </nav>
    <form method="get">
        <input type="text" name="search" value="<?= $search ?>" autofocus>
    </form>
    <ul>
        <?php while ($row = $res->fetchArray()) { ?>
            <li>
                <a href="<?= $row[0] ?>"><?= $row[1] ?></a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
