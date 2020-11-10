<link rel="stylesheet" href="styles.css">
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

?>
<a href="index.php"><button>Ana Sayfa</button></a><br><br>

<form action="" method="post">
    Başlık:<br>
    <input type="text" name="baslik"><br><br>
    Renk:<br>
    <input type="text" name="renk"><br><br>
    Durum:<br>
    <label>
        <input type="radio" name="durum" value="Pasif">Pasif
    </label>
    <label>
        <input type="radio" name="durum" value="Aktif">Aktif<br><br>
    </label>

    <input type="hidden" name="insert_submit" value="1">
    <button type="submit">Submit</button><br><br>
</form>
