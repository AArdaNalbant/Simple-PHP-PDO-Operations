<link rel="stylesheet" href="styles.css">
<?php
include 'conn.php';

if (isset($_GET['id'])) {
    global $read;
    $read = $db->query('SELECT * FROM pdo_test_table WHERE id='.$_GET['id'])->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['edit_submit'])) {
    $baslik = isset($_POST['baslik']) ? $_POST['baslik'] : null;
    $renk = isset($_POST['renk']) ? $_POST['renk'] : null;
    $durum = isset($_POST['durum']) ? $_POST['durum'] : null;

    try {
        $update = $db->prepare('UPDATE pdo_test_table SET baslik=?, renk=?, durum=? WHERE id=?');
        $updated = $update->execute([$baslik, $renk, $durum, $_GET['id']]);
        if ($updated) {
            header('Location:list.php');
        } else {
            print_r($update->errorInfo());
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>
<a href="index.php"><button>Ana Sayfa</button></a><br><br>

<form action="" method="post">
    Başlık:<br>
    <input type="text" name="baslik" placeholder="Yeni Başlık" value="<?php echo $read['baslik'] ?>"><br><br>
    Renk:<br>
    <input type="text" name="renk" placeholder="Yeni Renk" value="<?php echo $read['renk'] ?>"><br><br>
    Durum:<br>
    <label>
        <input type="radio" name="durum" id="durumP" value="Pasif" <?php echo ($read['durum']=='Pasif') ? "checked" : "" ?>>Pasif
    </label>
    <label>
        <input type="radio" name="durum" id="durumA" value="Aktif" <?php echo ($read['durum']=='Aktif') ? "checked" : "" ?>>Aktif<br><br>
    </label>

    <input type="hidden" name="edit_submit" value="1">
    <button type="submit">Submit</button>
</form>
