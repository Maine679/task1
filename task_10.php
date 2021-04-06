<?php
namespace task_9;

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
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `text` VARCHAR(3000) NULL DEFAULT NULL,
                PRIMARY KEY (`id`)
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
    public function isExists(string $text) : bool {


        $mysqli = new \mysqli(self::$host,self::$login,self::$password,self::$dbName);

        if (mysqli_connect_errno()) {
            printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }

        $query = "SELECT * FROM  " . self::$table . " WHERE text='$text' limit 1;";

        $answer = false;
        if($result = $mysqli->query($query)) {
            if($result->num_rows > 0)
                $answer = true;

            $result->close();
        }

        $mysqli->close();

        return $answer;
    }

    public function addRequest(string $text) : void {

        $mysqli = new \mysqli(self::$host,self::$login,self::$password,self::$dbName);

        if (mysqli_connect_errno()) {
            printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }

        $mysqli->query("INSERT INTO " . self::$table ." (text) value ('$text');");

        $mysqli->close();
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
                            <div class="panel-content">
                                <div class="form-group">


                                    <?php

                                        if(isset($_POST['request'])) {
                                            $db = new \task_9\DataBase("localhost","mysql","mysql","db_users","table_request");
                                            \task_9\DataBase::createUserTable();

                                            if(!$db->isExists($_POST['request'])) {
                                                $db->addRequest($_POST['request']);
                                            } else {
                                                echo '<div class="alert alert-danger fade show" role="alert">
                                                    You should check in on some of those fields below.
                                                </div>';
                                            }
                                        }
                                    ?>


                                    <form action="task_10.php" method="post">
                                        <label class="form-label" for="simpleinput">Text</label>
                                        <input type="text" id="simpleinput" class="form-control" name="request">
                                        <button class="btn btn-success mt-3">Submit</button>
                                    </form>
                                </div>
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
