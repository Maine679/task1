<?php
namespace task_7;

class DataBase {

    static string $host;
    static string $dbName;
    static string $login;
    static string $password;

    public function __construct(string $host, string $login, string $password, string $dbName) {
        self::$host = $host;
        self::$dbName = $dbName;
        self::$login = $login;
        self::$password = $password;
    }

    static function createUserTable() : void {
        $query = "CREATE TABLE IF NOT EXISTS `users`  (
                    `user_id` INT(11) NOT NULL AUTO_INCREMENT,
                    `user_name` CHAR(50) NULL DEFAULT NULL,
                    `user_surname` CHAR(50) NULL DEFAULT NULL,
                    `user_login` CHAR(50) NULL DEFAULT NULL,
                    `user_info` CHAR(50) NOT NULL DEFAULT 'None',
                    `user_src` CHAR(50) NOT NULL DEFAULT 'user.png',
                    `user_position` CHAR(50) NOT NULL DEFAULT 'None',
                    `user_twitter` CHAR(50) NULL DEFAULT NULL,
                    `user_banned` INT(11) NULL DEFAULT NULL,
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

        if ($result = $mysqli->query("SELECT * FROM users")) {
            if ($result->num_rows > 0) {
                $arrUsers = $result->fetch_all(MYSQLI_ASSOC);
            }
            $result->close();
        }
        $mysqli->close();

        return $arrUsers;
    }

    public function setAllData($arrData) : void {
        self::createUserTable();

        $mysqli = new \mysqli(self::$host,self::$login,self::$password,self::$dbName);

        $query = "INSERT INTO users (`user_name`,`user_surname`,`user_login`,`user_info`,`user_src`,`user_position`,`user_twitter`,`user_banned`) values
        ('".$arrData['user_name']."','".$arrData['user_surname']."','".$arrData['user_login']."','".$arrData['user_info']."','".$arrData['user_src']."','".$arrData['user_position']."','".$arrData['user_twitter']."','".$arrData['user_banned']."');";

        echo "<br> $query <br>";


        $mysqli->query($query);

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
                    <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">

                        <?php


                        function showUser($userInfo) : void {
                            echo '<div class="';
                            if($userInfo['user_banned'])
                                echo "banned ";
                            echo 'rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">';
                            echo '<img src="img/demo/authors/' . $userInfo['user_src'] . '" alt="'. $userInfo['user_surname'] .' ' . $userInfo['user_name'] . '" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">';
                            echo '<div class="ml-2 mr-3">';
                            echo '<h5 class="m-0">';
                            echo $userInfo['user_surname'] .' ' . $userInfo['user_name'] . ' (' . $userInfo['user_info'] . ')';
                            echo '<small class="m-0 fw-300">';
                            echo $userInfo['user_position'];
                            echo '</small>';
                            echo '</h5>';
                            echo '<a href="https://twitter.com/' . $userInfo['user_twitter'] . '" class="text-info fs-sm" target="_blank">' . $userInfo['user_twitter'] . '</a> -';
                            echo '<a href="https://wrapbootstrap.com/user/' . $userInfo['user_login'] . '" class="text-info fs-sm" target="_blank" title="Contact' . $userInfo['user_surname'] . '"><i class="fal fa-envelope"></i></a>';
                            echo '</div>';
                            echo '</div>';
                        }


//                        $arrUsers = array(
//                            array(
//                                'user_name'=>'A.',
//                                'user_surname'=>'Sunny',
//                                'user_login'=>'myorange',
//                                'user_info'=>'UI/UX Expert',
//                                'user_src'=>'sunny.png',
//                                'user_position'=>'Lead Author',
//                                'user_twitter'=>'@myplaneticket',
//                                'user_banned' => false
//                            ),
//                            array(
//                                'user_name'=>'K.',
//                                'user_surname'=>'Jos',
//                                'user_login'=>'Walapa',
//                                'user_info'=>'ASP.NET Developer',
//                                'user_src'=>'josh.png',
//                                'user_position'=>'Partner &amp; Contributor',
//                                'user_twitter'=>'@atlantez',
//                                'user_banned' => false
//                            ),
//                            array(
//                                'user_name'=>'L.',
//                                'user_surname'=>'Jovanni',
//                                'user_login'=>'lodev09',
//                                'user_info'=>'PHP Developer',
//                                'user_src'=>'jovanni.png',
//                                'user_position'=>'Partner &amp; Contributor',
//                                'user_twitter'=>'@lodev09',
//                                'user_banned' => true
//                            ),
//                            array(
//                                'user_name'=>'R.',
//                                'user_surname'=>'Roberto',
//                                'user_login'=>'sildur',
//                                'user_info'=>'Rails Developer',
//                                'user_src'=>'roberto.png',
//                                'user_position'=>'Partner &amp; Contributor',
//                                'user_twitter'=>'@sildur',
//                                'user_banned' => true
//                            )
//                        );

                        $db = new \task_7\DataBase("localhost","mysql","mysql","db_users");
                        $arrUsers = $db->getAllData();

                        foreach ($arrUsers as $dataUser) {
//                            $db->setAllData($dataUser);
                            showUser($dataUser);
                        }

                        ?>

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
