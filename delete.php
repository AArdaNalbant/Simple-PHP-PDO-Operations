<link rel="stylesheet" href="styles.css">
<?php
include 'conn.php';

try {
    $delete = $db->prepare('DELETE FROM pdo_test_table WHERE id=?');
    $deleted = $delete->execute([$_GET['id']]);

//    $idorder = $db->prepare('SET @var:=0;
//    UPDATE pdo_test_table SET id=(@var:=@var+1);
//    ALTER TABLE pdo_test_table AUTO_INCREMENT=1;');
//    $idorder->execute();
    if ($deleted) {
        header('Location:list.php');
    } else {
        print_r($delete->errorInfo());
    }
} catch (Exception $e) {
    echo $e->getMessage();
}