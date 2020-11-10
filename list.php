<link rel="stylesheet" href="styles.css">
<?php
include 'conn.php';

if (isset($_POST['search_submit'])) {
    if ($_POST['searchbaslik'] == null and $_POST['searchdurum'] == null) {
        $read = $db->prepare('SELECT * FROM pdo_test_table');
    } elseif ($_POST['searchdurum'] == null) {
        $read = $db->prepare("SELECT * FROM pdo_test_table WHERE baslik LIKE  '%".$_POST['searchbaslik']."%'");
    } else {
        $read = $db->prepare("SELECT * FROM pdo_test_table WHERE (baslik LIKE '%" . $_POST['searchbaslik'] . "%' AND durum=" . $_POST['searchdurum'] . ")");
    }
    $read->execute();
    $topics = $read->fetchAll(PDO::FETCH_ASSOC);
} else {
    $read = $db->prepare('SELECT * FROM pdo_test_table');
    $read->execute();
    $topics = $read->fetchAll(PDO::FETCH_ASSOC);
}

?>

<a href="index.php">
    <button>Ana Sayfa</button>
</a><br><br>

<form action="list.php" method="post">
    <label>Search:
        <input type="search" name="searchbaslik">
    </label>
    <select name="searchdurum">
        <option value="">---</option>
        <option value="0">Pasif</option>
        <option value="1">Aktif</option>
    </select>
    <input type="hidden" name="search_submit">
    <button type="submit">Search</button>

</form><br><br>

<table>
    <tr>
        <th>Başlık</th>
        <th>Renk</th>
        <th>Durum</th>
        <th>Edit</th>
        <th>Sil</th>
    </tr>
    <?php foreach ($topics as $topic): ?>
        <tr>
            <th><?php echo $topic['baslik'] ?></th>
            <th><?php echo $topic['renk'] ?></th>
            <th><?php echo $topic['durum'] ?></th>
            <th><button onclick="window.location.href='edit.php?id=<?php echo $topic['id']; ?>'">Edit</button></th>
            <th><button onclick="if(confirm('Click OK to delete')) {window.location.href='delete.php?id=<?php echo $topic['id']; ?>'}">Sil</button></th>
        </tr>
    <?php endforeach; ?>
</table>