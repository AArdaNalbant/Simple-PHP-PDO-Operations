<?php
include 'conn.php';

if (isset($_POST['insert_submit'])) {
    $baslik = isset($_POST['baslik']) ? $_POST['baslik'] : null;
    $renk = isset($_POST['renk']) ? $_POST['renk'] : null;
    $durum = isset($_POST['durum']) ? $_POST['durum'] : null;

    try {
//        $aireset = $db->prepare('ALTER TABLE pdo_test_table AUTO_INCREMENT=1;');
//        $aireset->execute();

        $send = $db->prepare('INSERT INTO pdo_test_table SET baslik=?, renk=?, durum=?');
        $sent = $send->execute([$baslik, $renk, $durum]);
        if ($sent) {
            header('Location:list.php');
        } else {
            print_r($send->errorInfo());
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

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

<form action="" method="post">
    Başlık:<br>
    <input type="text" name="baslik" placeholder="Yeni Başlık" value="<?php echo isset($_GET['id']) ? $read['baslik'] : null ?>"><br><br>
    Renk:<br>
    <input type="text" name="renk" placeholder="Yeni Renk" value="<?php echo isset($_GET['id']) ? $read['renk'] : null ?>"><br><br>
    Durum:<br>
    <label>
        <input type="radio" name="durum" id="durumP" value="0" <?php echo isset($_GET['id']) ? (($read['durum']=='Pasif') ? "checked" : "") : null ?>>Pasif
    </label>
    <label>
        <input type="radio" name="durum" id="durumA" value="1" <?php echo isset($_GET['id']) ? (($read['durum']=='Aktif') ? "checked" : "") : null ?>>Aktif<br><br>
    </label>

    <input type="hidden" name="<?php echo isset($_GET['id']) ? 'edit_submit' : 'insert_submit' ?>" value="1">
    <button type="submit">Submit</button>
</form>