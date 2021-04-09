<?php


if(isset($_POST['request'])) {

    $db = new PDO('mysql:host=localhost;dbname=db_users','mysql','mysql');

    $stmt = $db->prepare('INSERT INTO table_request (text) values (:request);');
    $stmt->execute(['request'=>$_POST['request']]);



}

header("Location: /task_9.php");











