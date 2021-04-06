<?php
namespace task_8;

class DataBase {

    static string $host;
    static string $dbName;
    static string $login;
    static string $password;

    static  string $table;

    public function __construct(string $host, string $login, string $password, string $dbName, string $table) {
        self::$host = $host;
        self::$dbName = $dbName;
        self::$login = $login;
        self::$password = $password;
        self::$table = $table;
    }

    static function createUserTable() : void {
        $query = "CREATE TABLE IF NOT EXISTS `" . self::$table ."`  (
                `user_id` INT(11) NOT NULL AUTO_INCREMENT,
                `user_name` CHAR(50) NULL DEFAULT NULL,
                `user_surname` CHAR(50) NULL DEFAULT NULL,
                `user_username` CHAR(50) NULL DEFAULT NULL,
                PRIMARY KEY (`user_id`)
                )
                ENGINE=InnoDB
                CHECKSUM=1;
        ";

        $mysqli = new \mysqli(self::$host,self::$login,self::$password,self::$dbName);

        if (mysqli_connect_errno()) {
            printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }

        $mysqli->query($query);
    }
    public function getAllData() : array {
        $arrUsers = array();
        $mysqli = new \mysqli(self::$host,self::$login,self::$password,self::$dbName);

        if (mysqli_connect_errno()) {
            printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }

        if ($result = $mysqli->query("SELECT * FROM " . self::$table .";")) {
            if ($result->num_rows > 0) {
                $arrUsers = $result->fetch_all(MYSQLI_ASSOC);
            }
            $result->close();
        }
        $mysqli->close();

        return $arrUsers;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <h5 class="frame-heading">
                                Обычная таблица
                            </h5>
                            <div class="frame-wrap">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Actions</th>
                                        </tr>
                                    <tbody>

                                    <?php

                                        $db = new \task_8\DataBase("localhost","mysql","mysql","db_users","table_users");
                                        \task_8\DataBase::createUserTable();
                                        $arrUsers = $db->getAllData();
                                        function showRows($arrUsers) : void {
                                            echo '<tr>
                                                 <th scope="row">' . $arrUsers['user_id'] . '</th>
                                                <td>' . $arrUsers['user_name'] . '</td>
                                                <td>' . $arrUsers['user_surname'] . '</td>
                                                <td>' . $arrUsers['user_username'] . '</td>
                                                <td>
                                                <a href="show.php?id=' . $arrUsers['user_id'] . '" class="btn btn-info">Редактировать</a>
                                                <a href="edit.php?id=' . $arrUsers['user_id'] . '" class="btn btn-warning">Изменить</a>
                                                <a href="delete.php?id=' . $arrUsers['user_id'] . '" class="btn btn-danger">Удалить</a>
                                                </td>
                                                </tr>';
                                        }

                                        foreach ($arrUsers as $user) {
                                            \task_8\showRows($user);
                                        }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
