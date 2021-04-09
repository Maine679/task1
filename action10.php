<?php
session_start();

if(isset($_POST['request'])) {
    $db = new PDO('mysql:host=localhost;dbname=db_users','mysql','mysql');

    $stmt = $db->prepare('SELECT * FROM table_request WHERE text=?;');
    $stmt->execute([$_POST['request']]);

    $res = $stmt->fetch(PDO::FETCH_LAZY);

    if(empty($res)) {
        $stmt = $db->prepare('INSERT INTO table_request (text) values (?);');
        $stmt->execute([$_POST['request']]);
    } else {
        $_SESSION['warning'] = "Запись уже присутствует в базе.";
    }
}

header("Location: /task_10.php");











