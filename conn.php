<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=pdo_test', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
}
